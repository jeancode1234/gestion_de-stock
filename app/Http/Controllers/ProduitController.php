<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();

        return view('produits.index',['produits'=>$produits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'id_cat'=>'required',
           'nom'=>'required',
           'image'=>'required|image',
           'quantite'=>'required',
           'prix'=>'required',
           'description'=>'required',

        ]);

        $produit = new Produit();
        $produit->id_cat = $request->input('id_cat');
        $produit->nom = $request->input('nom');
        if($request->hasFile('image')){
            $picture = $request->file('image');

            $pictureFileName = 'picture_'.Str::random(6). '.' . $picture->getClientOriginalExtension();
            
            $path = "images/" . $pictureFileName;
                
            Storage::disk('public')->put($path, file_get_contents($picture));
            
            $produit->image = $pictureFileName;
        }

        $produit->quantite =$request->input('quantite');
        $produit->prix = $request->input('prix');
        $produit->description = $request->input('description');
        
        $produit->save();
        return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {

        return view('produits.show',['produit'=>$produit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit',['produit'=>$produit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'id_cat'=>'nullable',
            'nom'=>'nullable',
            'image'=>'nullable|image',
            'quantite'=>'nullable',
            'prix'=>'nullable',
            'description'=>'nullable',
 
         ]);
 
         $produit->id_cat = $request->input('id_cat') ?? $produit->id_cat;
         $produit->nom = $request->input('nom') ?? $produit->nom;
         $produit->quantite =$request->input('quantite') ?? $produit->quantite;
         $produit->prix = $request->input('prix') ?? $produit->prix;
         $produit->description = $request->input('description') ?? $produit->description;
 
         if($request->hasFile('image')){
             $picture = $request->file('image');
 
             $pictureFileName = 'picture_' .$produit->id . '.' . $picture->getClientOriginalExtension();
             
             $path = "images/" . $pictureFileName;
                 
             Storage::disk('public')->put($path, file_get_contents($picture));
 
             $produit->image = $pictureFileName ?? $produit->image;
         }
 
         $produit->save();
         return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
       $produit->delete();
       
       return back();
    }
}
