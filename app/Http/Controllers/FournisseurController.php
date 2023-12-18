<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fournisseurs=Fournisseur::all();
        return  view('fournisseurs.index',['fournisseurs'=>$fournisseurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'adresse'=>'required|string',
            'telephone'=>'required|string',
            'email'=>'required',
        ]);
              $fournisseur=new Fournisseur();
        $fournisseur->nom=$request->input('nom');
        $fournisseur->prenom=$request->input('prenom');
        $fournisseur->adresse=$request->input('adresse');
        $fournisseur->telephone=$request->input('telephone');
        $fournisseur->email=$request->input('email');
        $fournisseur->save();
        return redirect()->route('fournisseurs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        //
        return view('fournisseurs.show',['fournisseur'=>$fournisseur]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit',['fournisseur'=>$fournisseur]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'adresse'=>'required|string',
            'telephone'=>'required|string',
            'email'=>'required',
        ]);
          
        $fournisseur->nom= $fournisseur->nom ?? $request->input('nom');
        $fournisseur->prenom= $fournisseur->prenom ?? $request->input('prenom');
        $fournisseur->adresse= $fournisseur->adresse ?? $request->input('adresse');
        $fournisseur->telephone= $fournisseur->telephone ?? $request->input('telephone');
        $fournisseur->email= $fournisseur->email ?? $request->input('email');
        $fournisseur->update();
        return redirect()->route('fournisseurs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        
        $fournisseur->delete();
        return redirect()->route('fournisseurs.index');
    }
}
