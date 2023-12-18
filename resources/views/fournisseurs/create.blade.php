@extends('layouts.siderbar')
@section('content')
<div class="content">
    <div class="content">
        <div class="container-fluid">
           <div class="row align-item-center justify-content-center">
            
            <div class="col-md-6 bg-light py-3 rounded">
                <div class="col-md-12 py-3">
                    <h2 class="text-center text-dark">creation d'un fournisseur</h2>
                </div>
                <form action="{{route('fournisseurs.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nom du fournisseur:</label>
                        <input type="text" name="nom" class="form-control text-dark" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Prenom du fournisseur:</label>
                        <input type="text" name="prenom" class="form-control text-dark" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Adresse du fournisseur:</label>
                        <input type="text" name="adresse" class="form-control text-dark" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Telephone:</label>
                        <input type="text" name="telephone" class="form-control text-dark" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">email:</label>
                        <input type="text" name="email" class="form-control text-dark" id="" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <a href="{{route('fournisseurs.index')}}" class="btn btn-primary">Retour</a>    
                            
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