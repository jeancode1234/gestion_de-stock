@extends('layouts.siderbar')
@section('content')
    <div class="content">
        <div class="content">
            <div class="row ">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h2>{{$category->nom}}</h2>
                            <p>{{$category->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection