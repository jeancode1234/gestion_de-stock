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
                                    
                                    <form action="{{route('entrers.destroy',$entrer->id)}}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                            <a href="{{route('entrers.index',$entrer->id)}}" rel="tooltip" class="btn btn-info btn-round mx-1">
                                                <i class="material-icons">back</i>
                                            </a>
                                            <a href="{{route('entrers.edit',$entrer->id)}}" rel="tooltip" class="btn btn-info btn-round">
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
                                <td>{{$entrer->id}}</td>
                               </tr>
                               <tr>
                                <th>nom_fournisseur</th>
                                <td>{{$entrer->fournisseurs->nom}}</td>
                               </tr>
                               <tr>
                                <th>produit</th>
                                <td>   <img src="{{asset('storage/images/'.$entrer->produits->image)}}" alt="" height="50px" width="50px"> {{$entrer->produits->nom}}</td>
                               </tr>
                               <tr>
                                <th>prix</th>
                                <td>{{$entrer->prixEntree}}</td>
                               </tr>
                               <tr>
                                <th>quantite</th>
                                <td>{{$entrer->quantite}}</td>
                               </tr>
                               <tr>
                                <th>montant_total</th>
                                <td>{{$entrer->prixEntree*$entrer->quantite}}</td>
                               </tr>
                               <tr>
                                <th>Date_creation</th>
                                <td>{{$entrer->created_at}}</td>
                               </tr>
                               <tr>
                                <th>Date de mise à jour</th>
                                <td>{{$entrer->updated_at}}</td>
                               </tr>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection