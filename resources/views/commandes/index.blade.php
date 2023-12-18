@extends('layouts.siderbar')
@section('content')
<div class="content">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-md-12">
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
                                        <a href="{{route('categorie.create')}}" class="btn btn-primary">Ajouter</a>

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
                              <th>Nom</th>
                              <th>Description</th>
                              <th>Date creation</th>
                              <th class="text-right">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($categories as $key=>$categorie )
                            <tr>
                                
                                <td>{{++$key}}</td>
                                <td>{{$categorie->nom}}</td>
                                <td>{{$categorie->description}}</td>
                                <td class="text-center">{{$categorie->created_at}}</td>
                                <td class="td-actions text-right d-flex justify-content-end">
                                    <a href="{{route('categorie.edit',$categorie->id)}}" rel="tooltip" class="btn btn-info btn-round">
                                        <i class="material-icons">edit</i>
                                    </a>
        
                                    <a href="{{route('categorie.show',$categorie->id)}}" rel="tooltip" class="btn btn-info btn-round mx-1">
                                        <i class="material-icons">person</i>
                                    </a>
                                    <form action="{{route('categorie.delete',$categorie->id)}}" method="post" >
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
                </div> --}}
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                      <div class="row">
                        <div class="col-md-10">
                            <div class="card-icon">
                                <i class="material-icons">store</i>
                              </div>
                              <h4 class="card-title">Liste de toutes les commandes clients</h4>
                        </div>
                       
                    </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th></th>
                              <th class="text-center">Nom de l'article</th>
                              <th class="text-center">Quantité commandée</th>
                              <th class="text-center">Prix commande</th>
                              <th class="text-center">Montant CDE</th>
                              <th class="text-center">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($commandes as $key=>$commande )
                            <tr>
                              <td class="text-center">{{++$key}}</td>
                              <td>
                                <img src="{{asset('storage/images/'.$commande->produits->image)}}" width="100" height="100" alt="">
                              </td>
                              <td class="text-center">{{$commande->produits->nom}}</td>
                              <td class="text-center">{{$commande->quantite}}</td>
                              <td class="text-center">{{$commande->prixVente}}</td>
                              <td class="text-center">{{$commande->quantite * $commande->prixVente}}</td>
                              <td class="td-actions text-right d-flex align-item-center justify-content-end">
                                
                                <a href="{{route('produits.show',$commande->id)}}" rel="tooltip" class="btn btn-info btn-round mx-1" title="voir details">
                                    <i class="material-icons">details</i>
                                </a>
                               
                            </td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                          
                        </table>
                          <tr>
                            {{$commandes->links()}}
                          </tr>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
        </div>
    </div>
</div>
@endsection