@extends('...layouts.admin')

@section('content')
    <?php $menu = "blog"; $sub = "post-listings";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">
    <style>
          td {
              max-width: 100px;
              overflow: hidden;
              text-overflow: ellipsis;
              white-space: nowrap;
            }
    </style>

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">
                @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-12 col-lg-10 col-md-offset-1 col-lg-offset-1">
                            <h4 class="page-section-heading">Blog posts</h4>
                            <div class="panel panel-default">
                                <!-- Progress table -->
                                <div class="table-responsive">
                                    <table class="table" width="600px" >
                                        <thead>
                                        <tr>
                                            <th>Date added</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Body</th>
                                            <th>Active</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="responsive-table-body">
                                        <?php $i = 1; ?>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td><span class="label label-default">{{$post->created_at->format('M-d-Y')}}</span></td>
                                                <td>
                                                    <img src="/images/blog/admin_listing_99x99/{{$post->image}}"
                                                         width="40" class="img-circle" />
                                                </td>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->slug}}</td>
                                                <td width="250">{!!$post->body!!}</td>
                                                <td>
                                                    @if($post->active == 0)
                                                        <span class="label label-warning">Not active</span>
                                                    @endif
                                                    @if($post->active == 1)
                                                        <span class="label label-success">active</span>
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('admin.post.edit.form',['id'=>$post->id])}}"
                                                       class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top"
                                                       title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('admin.post.delete',['id'=>$post->id])}}"
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
