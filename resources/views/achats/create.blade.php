@extends('layouts.siderbar')
@section('content')
<div class="content">
    <div class="content">
        <div class="container-fluid">
           <div class="row align-item-center justify-content-center">
            
            <div class="col-md-6 bg-light py-3 rounded">
                <div class="col-md-12 py-3">
                    <h2 class="text-center text-dark">creation d'une Entrée</h2>
                </div>
                <form action="{{route('entrers.store')}}" method="post">
                    @csrf
                    <div class="form-group mt-5 mb-2">
                         <select name="id_fournisseur" id="id_fournisseur" class="form-control">
                            <option value="">choix de votre fournisseur*</option>
                            @foreach ( App\Models\Fournisseur::all() as $fournisseur )
                                <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                            @endforeach
                         </select>
                    </div>
                    <div class="form-group mt-5 mb-2">
                         <select name="id_produit" id="id_produit" class="form-control">
                            <option value="">choix de votre produit*</option>
                            @foreach ( App\Models\Produit::all() as $produit )
                                <option value="{{$produit->id}}">{{$produit->nom}}</option>
                            @endforeach
                         </select>
                    </div>
                    <div class="form-group mt-5">
                        <label for="">Quantite:</label>
                        <input type="number" name="quantite" class="form-control text-dark" id="quantite" required>
                    </div>
                    <div class="form-group mt-5">
                        <label for="">Prix:</label>
                        <input type="number" name="prixEntree" class="form-control text-dark" id="prix" required>
                         
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <a href="{{route('entrers.index')}}" class="btn btn-primary">Retour</a>    
                            
                            <button type="submit" class="btn btn-success">Creer</button>
                        </div>
                    </div>
                </form>
            </div>
           </div>
        </div>
    </div>
</div>
@endsection