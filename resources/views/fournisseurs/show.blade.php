@extends('layouts.siderbar')
@section('content')
    <div class="content">
        <div class="content">
            <div class="row ">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="row">
                                <td class="td-actions text-right d-flex justify-content-end">
                                    
                                    <form action="{{route('fournisseurs.destroy',$fournisseur->id)}}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                            <a href="{{route('fournisseurs.index',$fournisseur->id)}}" rel="tooltip" class="btn btn-info btn-round mx-1">
                                                <i class="material-icons">back</i>
                                            </a>
                                            <a href="{{route('fournisseurs.edit',$fournisseur->id)}}" rel="tooltip" class="btn btn-info btn-round">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-round" rel="tooltip" >
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                </td>
                            </div>
                          <table class="table table-hover table-striped ">
                               <tr>
                                <th>id</th>
                                <td>{{$fournisseur->id}}</td>
                               </tr>
                               <tr>
                                <th>nom</th>
                                <td>{{$fournisseur->nom}}</td>
                               </tr>
                               <tr>
                                <th>prenom</th>
                                <td>{{$fournisseur->prenom}}</td>
                               </tr>
                               <tr>
                                <th>adresse</th>
                                <td>{{$fournisseur->adresse}}</td>
                               </tr>
                               <tr>
                                <th>telephone</th>
                                <td>{{$fournisseur->telephone}}</td>
                               </tr>
                               <tr>
                                <th>email</th>
                                <td>{{$fournisseur->email}}</td>
                               </tr>
                               <tr>
                                <th>Date_creation</th>
                                <td>{{$fournisseur->created_at}}</td>
                               </tr>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection