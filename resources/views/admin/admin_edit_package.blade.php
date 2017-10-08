@extends('...layouts.admin')

@section('content')

    <?php $menu = "packages"; $sub = "property-packages";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-2">
                            <h4 class="page-section-heading">Edit package</h4>
                            <div class="panel panel-default">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <form action="{{route('admin.packages.update')}}"
                                              method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                           id="inputEmail3" placeholder="Edit type" name="title"
                                                           value="{{$package->title}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Price</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                           id="inputEmail3" placeholder="Edit type" name="price"
                                                           value="{{$package->price}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Listings</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                           id="inputEmail3" placeholder="Edit type" name="listings"
                                                           value="{{$package->featured_listings}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="inputEmail3" class="col-sm-3 control-label">Options</label>
                                              <div class="col-sm-9">

                                                  <div class="row">
                                                    <div class="col-sm-6 col-md-4">
                                                      <div class="checkbox">
                                                        <input id="checkbox1" type="checkbox"
                                                        value="slider" name="slider"
                                                        @if($package->slider==1)
                                                          checked
                                                        @endif>
                                                        <label for="checkbox1">Slider</label>
                                                      </div>
                                                      <div class="checkbox checkbox-primary">
                                                        <input id="checkbox2" type="checkbox"
                                                        value="feature" name="feature"
                                                        @if($package->feature==1)
                                                          checked
                                                        @endif>
                                                        <label for="checkbox2">Feature</label>
                                                      </div>
                                                      <div class="checkbox checkbox-warning">
                                                        <input id="checkbox5" type="checkbox"
                                                        value="recommended" name="recommended"
                                                        @if($package->recommended==1)
                                                          checked
                                                        @endif>
                                                        <label for="checkbox5">recommended</label>
                                                      </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4">
                                                      <div class="checkbox checkbox-success">
                                                        <input id="checkbox3" type="checkbox"
                                                        value="best" name="best"
                                                        @if($package->best_value==1)
                                                          checked
                                                        @endif>
                                                        <label for="checkbox3">Best value</label>
                                                      </div>
                                                      <div class="checkbox checkbox-info">
                                                        <input id="checkbox4" type="checkbox"
                                                        value="partner" name="partner"
                                                        @if($package->partner==1)
                                                          checked
                                                        @endif>
                                                        <label for="checkbox4">Partner</label>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>

                                          </div>

                                            <div class="text-center">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{$package->id}}" />
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
