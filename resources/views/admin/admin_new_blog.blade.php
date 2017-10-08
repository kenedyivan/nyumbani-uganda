@extends('...layouts.admin')

@section('content')

    <?php $menu = "blog"; $sub = "new-post";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                            <h4 class="page-section-heading">New post</h4>
                            <div class="panel panel-default">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form role="form"
                                        action="{{route('admin.create.post.submit')}}" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                    <input type="text" class="form-control"
                                                           id="inputEmail3" name="title" placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                    <input type="text" class="form-control"
                                                           id="inputEmail3" name="slug" placeholder="Slug">
                                            </div>
                                            <div class="form-group">
                                                    <textarea class="form-control" rows="5"
                                                              name="blog-editor" id="blog-editor"></textarea>
                                            </div>
                                            <div class="form-group">
                                                        <input type="file" class="form-control" name="photo">
                                            </div>

                                            <div class="form-gourp">
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
                                                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-primary">Add</button>
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
