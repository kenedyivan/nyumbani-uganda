@extends('...layouts.admin')

@section('content')

    <?php $menu = "types"; $sub = "new-type";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
                            <h4 class="page-section-heading">New type</h4>
                            <div class="panel panel-default">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <form action="{{route('admin.property.type.submit')}}"
                                              method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                placeholder="Type" name="type" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="photo" required>
                                            </div>
                                            <div class="form-group">
                                              <select name="position" class="selectpicker"
                                              data-style="btn-white" data-live-search="true" data-size="5">
                                                  @if(sizeof($positions)==0)
                                                    <option>No positions available</option>
                                                  @else
                                                  <option>Assign position</option>
                                                    @foreach($positions as $key => $value)
                                                      <option value="{{$value}}">{{$value}}</option>
                                                    @endforeach
                                                  @endif

                                              </select>
                                            </div>
                                            <div class="text-center">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">Create type</button>
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
