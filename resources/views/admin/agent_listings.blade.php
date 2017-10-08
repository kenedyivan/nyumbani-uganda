@extends('...layouts.admin')

@section('content')

  <?php $menu = "agents"; $sub = "agent-listings";  ?>
<!-- this is the wrapper for the content -->
<div class="st-content" id="content">

    <!-- extra div for emulating position:fixed of the menu -->
    <div class="st-content-inner">

        <div class="container-fluid">

            @include('flash::message')

            <div class="page-section" style="padding-top:10px;">
                <div class="row">
                   <div class="col-md-12 col-lg-10 col-md-offset-1 col-lg-offset-1">
                       <h4 class="page-section-heading">Agents</h4>
                        <div class="panel panel-default">
                            <!-- Progress table -->
                            <div class="table-responsive">
                                <table class="table v-middle" style="text-transform: capitalize">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Suspend</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="responsive-table-body">
                                    <?php $i = 1; ?>
                                    @foreach($agents as $agent)
                                        <tr>
                                            <td><span class="label label-default">{{$agent->created_at->format('M-d-Y')}}</span></td>
                                            <td>

                                                <img src="/images/agents/contact_agent_74x74/{{$agent->profile_picture}}"
                                                     width="40" class="img-circle" /> {{$agent->last_name}} &nbsp; {{ $agent->first_name }}
                                            </td>
                                            <td>{{$agent->company}}</td>
                                            <td style="text-transform: lowercase">{{$agent->email}}</td>
                                            <td style="text-transform: lowercase">
                                                <!-- Rounded switch -->
                                                <label class="switch">
                                                    <input type="checkbox" id="sus-check{{$agent->id}}" data-agent-id="{{$agent->id}}"
                                                           onchange="suspendAgent({{$agent->id}});">
                                                    <div class="slider round"></div>
                                                </label>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{route('admin.agent.properties',['id'=>$agent->id])}}"
                                                   class="btn btn-info btn-xs" data-toggle="tooltip"
                                                   data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-default btn-xs" data-toggle="tooltip"
                                                   data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
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
