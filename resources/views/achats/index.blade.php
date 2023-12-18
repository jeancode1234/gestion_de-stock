@extends('layouts.siderbar')
@section('content')
<div class="content">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="card-icon">
                                            <i class="material-icons">assignment</i>
                                          </div>
                                          <h4 class="card-title">Simple Table</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{route('entrers.create')}}" class="btn btn-primary">Ajouter</a>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                      
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th>Nom_fournisseur</th>
                              <th>Produit</th>
                              <th>quantite</th>
                              <th>prix_unitaire</th>
                              <th>Montant_total</th>
                              <th>Date creation</th>
                              <th class="text-right">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($entrers as $key=>$entrer )
                            <tr>
                                
                                <td>{{++$key}}</td>
                                <td>{{$entrer->fournisseurs->nom}}</td>
                                <td> <img src="{{asset('storage/images/'.$entrer->produits->image)}}" alt="" height="50px" width="50px"> {{$entrer->produits->nom}}</td>
                                <td>{{$entrer->quantite}}</td>
                                <td>{{$entrer->prixEntree}}</td>
                                <td>{{$entrer->prixEntree*$entrer->quantite}}</td>
                                <td class="text-center">{{$entrer->created_at}}</td>
                                <td class="td-actions text-right d-flex justify-content-end">
                                    <a href="{{route('entrers.edit',$entrer->id)}}" rel="tooltip" class="btn btn-info btn-round">
                                        <i class="material-icons">edit</i>
                                    </a>
        
                                    <a href="{{route('entrers.show',$entrer->id)}}" rel="tooltip" class="btn btn-info btn-round mx-1">
                                        <i class="material-icons">person</i>
                                    </a>
                                    <form action="{{route('entrers.destroy',$entrer->id)}}" method="post" >
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-round" rel="tooltip" >
                                        <i class="material-icons">close</i>
                                      </button>        
                                    </form>
                                  
                                </td>
                              </tr>
                              
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
        </div>
    </div>
</div>
@endsection