@extends('...layouts.admin')

@section('content')

    <?php $menu = "blog"; $sub = "post-listings";  ?>
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
                                    <h4 class="page-section-heading">Edit post</h4>
                                    <div class="panel panel-default">
                                      <div class="panel-body">
                                        <form class="form-horizontal" role="form"
                                        action="{{ route('admin.post.edit.submit') }}" method="post"
                                        enctype="multipart/form-data">
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       id="inputEmail3" value="{{$post->title}}" name="title" placeholder="Title">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Slug</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                       id="inputEmail3" value="{{$post->slug}}" name="slug" placeholder="Slug">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Body</label>
                                            <div class="col-sm-9">
                                              <textarea class="form-control" rows="5"
                                                        name="blog-editor" id="blog-editor">
                                                  {!!  $post->body !!}
                                              </textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="photo">
                                            </div>
                                          </div>
                                          <div class="form-group margin-none">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                {{ csrf_field() }}
                                              <input type="hidden" name="id" value="{{$post->id}}" />
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
