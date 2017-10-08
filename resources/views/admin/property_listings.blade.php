@extends('...layouts.admin')

@section('content')

<?php $menu = "properties"; $sub = "property-listings";  ?>
<!-- this is the wrapper for the content -->
<div class="st-content" id="content">

    <!-- extra div for emulating position:fixed of the menu -->
    <div class="st-content-inner">

        <div class="container-fluid">

            @include('flash::message')

            <div class="page-section" style="padding-top:10px;">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                        <h4 class="page-section-heading">Properties</h4>
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
                                        <th>Package</th>
                                        <th>Banner</th>
                                        <th>Status</th>
                                        <th>Suspend</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="responsive-table-body">
                                    <?php $i = 1; ?>
                                    @foreach($properties as $property)
                                        <tr>
                                            <td><span class="label label-default">{{$property->created_at->format('M-d-Y')}}</span></td>
                                            <td>

                                                <img src="images/properties/bottom_slider_99x99/{{$property->image}}"
                                                     width="40" class="img-circle" /> {{$property->name}}
                                            </td>
                                            <td>{{$property->propertyID}}</td>
                                            <td>{{$property->address}}<a href="#"><i class="fa fa-map-marker fa-fw text-muted"></i></a></td>
                                            <td>{{$property->package->title}}</td>
                                            <td>
                                                <!-- Rounded switch -->
                                                <label class="switch">
                                                    <input type="checkbox" id="banner-show-check{{$property->id}}"
                                                           data-property-id="{{$property->id}}"
                                                           onchange="showInBanner({{$property->id}});">
                                                    <div class="slider"></div>
                                                </label>
                                            </td>
                                            <td>
                                                @if($property->active == 0)
                                                    <span class="label label-warning">Not active</span>
                                                @endif
                                                @if($property->active == 1)
                                                        <span class="label label-success">active</span>
                                                @endif

                                                @if($property->expired == 1)
                                                        <span class="label label-danger">expired</span>
                                                @endif
                                            </td>
                                            <td style="text-transform: lowercase">
                                                <!-- Rounded switch -->
                                                <label class="switch">
                                                    <input type="checkbox" id="sus-check-property{{$property->id}}"
                                                           data-property-id="{{$property->id}}"
                                                           onchange="suspendProperty({{$property->id}});">
                                                    <div class="slider round"></div>
                                                </label>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{route('admin.property.show',['id'=>$property->id])}}" class="btn btn-info btn-xs" data-toggle="tooltip"
                                                   data-placement="top" title="View">
                                                    <i class="fa fa-eye"></i></a>
                                                <a href="{{route('admin.property.delete',['id'=>$property->id])}}"
                                                   class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top"
                                                   title="Delete"><i
                                                            class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i = $i+1; ?>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- // Progress table -->
                            <div class="panel-footer padding-none text-center">
                                <ul class="pagination">
                                    <li class="disabled"><a href="#">&laquo;</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
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
