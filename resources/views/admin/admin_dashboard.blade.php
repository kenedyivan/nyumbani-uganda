@extends('...layouts.admin')

@section('content')

    <?php $menu = "dashboard"; $sub = "dashboard";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">
                <div class="row" data-toggle="isotope">
                    <div class="item col-md-6 col-sm-6 col-xs-12">
                        <!-- Leaderboard -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Top 5 Agents</h4>
                            </div>
                            <table class="table table-leaderboard margin-none">
                                <tbody>
                                  <?php $i = 1; ?>
                                  @foreach($agents as $agent)
                                  <tr>
                                      <td width="20">{{$i}}</td>
                                      <td><a href="{{route('admin.agent.properties',
                                        ['id'=>$agent->id])}}" style="text-transform: capitalize;">
                                         {{ $agent->first_name }} {{ $agent->last_name }}</a></td>
                                      <td>
                                      <span class="pull-right">
                                        {{$agent->properties->count()}}
                                      </span>
                                    </td>
                                  </tr>
                                  <?php $i = $i+1; ?>
                                  @endforeach

                                </tbody>
                            </table>

                            <div class="panel-footer padding-none">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="score-block">
                                            <div class="title">Agents</div>
                                            <div class="score"><a href="{{route('admin.agent.listings')}}">
                                              {{ App\Agent::all()->count()}}</a></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="score-block">
                                            <div class="title">Properties</div>
                                            <div class="score"><a href="{{route('admin.property.listings')}}">
                                              {{ App\Property::all()->count()}}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // Leaderboard -->
                    </div>
                    <div class="item col-md-6 col-xs-12">
                        <!-- Packages -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Packages</h4>
                            </div>
                            <table class="table table-leaderboard margin-none">

                                <tbody>
                                  <?php $i = 1; ?>
                                  @foreach($packages as $package)
                                  <tr>
                                      <td width="20">{{$i}}</td>
                                      <td><a href="#" style="text-transform: capitalize;">
                                         {{ $package->title }}</a></td>
                                      <td>
                                      <span class="pull-right">
                                         {{ $package->p->count() }}
                                      </span>
                                    </td>
                                  </tr>
                                  <?php $i = $i+1; ?>
                                  @endforeach

                                </tbody>
                            </table>

                        </div>
                        <!-- // packages -->
                    </div>
                    <div class="item col-md-6 col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">Views</h4>
                          </div>
                            <table class="table table-striped margin-none">
                                <thead>
                                <tr>
                                    <th>Property title</th>
                                    <th class="text-center">Agent</th>
                                    <th class="text-right width-100">Views</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php $i = 1; ?>
                                  @foreach($v_properties as $prop)
                                    <tr>
                                        <td>
                                            <strong class="text-muted">{{ $i }}.
                                            </strong>
                                            <a href="{{route('admin.property.show',['id'=>$prop->id])}}"
                                            class="text-primary" style="text-transform: capitalize;">{{$prop->title}}</a></td>
                                        <td class="text-right" style="text-transform: capitalize;">
                                          {{$prop->agent->first_name}}
                                          {{$prop->agent->last_name}}
                                        </td>
                                        <td class="text-right">
                                            {{$prop->views}}
                                        </td>
                                    </tr>
                                    <?php $i = $i+1;?>
                                  @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="item col-sm-6 col-xs-12">
                        <!-- Recent tickets -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Recent Properties</h4>
                            </div>
                            <ul class="list-group">
                              <?php $i = 1; ?>
                              @foreach ($properties as $property)
                              <li class="list-group-item">
                                  <span class="label label-default">#{{$property->id}}</span> &nbsp;
                                  <div class="pull-right">
                                      <span class="text-muted  text-small">
                                        {{$property->created_at->format('M-d-Y')}}
                                      </span>
                                  </div>
                                  <a href="{{route('admin.property.show',
                                  ['id'=>$property->id])}}" style="text-transform: capitalize;">
                                    {{$property->title}}</a>
                              </li>
                              <?php $i = $i+1; ?>
                              @endforeach

                                <li class="list-group-item text-right">
                                    <a class="btn btn-sm btn-info"
                                    href="{{route('admin.property.listings')}}">
                                      All properties
                                      <i class="fa fa-fw fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- // Recent tickets -->
                    </div>

                </div>

            </div>
        </div>
        <!-- /st-content-inner -->

    </div>
    <!-- /st-content -->

@endsection
