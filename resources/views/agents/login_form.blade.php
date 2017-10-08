@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Login</title>
@endsection
@section('content')
    <!--start advanced search section-->

    <!--end advanced search section-->
    <!--start section page body-->
    <section id="section-body">
        <div class="container">
            <div class="page-title page-title-center breadcrumb-top">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb"><li ><a href="/"><i class="fa fa-home"></i></a></li><li class="active">Login</li></ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-register-block login-block">
                        <div class="login-register-title clearfix">
                            <h2 class="pull-left">Login</h2>
                            <a href="{{route('agent.register.form')}}" class="pull-right"> Do you need an account? </a>
                        </div>
                        <form action="{{route('agent.login.submit')}}" method="post">
                        {{ csrf_field() }}
                            @if($errors)
                                @foreach ($errors->all() as $message)
                                    <div class="alert alert-danger alert-dismissible fade in">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error!</strong> {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                            <div class="form-group field-group">
                                <div class="input-user input-icon">
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                                <div class="input-email input-icon">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="forget-block clearfix">
                                <div class="form-group pull-left">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group pull-right">
                                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#pop-reset-pass">Lost your password.</a>
                                </div>
                            </div>
                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-primary btn-block">Login</button>
                        </form>
                        <hr>
                        <a href="auth/facebook" class="btn btn-social btn-bg-facebook btn-block"><i class="fa fa-facebook"></i> login with facebook</a><!--
                        <a href="#" class="btn btn-social btn-bg-linkedin btn-block"><i class="fa fa-linkedin"></i> login with linkedin</a>-->
                        <a href="auth/google" class="btn btn-social btn-bg-google-plus btn-block"><i class="fa fa-google-plus"></i> login with Google</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section page body-->
@endsection
