@extends('layouts.guest',['title' => 'Login Page','active' => 'login'])

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form  action="{{route('login')}}" method="post" >
                @csrf
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contacts</i>
                  </div>
                  <h4 class="card-title">Login Form</h4>
                </div>
                <div class="card-body ">
                  <div class="form-group bmd-form-group">
                   <label for="exampleEmails" class="bmd-label-floating"> Email Address *</label>
                    <input type="email" class="form-control" id="exampleEmails" required="true" name="email" aria-required="true">
                  </div>
                  <div class="form-group bmd-form-group">
                    <label for="examplePasswords" class="bmd-label-floating"> Password *</label>
                    <input type="password" class="form-control" id="examplePasswords" required="true" name="password" aria-required="true">
                  </div>
                  <div class="category form-category">* Required fields</div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-rose">Login</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
