@extends('...layouts.admin')

@section('content')

    <?php $menu = "types"; $sub = "property-types";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">

                        <h4 class="page-section-heading">Delete type</h4>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p style="text-align: center;">Are you sure you want to delete the type?</p>
                                <table class="table" >
                                    <tr>
                                        <td>
                                            <img src="/images/types/{{$type->image}}"
                                                 width="40" class="img-circle" />
                                            {{$type->name}}
                                        </td>
                                        <td>
                                            <a href="#"
                                               onclick="event.preventDefault();
                    document.getElementById('delete-form').submit();" class="btn btn-danger">Delete</a>

                                            <form id="delete-form" action="{{ route('admin.property.type.destroy') }}"
                                                  method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$type->id}}" name="id">
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
