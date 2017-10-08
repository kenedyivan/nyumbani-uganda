@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Agent Details</title>
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


                <form method="post" action="{{route('agent.agent_details.submit')}}" enctype="multipart/form-data">
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
                                  <label for="property-title">Company</label>
                                  <input class="form-control" name="company" id="property-title" placeholder="Company">
                                  <input type="hidden" class="form-control" name="iduser" id="property-title" value="{{ $iduser }}">

                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Position</label>
                                  <input class="form-control" name="position" id="property-title" placeholder="Position">

                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Office Phone</label>
                                  <input class="form-control" name="office_phone" id="property-title" placeholder="Office Phone">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Mobile Number</label>
                                  <input class="form-control" name="mobile_phone" id="property-title" placeholder="Mobile Number">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Fax</label>
                                  <input class="form-control" name="fax" id="property-title" placeholder="Fax">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="about">About me</label>
                                  <textarea id="about" name="bio" class="form-control" rows="5"></textarea>
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Facebook Link</label>
                                  <input class="form-control" type="url" pattern="https?://.+" required name="facebook_link" id="property-title" placeholder="Facebook Link (with https://)">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Twitter Link</label>
                                  <input class="form-control" type="url" pattern="https?://.+"  name="twitter_link" id="property-title" placeholder="Twitter Link (with https://)">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="property-title">Linkedin Link</label>
                                  <input class="form-control" type="url" pattern="https?://.+" name="linkedin_link" id="property-title" placeholder="Linkedin Link (with https://)">
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
