@extends('...layouts.admin')

@section('content')

    <?php $menu = "agents"; $sub = "agent-listings";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="row">
                    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                        <h4 class="page-section-heading">Agent properties</h4>

                        <!-- Tabbable Widget -->
                        <div class="tabbable">

                            <!-- Tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-fw fa-home"></i> All</a></li>
                                <li><a href="#profile" data-toggle="tab"><i class="fa fa-fw fa-user"></i> For sale</a></li>
                                <li><a href="#messages" data-toggle="tab"><i class="fa fa-fw fa-envelope"></i> For rent</a></li>
                                <li><a href="#settings" data-toggle="tab"><i class="fa fa-fw fa-cog"></i> Expired</a></li>
                            </ul>
                            <!-- // END Tabs -->

                            <!-- Panes -->
                            <div class="tab-content">
                                <div id="home" class="tab-pane active">
                                    <div class="panel panel-default">
                                        <!-- Data table -->
                                        <table data-toggle="data-table" class="table" cellspacing="0"
                                               width="100%" style="text-transform: capitalize">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($properties_all as $property)
                                                <tr>
                                                    <td>{{$property->title}}</td>
                                                    <td>
                                                        @if($property->for_sale == 1)
                                                            <?php $status = 'Sale';?>
                                                        @else
                                                            <?php $status = 'Rent';?>
                                                        @endif
                                                        {{$status}}
                                                    </td>
                                                    <td>{{$property->address}}</td>
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
                                                    <td>{{$property->created_at}}</td>
                                                    <td>{{$property->price}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- // Data table -->
                                    </div>
                                </div>
                                <div id="profile" class="tab-pane">
                                    <div class="panel panel-default">
                                        <!-- Data table -->
                                        <table data-toggle="data-table" class="table" cellspacing="0"
                                               width="100%" style="text-transform: capitalize">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($properties_for_sale as $property)
                                                <tr>
                                                    <td>{{$property->title}}</td>
                                                    <td>
                                                        @if($property->for_sale == 1)
                                                            <?php $status = 'Sale';?>
                                                        @else
                                                            <?php $status = 'Rent';?>
                                                        @endif
                                                        {{$status}}
                                                    </td>
                                                    <td>{{$property->address}}</td>
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
                                                    <td>{{$property->created_at}}</td>
                                                    <td>{{$property->price}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- // Data table -->
                                    </div>
                                </div>
                                <div id="messages" class="tab-pane">
                                    <div class="panel panel-default">
                                        <!-- Data table -->
                                        <table data-toggle="data-table" class="table" cellspacing="0"
                                               width="100%" style="text-transform: capitalize">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($properties_for_rent as $property)
                                                <tr>
                                                    <td>{{$property->title}}</td>
                                                    <td>
                                                        @if($property->for_sale == 1)
                                                            <?php $status = 'Sale';?>
                                                        @else
                                                            <?php $status = 'Rent';?>
                                                        @endif
                                                        {{$status}}
                                                    </td>
                                                    <td>{{$property->address}}</td>
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
                                                    <td>{{$property->created_at}}</td>
                                                    <td>{{$property->price}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- // Data table -->
                                    </div>
                                </div>
                                <div id="settings" class="tab-pane">
                                    <div class="panel panel-default">
                                        <!-- Data table -->
                                        <table data-toggle="data-table" class="table" cellspacing="0"
                                               width="100%" style="text-transform: capitalize">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($properties_expired as $property)
                                                <tr>
                                                    <td>{{$property->title}}</td>
                                                    <td>
                                                        @if($property->for_sale == 1)
                                                            <?php $status = 'Sale';?>
                                                        @else
                                                            <?php $status = 'Rent';?>
                                                        @endif
                                                        {{$status}}
                                                    </td>
                                                    <td>{{$property->address}}</td>
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
                                                    <td>{{$property->created_at}}</td>
                                                    <td>{{$property->price}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- // Data table -->
                                    </div>
                                </div>
                            </div>
                            <!-- // END Panes -->

                        </div>
                        <!-- // END Tabbable Widget -->

                    </div>
                </div>

            </div>

        </div>
        <!-- /st-content-inner -->

    </div>
    <!-- /st-content -->

@endsection
