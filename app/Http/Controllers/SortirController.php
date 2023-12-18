<?php

namespace App\Http\Controllers;

use App\Models\Sortir;
use App\Models\Commande;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SortirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achats = Sortir::select('*')->orderBy('created_at','DESC')->paginate('5');
        return view('ventes.index',compact('achats'));
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
    public function store(Commande $commande)
    {
        $existance = Sortir::where('commande_id',$commande->id)->exists();
        if ($existance) {
            return back()->with('success','echec de l\'achat !!');
        }
        else {
            $vente = new Sortir();
            $vente->id_user = $commande->id_user;
            $vente->commande_id = $commande->id;
            $vente->quantite = $commande->quantite;
            $vente->prixSortie = $commande->quantite * $commande->prixVente;
            $vente->dateSortie = Carbon::now(); 
            $vente->save();
            
            return redirect()->route('facture',$commande->id);
        }
        
        // 
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Sortir $sortir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sortir $sortir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sortir $sortir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sortir $sortir)
    {
        $sortir->delete();

        return back();
    }

    public function genererFacture($commandeId)
    {
        $commande = Commande::findOrFail($commandeId);
        $articles = Sortir::where('commande_id', $commandeId)->get(); 
        $pdf = PDF::loadView('facture', compact('commande','articles'));

        // Sauvegarder le PDF ou le renvoyer en réponse HTTP
    
        return $pdf->download('facture.pdf');
    }

    public function Mesachats()
    {
        $achats = Sortir::select('*')->where('id_user',Auth::user()->id)->orderBy('created_at','desc')
                              ->get();
        $total = $achats->count();
          return view('ventes.mesachats',['achats'=>$achats,'total'=>$total]);
    }
}
