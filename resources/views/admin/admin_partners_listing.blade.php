@extends('...layouts.admin')

@section('content')

    <?php $menu = "partners"; $sub = "partner-listings";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">
                @include('flash::message')
                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                            <h4 class="page-section-heading">Partners</h4>
                            <div class="panel panel-default">
                                <!-- Progress table -->
                                <div class="table-responsive">
                                    <table class="table v-middle">
                                        <thead>
                                        <tr>
                                            <th>Date added</th>
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>Website</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="responsive-table-body">
                                        <?php $i = 1; ?>
                                        @foreach($partners as $partner)
                                            <tr>
                                                <td><span class="label label-default">{{$partner->created_at->format('M-d-Y')}}</span></td>
                                                <td>
                                                    <img src="/images/partners/{{$partner->logo}}"
                                                         width="40" class="img-circle" />
                                                </td>
                                                <td>{{$partner->name}}</td>
                                                <td><a href="{{$partner->website}}">{{$partner->website}}</a></td>
                                                <td class="text-right">
                                                    <a href="{{ route('admin.partners.edit.form',['id'=>$partner->id])}}"
                                                       class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top"
                                                       title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('admin.partners.delete',['id'=>$partner->id])}}"
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
