<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Commande;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::select('*')->orderBy('created_at','DESC')->paginate(6);

        return view('commandes.index',['commandes'=>$commandes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Produit $produit)
    {
        $request->validate([
          'quantite'=>'required'
        ]);
        if ($request->quantite >= $produit->quantite) {
            return back()->with('error','Commande échouée veuillez entrer une quatité inferieure à '.$produit->quantite);
        }
        else {
            $commande = new Commande();
            $commande->id_produit = $produit->id;
            $commande->id_user = Auth::user()->id;
            $commande->quantite = $request->quantite;
            $commande->prixVente = $produit->prix;
            $commande->dateCommande = Carbon::now();
            
            $produit->quantite = $produit->quantite - $request->input('quantite');
            $produit->save();
            $commande->save();
            return redirect()->route('home')->with('success','Commande effectuée avec succès!!!');
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $produit = Produit::findOrFail($commande->id_produit);
        $produit->quantite += $commande->quantite;
        $produit->save();

        $commande->delete();
        return back();
    }

    public function Mescommandes()
    {
        $commandes = Commande::select('*')->where('id_user',Auth::user()->id)->orderBy('created_at','desc')
                              ->get();
        $total = $commandes->count();
          return view('commandes.mescommande',['commandes'=>$commandes,'total'=>$total]);
    }
    public function annulerAllCommande(Commande $commande)
    {
       $commandes = Commande::findOrFail($commande);
        
        // Réinitialisez la quantité des produits dans la base de données
        foreach ($commandes as $article) {
            $produit = Produit::findOrFail($article->id_produit);
            $produit->quantite += $article->quantite;
            $produit->save();
        }

        // Supprimez la commande et les articles associés
        $commandes->produits()->delete();
        $commandes->delete();

        // Redirigez l'utilisateur et renvoyez une réponse appropriée
        return back()->with('success', 'votre panier de commande a été annulée avec succès.');
    }
}

