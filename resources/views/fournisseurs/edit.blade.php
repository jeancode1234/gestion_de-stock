@extends('layouts.siderbar')
@section('content')
<div class="content">
    <div class="content">
        <div class="container-fluid">
           <div class="row align-item-center justify-content-center">
            @if ($fournisseur)
                
           
            <div class="col-md-6 bg-light py-3 rounded">
                <div class="col-md-12 py-3">
                    <h2 class="text-center text-dark">Modification d'un fournisseur: {{$fournisseur->nom}}</h2>
                </div>
                <form action="{{route('fournisseurs.update',$fournisseur->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nom de la categorie:</label>
                        <input type="text" name="nom" value="{{old('nom',$fournisseur->nom)}}" class="form-control text-dark" id="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="">Prenom du fournisseur:</label>
                        <input type="text" name="prenom" value="{{old('prenom',$fournisseur->prenom)}}" class="form-control text-dark" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Adresse du fournisseur:</label>
                        <input type="text" value="{{old('adresse',$fournisseur->adresse)}}" name="adresse" class="form-control text-dark" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Telephone:</label>
                        <input type="text" value="{{old('telephone',$fournisseur->telephone)}}" name="telephone" class="form-control text-dark" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">email:</label>
                        <input type="text" name="email" value="{{old('email',$fournisseur->email)}}" class="form-control text-dark" id="" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Modifier</button>
                           
                                <a href="{{route('fournisseurs.index')}}" class="btn btn-primary">Retour</a>
                
                           
                        </div>
                    </div>
                </form>
            </div>
            @endif
           </div>
        </div>
    </div>
</div>
@endsection