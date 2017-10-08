@extends('...layouts.admin')

@section('content')

    <?php $menu = "properties"; $sub = "property-listings";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

                        <h4 class="page-section-heading">Delete user</h4>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p style="text-align: center;">Are you sure you want to delete the property?</p>
                                <table class="table" >
                                    <tr>
                                        <td>
                                            <img src="/images/properties/bottom_slider_99x99/{{$property->image}}"
                                                 width="40" class="img-circle" /> {{$property->name}}
                                        </td>
                                        <td>
                                            <a href="#"
                                               onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();" class="btn btn-danger">Delete</a>

                                            <form id="delete-form" action="{{ route('admin.property.destroy') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$property->id}}" name="id">
                                            </form>
                                        </td>
                                    </tr>
                                </table>
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
