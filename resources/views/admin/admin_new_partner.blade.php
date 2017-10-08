@extends('...layouts.admin')

@section('content')

    <?php $menu = "partners"; $sub = "new-partner";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
                            <h4 class="page-section-heading">New partner</h4>
                            <div class="panel panel-default">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <form action="{{route('admin.partners.new.submit')}}" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="http://..." name="website">
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="photo">
                                            </div>
                                            <div class="form-group">
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="active" id="radio12" value="1" checked>
                                                        <label for="radio12">Activate</label>
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="active" id="radio11" value="0">
                                                        <label for="radio11">Deactivte</label>
                                                    </div>
                                            </div>
                                            <div class="text-center">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">Add partner</button>
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
