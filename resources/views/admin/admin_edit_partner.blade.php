@extends('...layouts.admin')

@section('content')

    <?php $menu = "partners"; $sub = "partner-listings";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
                            <h4 class="page-section-heading">Edit partner</h4>
                            <div class="panel panel-default">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <form action="{{route('admin.partners.edit.save')}}"
                                              method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                           id="inputEmail3" placeholder="Edit name" name="name"
                                                           value="{{$partner->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Website</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                           placeholder="Edit website link" name="website"
                                                           value="{{$partner->website}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Upload new logo</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" name="photo">
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$partner->id}}" />
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

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
