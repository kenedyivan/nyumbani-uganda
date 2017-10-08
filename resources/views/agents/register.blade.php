@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Registration</title>
@endsection
@section('content')
<div class="container">
    <div class="page-title page-title-center breadcrumb-top">

    </div>
    <div class="row col-sm-12">
        <div class="col-sm-12">
            <div class="login-register-block login-block">
                <div class="login-register-title text-center">
                    <h2> Create an Account </h2>
                </div>


                <form action="{{route('register.submit')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  @foreach($errors->all() as $error)
                  <div class="alert alert-danger alert-dismissible fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error!</strong> {{ $error }}
                  </div>
                  @endforeach
                  <div class="add-tab-row push-padding-bottom">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Firstname</label>
                                  <input class="form-control" name="first_name" id="property-title" placeholder="Firstname">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Lastname</label>
                                  <input class="form-control" name="last_name" id="property-title" placeholder="Lastname">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Username</label>
                                  <input class="form-control" name="username" id="property-title" placeholder="Username">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Email Address</label>
                                  <input class="form-control" name="email" id="property-title" placeholder="Email Address">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Password</label>
                                  <input class="form-control" type="password" name="password" id="property-title" placeholder="Password">
                              </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label for="property-type">User Group</label>
                                <select class="selectpicker" name="user_type" id="property-type" data-live-search="false" data-live-search-style="begins" title="Select">
                                    <option value="0">Client</option>
                                    <option value="1">Agent</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Profile Picture</label>
                                  {{ Form::file('photo') }}
                              </div>
                          </div>
                      </div>
                  </div>
                    <button class="btn btn-primary btn-block">Register</button>
                    <a href="{{route('agent.login.form')}}" class="back text-center"> Back to Login </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
