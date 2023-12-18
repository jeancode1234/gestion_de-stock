@extends('layouts.siderbar')
@section('content')
<div class="content">
    <div class="content">
        <div class="container-fluid">
           <div class="row align-item-center justify-content-center">
            @if ($category)
                
           
            <div class="col-md-6 bg-light py-3 rounded">
                <div class="col-md-12 py-3">
                    <h2 class="text-center text-dark">Modification de la categorie: {{$category->id}}</h2>
                </div>
                <form action="{{route('categorie.update',$category->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Nom de la categorie:</label>
                        <input type="text" name="nom" value="{{$category->nom}}" class="form-control text-dark" id="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="">Description:</label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control text-dark">

                        </textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Modifier</button>
                           
                                <a href="{{route('categorie')}}" class="btn btn-primary">Retour</a>
                
                           
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