@extends('layouts.siderbar')

@section('content')
    <div class="content">
        <div class="content">
            <div class="container-fluid">
                @if (Auth::user()->type==1)
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <p class="card-category">Locations</p>
                                <h3 class="card-title"></h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">equalizer</i>
                                </div>
                                <p class="card-category">Customers</p>
                                <h3 class="card-title"></h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">store</i>
                                </div>
                                <p class="card-category">Cars</p>
                                <h3 class="card-title"></h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <p class="card-category">Balance</p>
                                <h3 class="card-title"></h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row my-5 bg-light ">
                    <div class="col-md-12">
                        <div class="row pt-3 justify-content-center">
                            <div class="col-md-8">
                                <h2 class="text-center">Faites le choix de vos produits et commandez maintenant !!</h2>
                                <form action="" method="GET" class="py-2">
                                    <div class="form-group">
                                        <input type="text" name="name" class="p-2 w-75 rounded" placeholder="recheche d'un produit...">
                                        <button type="submit" class="btn btn-primary">Rechercher</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                         @if (session('success'))
                             <h4 class="text-success text-center">{{session('success')}}</h4>
                            
                         @endif
                    </div>
                </div>
                <div class="row">
                    @foreach ($produits as $produit )
                        
                  
                    <div class="col-md-4">
                        <div class="card card-product" data-count="0">
                            <a href="{{route('produits.show',$produit->id)}}" >
                                <div class="card-header card-header-image" data-header-animation="true">
                                
                                        <img class="img" src="{{asset('storage/images/'.$produit->image)}}">
                                
                                </div>
                            </a>
                            <div class="card-body">
                                {{-- <div class="card-actions text-center">
                                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>
                                    <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                                        <i class="material-icons">art_track</i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div> --}}
                                <h4 class="card-title">
                                   {{$produit->nom}}
                                </h4>

                            </div>
                            <div class="card-footer">
                                <div class="price">
                                    <h4 ><strong class="text-success">{{$produit->prix}}frs</strong></h4>
                                </div>
                               
                                    
                                      <div class="card-body text-center">
                                        <a href="{{route('produits.show',$produit->id)}}"  class="btn btn-rose btn-fill">plus de details</a>
                                       
                                      </div>
                                      
                            </div>
                                  
                        </div>
                    </div>
               
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection
