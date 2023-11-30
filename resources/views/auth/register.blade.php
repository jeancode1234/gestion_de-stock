@extends('layouts.guest',['title' => 'Register Page','active' => 'register'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="RegisterValidation" action="{{route('register')}}" method="post" novalidate="novalidate">
                @csrf
              <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">mail_outline</i>
                  </div>
                  <h4 class="card-title">Register Form</h4>
                </div>
                <div class="card-body ">
                  <div class="form-group bmd-form-group">
                    <label for="exampleEmail" class="bmd-label-floating"> Email Address *</label>
                    <input type="email" class="form-control" id="exampleEmail" required="true" aria-required="true">
                  </div>
                  <div class="form-group bmd-form-group">
                    <label for="examplePassword" class="bmd-label-floating"> Password *</label>
                    <input type="password" class="form-control" id="examplePassword" required="true" name="password" aria-required="true">
                  </div>
                  <div class="form-group bmd-form-group">
                    <label for="examplePassword1" class="bmd-label-floating"> Confirm Password *</label>
                    <input type="password" class="form-control" id="examplePassword1" required="true" equalto="#examplePassword" name="password_confirmation" aria-required="true">
                  </div>
                  <div class="category form-category">* Required fields</div>
                </div>
                <div class="card-footer text-right">
                  <div class="form-check mr-auto">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="" required="" aria-required="true"> Subscribe to newsletter
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <button type="submit" class="btn btn-rose">Register</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
