@extends('layouts.siderbar')
@section('content')
    <div class="content">
        <div class="container-fluid  justify-content-center">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <a href="{{route('produits.index')}}" class="text-light"><- Back</a>
                    </div>
                    
                  </div>
                  <div class="card-body">
                    <form action="{{route('produits.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="row justify-content-center">
                          <div class="avatar">
                            <div class="flt">
                            <img src="" alt="" class="js-image-upload">
                            <label for="avatar" class="label-img">
                              <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>              
                              </span>
                            </label>
                          
                            <input type="file" id="avatar" name="image">
                          </div>
                        </div>
                        </div>
                          <div class="form-group ">
                            <label class="bmd-label-floating">Categorie du produit</label>
                            <option value="" selected disabled>--Choisir une categorie--</option>
                            <select name="id_cat" id="" class="form-control">
                              @foreach (App\Models\Category::all() as $cat)
                              <option value="{{$cat->id}}">{{$cat->nom}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                        
                          <div class="form-group">
                            <label class="bmd-label-floating">Nom du produit</label>
                            <input type="text" name="nom" class="form-control">
                          </div>
                        
                          <div class="form-group">
                            <label class="bmd-label-floating">Quantité du produit</label>
                            <input type="number" name="quantite" class="form-control">
                          </div>
                        
                          <div class="form-group">
                            <label class="bmd-label-floating">Prix du produit</label>
                            <input type="number" name="prix" class="form-control">
                          </div>
                       
                          <div class="form-group">
                            <label class="bmd-label-floating">Description du produit</label>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                          </div>
                      
                      <button type="submit" name="submit" class="btn btn-rose pull-right">Inserer le produit</button>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection