@extends('...layouts.admin')

@section('content')
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                <h3 style="padding: 0;margin-top:0;">House features</h3>
                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                        <div>
                            <div class="panel panel-default">
                                <!-- Progress table -->
                                <div class="table-responsive">
                                    <table class="table v-middle">
                                        <thead>
                                        <tr>
                                            <th width="20">
                                                <div class="checkbox checkbox-single margin-none">
                                                    <input id="checkAll" data-toggle="check-all" data-target="#responsive-table-body" type="checkbox">
                                                    <label for="checkAll">Check All</label>
                                                </div>
                                            </th>
                                            <th>Date added</th>
                                            <th>Feature</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="responsive-table-body">
                                        <?php $i = 1; ?>
                                        @foreach($features as $feature)
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-single">
                                                        <input id="checkbox{{$i}}" type="checkbox">
                                                        <label for="checkbox{{$i}}">Label</label>
                                                    </div>
                                                </td>
                                                <td><span class="label label-default">{{$feature->created_at->format('M d,Y \a\t h:i a')}}</span></td>
                                            
                                                <td>{{$feature->name}}</td>
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                                class="fa fa-times"></i></a>
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