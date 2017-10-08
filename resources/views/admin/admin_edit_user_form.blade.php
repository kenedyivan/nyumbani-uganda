@extends('...layouts.admin')

@section('content')

    <?php $menu = ""; $sub = "";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">


                  @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                            <div class="panel panel-default">
                                <!-- Progress table -->
                                <div class="table-responsive">
                                    <h4 class="page-section-heading">Edit user</h4>
                                    <div class="panel panel-default">
                                      <div class="panel-body">
                                        <form class="form-horizontal" role="form"
                                        action="{{ route('admin.user.edit.submit') }}" method="post">
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">First name</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputEmail3"
                                              name="firstname" value="{{$user->firstname}}" placeholder="Edit firstname">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Last name</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputEmail3"
                                              name="lastname" value="{{$user->lastname}}" placeholder="Edit lastname">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">User name</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputEmail3"
                                              name="username" value="{{$user->username}}" placeholder="Edit username">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputEmail3"
                                              name="email" value="{{$user->email}}" placeholder="Edit email">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                              <input type="password" class="form-control" id="inputEmail3"
                                              name="new_password" placeholder="Enter new password">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Repeat password</label>
                                            <div class="col-sm-9">
                                              <input type="password" class="form-control" id="inputEmail3"
                                              name="repeat_password" placeholder="Repeat password">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-3 control-label">Role</label>
                                            <div class="col-sm-9">
                                              <select name="role" class="selectpicker" data-style="btn-white" data-live-search="true" data-size="5">
                                                <option value="" selected="selected">
                                                  @if($user->role == 0)
                                                    Super admin
                                                  @else
                                                    Admin
                                                  @endif
                                                </option>
                                                <option value="0">Super admin</option>
                                                <option value="1">Admin</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group margin-none">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                {{ csrf_field() }}
                                              <input type="hidden" name="id" value="{{$user->id}}" />
                                              <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                                <!-- // Progress table -->

                            </div>

                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!-- /st-content-inner -->

    </div>
    <!-- /st-content -->

@endsection
