@extends('...layouts.admin')

@section('content')

    <?php $menu = "properties"; $sub = "property-listings";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                <div class="page-section" style="padding-top:10px;">
                    <h4 class="page-section-heading">Property</h4>
                    <div class="row">
                        {{--<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">--}}
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5><strong>Overview</strong></h5>
                                    </div>
                                    <div class="panel-body">
                                        <div class="item">
                                            <div class="media media-clearfix-xs-min">
                                                <div class="media-left">
                                                    <img src="/images/properties/featured_slider_370x202/{{$property->image}}"
                                                         alt="" class="media-object" />
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading" style="text-transform: capitalize">{{$property->title}}</h4>
                                                    <div class="meta"><span><i class="fa fa-calendar-o fa-fw"></i>
                                                            {{$property->created_at->format('d M Y')}} </span>
                                                        <span><i class="fa fa-map-marker fa-fw"></i>{{$property->address}}</span></div>
                                                    <p>{{$property->description}}</p>
                                                    <p>
                                                        @if($property->active == 0)
                                                            <span class="label label-warning">Not active</span>
                                                        @endif
                                                        @if($property->active == 1)
                                                            <span class="label label-success">active</span>
                                                        @endif

                                                        @if($property->expired == 1)
                                                            <span class="label label-danger">expired</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        {{--</div>--}}
                    </div>

                    <div class="row">
                        {{--<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">--}}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5><strong>Details</strong></h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-3">
                                            <table>
                                                <tr>
                                                    <td>Title: </td>
                                                    <td style="text-transform: capitalize"><strong>{{$property->title}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Property ID: </td>
                                                    <td><strong>{{$property->propertyID}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Status: </td>
                                                    <td>
                                                        @if($property->for_sale == 1)
                                                            <?php $status = 'Sale';?>
                                                        @else
                                                            <?php $status = 'Rent';?>
                                                        @endif
                                                        <strong>{{$status}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Created at: </td>
                                                    <td><strong>{{$property->created_at->format('d M Y')}}</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{--</div>--}}
                    </div>

                    <div class="row">
                        {{--<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">--}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5><strong>Address</strong></h5>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-3">
                                        <table>
                                            <tr>
                                                <td>Address: </td>
                                                <td style="text-transform: capitalize">&nbsp;<strong>{{$property->address}}</strong> </td>
                                            </tr>
                                            <tr>
                                                <td style="text-transform: capitalize">District: </td>
                                                <td>
                                                    &nbsp;<strong>{{$property->district}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Town: </td>
                                                <td style="text-transform: capitalize">&nbsp;<strong>{{$property->town}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Region: </td>
                                                <td style="text-transform: capitalize">&nbsp;<strong>{{$property->region}}</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--</div>--}}
                    </div>

                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5><strong>Gallery</strong></h5>
                            </div>
                            <div class="panel-body">
                                <div class="owl-basic">
                                    @foreach($property->images as $image)
                                        <div class="item">
                                            <a>
                                                <img src="/images/properties/latest_home_and_best_property_355x240/{{$image->image}}"
                                                     alt="photo" class="img-responsive" />
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5><strong>Agent</strong></h5>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6 col-md-3">
                                    <table>
                                        <tr>
                                            <td>Name: </td>
                                            <td style="text-transform: capitalize">&nbsp;<strong>{{$property->agent->last_name}}</strong> </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-default btn-sm">Agent</a>
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
