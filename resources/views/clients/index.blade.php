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
                                          <h4 class="card-title">Liste des clients</h4>
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
                              <th>Adresse</th>
                              <th>Téléphone</th>
                              <th>Email</th>
                              <th class="text-right">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($clients as $key=>$client )
                            <tr>
                                
                                <td>{{++$key}}</td>
                                <td>{{$client->nom}}</td>
                                <td>{{$client->adresse}}</td>
                                <td>{{$client->telephone}}</td>
                                <td>{{$client->email}}</td>
                                <td class="td-actions text-right d-flex justify-content-end">
        
                                    {{-- <a href="{{route('categorie.show',$categorie->id)}}" rel="tooltip" class="btn btn-info btn-round mx-1">
                                        <i class="material-icons">person</i>
                                    </a> --}}
                                    <form action="{{route('client.delete',$client->id)}}" method="post" >
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
                        {{$clients->links()}}
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
        </div>
    </div>
</div>
@endsection