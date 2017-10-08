@extends('...layouts.admin')

@section('content')
    <?php $menu = ""; $sub = "";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">
                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                            <h4 class="page-section-heading">Profile</h4>
                        <div>
                            <div class="panel panel-default">
                                <!-- Progress table -->
                                <div class="table-responsive">
                                    <table class="table v-middle">
                                            <tr>
                                                <td>Name:</td>
                                                <td>{{$user->firstname}} {{$user->lastname}}</td>
                                            </tr>

                                            <tr>
                                                <td>Username:</td>
                                                <td>{{$user->username}}</td>
                                            </tr>

                                            <tr>
                                                <td>Email:</td>
                                                <td>{{$user->email}}</td>
                                            </tr>
                    					    <tr>
                    					    	<td>Role:</td>
                    						<td>
                    						    @if($user->role == 0)
                    						        Super admin
                    						    @elseif($user->role == 1)
                    						        Admin
                    						    @endif
                    						</td>
                                            </tr>
                                            <tr>
                                                <td>Actions:</td>
                        						<td>
                                                    <a href="{{ route('admin.user.edit.form',['id'=>$user->id])}}" class="btn btn-warning">Edit</a>
                                                    @if(Auth::guard('admin')->user()->role != 0)
                        							    <a href=""
                        							    class="btn btn-danger">Delete</a>
                        							@endif
                        						</td>
                                            </tr>
                                    </table>
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
