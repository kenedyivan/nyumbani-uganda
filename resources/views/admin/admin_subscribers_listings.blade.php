@extends('...layouts.admin')

@section('content')

    <?php $menu = "news-letter"; $sub = "subscribers-listings";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                            <h4 class="page-section-heading">News Letter Subscribers</h4>
                            <div class="panel panel-default">
                                <!-- Progress table -->
                                <div class="table-responsive">
                                    <table class="table v-middle">
                                        <thead>
                                        <tr>
                                            <th>Date joined</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody id="responsive-table-body">
                                        <?php $i = 1; ?>
                                        @foreach($subscribers as $subscriber)
                                            <tr>
                                                <td><span class="label label-default">{{$subscriber->created_at->format('M-d-Y' )}}
                                                    </span></td>

                                                <td>{{$subscriber->email}}</td>

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
