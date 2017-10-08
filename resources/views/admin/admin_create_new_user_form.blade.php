@extends('...layouts.admin')

@section('content')

    <?php $menu = "users"; $sub = "new-user";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
                            <h4 class="page-section-heading">New user</h4>
                            <!-- Progress table -->
                            <div class="table-responsive">
                                <div class="panel panel-default">
                                  <div class="panel-body">
                                          <div class="alert alert-danger">
                                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                              *Please complete all required fields
                                          </div>

                                          <!-- Signup -->
                                          <form role="form" action="{{ route('admin.register.submit') }}" method="post">
                                              <div class="form-group">
                                                  <input type="text" class="form-control" placeholder="First Name" name="firstname">
                                              </div>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                                              </div>
                                              <div class="form-group">
                                                  <input type="text" class="form-control" placeholder="Username" name="username">
                                              </div>
                                              <div class="form-group">
                                                  <input type="email" class="form-control" placeholder="Email" name="email">
                                              </div>
                                              <div class="form-group">
                                                  <input type="password" class="form-control" placeholder="Password" name="password">
                                              </div>
                                              <div class="form-group">
                                                  <select name="role" class="selectpicker" data-style="btn-white" data-live-search="true" data-size="5">
                                                      <option>Select role</option>
                                                      <option value="0">Super admin</option>
                                                      <option value="1">Admin</option>
                                                  </select>
                                              </div>
                                              <div class="text-center">
                                                  {{ csrf_field() }}
                                                  <button type="submit" class="btn btn-primary">Create user</button>
                                              </div>
                                          </form>
                                          <!-- //Signup -->

                                  </div>
                                </div>
                            </div>
                            <!-- // Progress table -->
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!-- /st-content-inner -->

    </div>
    <!-- /st-content -->

@endsection
