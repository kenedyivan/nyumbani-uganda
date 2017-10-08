@extends('...layouts.admin')

@section('content')

    <?php $menu = "news-letter"; $sub = "new-news-letter";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                            <h4 class="page-section-heading">New news letter</h4>
                            <div class="panel panel-default">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form role="form"
                                        action="{{route('admin.create.news.letter.submit')}}" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                    <input type="text" class="form-control"
                                                           id="inputEmail3" name="title" placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                    <textarea class="form-control" rows="5"
                                                              name="news-letter-editor" id="blog-editor"></textarea>
                                            </div>

                                            <div class="text-center">
                                                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-primary">Send</button>
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
