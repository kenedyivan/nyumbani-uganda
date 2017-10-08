@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Agent Profile</title>
@endsection
@section('content')


    <!--start section page body-->
    <section id="section-body">

        <div class="container">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-left">
                            <h1 class="title-head">Welcome back, {{$agent->username}}</h1>
                        </div>
                        <div class="page-title-right">
                            <ol class="breadcrumb"><li><a href="/"><i class="fa fa-home"></i></a></li><li class="active">My Profile</li></ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="user-dashboard-full">
                @include('agents.agent_tabbed_menu')
                <div class="profile-area-content">
                    <div class="profile-area account-block white-block">

                        <form action="{{route('agent.edit.submit')}}" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4 col-sm-5">
                                    <div class="my-avatar">
                                        <img src="/images/agents/profile_330x330/{{$agent->profile_picture}}" alt="Avatar">
                                        {{ Form::file("edit_photo") }}
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-7">
                                    <h4>Information</h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="firstname">First Name</label>
                                                <input type="text" id="firstname" name="first_name" class="form-control" value="{{$agent->first_name}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="lastname">Last Name</label>
                                                <input type="text" id="lastname" name="last_name" class="form-control" value="{{$agent->last_name}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="email" class="form-control" value="{{$agent->email}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="title">Company Title</label>
                                                <input type="text" id="title" name="company" class="form-control" value="{{$agent->company}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="about">About me</label>
                                                <textarea id="about" name="bio" class="form-control" rows="5">{{$agent->bio}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <h4>Social Media</h4>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="facebook">Facebook URL</label>
                                        <input type="text" id="facebook" name="facebook_link" class="form-control" value="{{$agent->facebook_link}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="twitter">Twitter URL</label>
                                        <input type="text" id="twitter" name="twitter_link" class="form-control" value="{{$agent->twitter_link}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin URL</label>
                                        <input type="text" id="linkedin" name="linkedin_link" class="form-control" value="{{$agent->linkedin_link}}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="profile-area account-block white-block">
                        <h4>Change password</h4>
                        <form action="{{route('agent.update.submit')}}" method="post">
                          {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="oldpass">Old password</label>
                                        <input type="password" id="oldpass" name="oldpass" class="form-control" placeholder="Enter your facebook profile or page">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="newpass">New password</label>
                                        <input type="password" id="newpass" name="newpass" class="form-control" placeholder="Enter your new password">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="confirmpass">Confirm password</label>
                                        <input type="password" id="confirmpass" name="confirmpass" class="form-control" placeholder="Confirm new password">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update password</button>
                        </form>
                    </div><!--
                    <div class="profile-area account-block white-block">
                        <h4 class="account-action-title"> Account role </h4>
                        <div class="account-action-right">
                            <select name="location" class="selectpicker" data-live-search="false" data-live-search-style="begins" title=" Registered User ">
                                <option>Option</option>
                            </select>
                        </div>
                    </div>
                    <div class="profile-area account-block white-block">
                        <h4 class="account-action-title"> Delete account </h4>
                        <div class="account-action-right">
                            <button class="btn btn-danger"> Detele My Account </button>
                        </div>
                    </div>-->
                </div>

            </div>
        </div>

    </section>
    <!--end section page body-->

@endsection
