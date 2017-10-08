@extends('...layouts.admin')

@section('content')

    <?php $menu = "users"; $sub = "user-listings";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="row">
                    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

                    <h4 class="page-section-heading">Users</h4>
                <div class="panel panel-default">
                    <!-- Progress table -->
                    <div class="table-responsive">
                        <table class="table v-middle" style="text-transform: capitalize">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody id="responsive-table-body">
                            <?php $i = 1; ?>
                            @foreach($admins as $admin)
                                <tr>
                                    <td><span class="label label-default">{{$admin->created_at->format('M-d-Y')}}</span></td>

                                    <td>

                                        <img src="/admin-inc/images/people/110/woman-4.jpg" width="40" class="img-circle" />
                                        {{$admin->lastname}} {{$admin->username}}

                                    </td>
                                    <td style="text-transform: lowercase">{{$admin->email}}</td>
                                    <td>
                                        @if($admin->role == 0)
                                            <span class="label label-warning">Super admin</span>
                                        @endif
                                        @if($admin->role == 1)
                                            <span class="label label-success">admin</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.user.edit.form',['id'=>$admin->id])}}"
                                           class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top"
                                           title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route('admin.user.delete',['id'=>$admin->id])}}"
                                           class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top"
                                           title="Delete"><i
                                                    class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php $i = $i+1; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- // Progress table -->

                    <div class="panel-footer padding-none text-center">
                        <ul class="pagination">
                            <li class="disabled"><a href="#">&laquo;</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
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
