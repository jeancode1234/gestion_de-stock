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
                                        <a href="{{route('fournisseurs.create')}}" class="btn btn-primary">Ajouter</a>

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
                              <th>Prenom</th>
                              <th>Adresse</th>
                              <th>Telephone</th>
                              <th>email</th>
                              <th>Date creation</th>
                              <th class="text-right">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($fournisseurs as $key=>$fournisseur )
                            <tr>
                                
                                <td>{{++$key}}</td>
                                <td>{{$fournisseur->nom}}</td>
                                <td>{{$fournisseur->prenom}}</td>
                                <td>{{$fournisseur->adresse}}</td>
                                <td>{{$fournisseur->telephone}}</td>
                                <td>{{$fournisseur->email}}</td>
                                <td class="text-center">{{$fournisseur->created_at}}</td>
                                <td class="td-actions text-right d-flex justify-content-end">
                                    <a href="{{route('fournisseurs.edit',$fournisseur->id)}}" rel="tooltip" class="btn btn-info btn-round">
                                        <i class="material-icons">edit</i>
                                    </a>
        
                                    <a href="{{route('fournisseurs.show',$fournisseur->id)}}" rel="tooltip" class="btn btn-info btn-round mx-1">
                                        <i class="material-icons">person</i>
                                    </a>
                                    <form action="{{route('fournisseurs.destroy',$fournisseur->id)}}" method="post" >
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
                {{-- <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">assignment</i>
                      </div>
                      <h4 class="card-title">Striped Table</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th></th>
                              <th>Product Name</th>
                              <th>Type</th>
                              <th>Qty</th>
                              <th class="text-right">Price</th>
                              <th class="text-right">Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">1</td>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="" checked>
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Moleskine Agenda</td>
                              <td>Office</td>
                              <td>25</td>
                              <td class="text-right">&euro; 49</td>
                              <td class="text-right">&euro; 1,225</td>
                            </tr>
                            <tr>
                              <td class="text-center">2</td>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="" checked>
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Stabilo Pen</td>
                              <td>Office</td>
                              <td>30</td>
                              <td class="text-right">&euro; 10</td>
                              <td class="text-right">&euro; 300</td>
                            </tr>
                            <tr>
                              <td class="text-center">3</td>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="" checked>
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>A4 Paper Pack</td>
                              <td>Office</td>
                              <td>50</td>
                              <td class="text-right">&euro; 10.99</td>
                              <td class="text-right">&euro; 109</td>
                            </tr>
                            <tr>
                              <td class="text-center">4</td>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Apple iPad</td>
                              <td>Meeting</td>
                              <td>10</td>
                              <td class="text-right">&euro; 499.00</td>
                              <td class="text-right">&euro; 4,990</td>
                            </tr>
                            <tr>
                              <td class="text-center">5</td>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>Apple iPhone</td>
                              <td>Communication</td>
                              <td>10</td>
                              <td class="text-right">&euro; 599.00</td>
                              <td class="text-right">&euro; 5,999</td>
                            </tr>
                            <tr>
                              <td colspan="5"></td>
                              <td class="td-total">
                                Total
                              </td>
                              <td class="td-price">
                                <small>&euro;</small>12,999
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div> --}}
                
              </div>
        </div>
    </div>
</div>
@endsection