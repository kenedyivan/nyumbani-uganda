@extends('...layouts.admin')

@section('content')

    <?php $menu = "properties"; $sub = "property-activate";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">
                @include('flash::message')
                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                            <h4 class="page-section-heading">Activate</h4>
                            <div class="panel panel-default">
                                <!-- Progress table -->
                                <div class="table-responsive">
                                    <table class="table v-middle">
                                        <thead>
                                        <tr>
                                            <th>Date added</th>
                                            <th>Name</th>
                                            <th>PropertyID</th>
                                            <th>Location</th>
                                            <th>Activate</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="responsive-table-body">
                                        <?php $i = 1; ?>
                                        @foreach($properties as $property)
                                            <tr>
                                                <td><span class="label label-default">{{$property->created_at->format('M-d-Y')}}</span></td>
                                                <td>

                                                    <img src="/images/properties/bottom_slider_99x99/{{$property->image}}"
                                                         width="40" class="img-circle" /> {{$property->name}}
                                                </td>
                                                <td>{{$property->propertyID}}</td>
                                                <td>{{$property->address}}<a href="#"><i class="fa fa-map-marker fa-fw text-muted"></i></a></td>
                                                <td>
                                                    <form id="{{$property->id}}" action="{{ route('admin.property.approval.save') }}" method="post">
                                                        <select name="select" class="selectpicker"
                                                                data-style="btn-white" data-live-search="true"
                                                                data-size="5" required>
                                                            <option selected>Select to activate</option>
                                                            <option value="1">activate</option>
                                                        </select>
                                                        <input type="hidden" name="id" value="{{$property->id}}">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </td>
                                                <td class="text-right">
                                                    <a href="#"
                                                       class="btn btn-default btn-xs"
                                                       data-toggle="tooltip"
                                                       data-placement="top"
                                                       title="Save"
                                                       onclick="event.preventDefault();
                                                     document.getElementById({{$property->id}}).submit();">
                                                        <i class="fa fa-save"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $i = $i+1; ?>
                                        @endforeach

                                        </tbody>
                                    </table>
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
