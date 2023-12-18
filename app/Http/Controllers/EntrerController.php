<?php

namespace App\Http\Controllers;

use App\Models\Entrer;
use App\Models\Fournisseur;
use App\Models\Produit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EntrerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entrers=Entrer::all();
       return view('achats.index',['entrers'=>$entrers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('achats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'id_fournisseur'=>'required',
            'id_produit'=>'required',
            'quantite'=>'required',
            'prixEntree'=>'required',
        ]);
        $entrer=new entrer();
        $entrer->id_fournisseur=$request->input('id_fournisseur');
        $entrer->id_produit=$request->input('id_produit');
        $entrer->quantite=$request->input('quantite');
        $entrer->prixEntree=$request->input('prixEntree')  ;
        $entrer->dateEntree=Carbon::now();
        $produit = Produit::find($request->input('id_produit'));
        $produit->quantite = $produit->quantite + $request->input('quantite');
        $produit->save();
        $entrer->save();
          return redirect()->route('entrers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrer $entrer)
    {
        return view('achats.show',['entrer'=>$entrer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrer $entrer)
    {
        //
        return view('achats.edit',['entrer'=>$entrer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrer $entrer)
    {
        $request->validate([
            'id_fournisseur'=>'required',
            'id_produit'=>'required',
            'quantite'=>'required',
            'prixEntree'=>'required',
        ]);
        $entrer->id_fournisseur= $request->input('id_fournisseur') ??  $entrer->id_fournisseur ;
        $produit=Produit::find($entrer->id_produit);
        if (abs($entrer->quantite - $request->input('quantite')) < ($entrer->quantite) )  {
            # code...
            $produit->quantite= $produit->quantite - abs($entrer->quantite - $request->input('quantite')) ?? $produit->quantite;
            $produit->save();
        }else{
            $produit->quantite= $produit->quantite + abs($entrer->quantite - $request->input('quantite')) ?? $produit->quantite;
            $produit->save();

        }

        $entrer->id_produit=$request->input('id_produit') ?? $entrer->id_produit;
        $entrer->quantite= $request->input('quantite') ?? $entrer->quantite ;
        $entrer->prixEntree= $request->input('prixEntree') ?? $entrer->prixEntree  ;
        $entrer->dateEntree= $entrer->updated_at ?? $entrer->dateEntree ;
        $entrer->save();
        return redirect()->route('entrers.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrer $entrer)
    {
        //
        $entrer->delete();
        $produit=Produit::find($entrer->id_produit);
        $produit->quantite -=$entrer->quantite;
        $produit->save();
        return redirect()->route('entrers.index');
    }
}
