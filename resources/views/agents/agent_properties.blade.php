@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Agent Properties</title>
@endsection
@section('content')

    <!--start section page body-->
    <section id="section-body">

        <div class="container">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-left">
                            <h1 class="title-head">Welcome back, {{$agent->first_name}}</h1>
                        </div>
                        <div class="page-title-right">
                            <ol class="breadcrumb"><li><a href="/"><i class="fa fa-home"></i></a></li><li class="active">My Properties</li></ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="user-dashboard-full">
                @include('agents.agent_tabbed_menu')
                <div class="profile-area-content">
                    <div class="profile-top">
                        <div class="profile-top-left">
                            <h2 class="title">My Properties</h2>
                        </div>
                        <div class="profile-top-right">
                            <div class="my-property-search">
                                <form action="/search" method="GET" role="search">
                                    <div class="table-list">
                                        <div class="form-group table-cell">
                                            <input class="form-control" name="title" placeholder="Search Listing by title">
                                        </div>
                                        <div class="table-cell">
                                            <button class="btn btn-secondary">Search</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="my-property-listing">
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="my-list-sidebar">
                                        <div class="my-property-menu">
                                            <ul>
                                                <li class="@if($t=='published') active @endif">
                                                    <a href="{{route('agent.properties',['agentId' => $agent->id])}}">Published</a></li>
                                                <li class="@if($t=='suspended') active @endif">
                                                    <a href="{{route('agent.properties.suspended',['agentId' => $agent->id])}}">Suspended</a></li>
                                                <li class="@if($t=='expired') active @endif">
                                                    <a href="{{route('agent.properties.expired',['agentId' => $agent->id])}}">Expired</a></li>
                                            </ul>
                                        </div>
                                        <!--
                                        <div class="my-property-menu menu-status">
                                            <ul>
                                                <li><strong>Your current Packages</strong></li>
                                                <li>STANDARD</li>
                                                <li>Listing Included: 2</li>
                                                <li>Listing Remaining: 1</li>
                                                <li>Featured Included: 2</li>
                                                <li>Featured Remaining: 0</li>
                                                <li>Ends On 2016-04-05</li>
                                            </ul>
                                        </div>
                                        <div class="my-property-menu">
                                            <button class="btn btn-primary btn-block"> Change Membership Plan </button>
                                        </div>-->
                                    </div>
                                </div>

                                <div class="col-md-9 col-sm-12 col-xs-12">
                                    <div class="row grid-row">
                                        @if(sizeof($agent->properties)>0)
                                                @foreach($properties as $property)
                                                  <?php
                                                  $future = strtotime($property->expiry_date); //Future date.
                                                  $timefromdb = strtotime($property->last_activated_date);
                                                  $timeleft = $future-$timefromdb;
                                                  $daysleft = round((($timeleft/24)/60)/60);
                                                  ?>
                                                  <div class="item-wrap">
                                                      <div class="media my-property">
                                                          <div class="media-left">
                                                              <div class="figure-block">
                                                                  <figure class="item-thumb">
                                                                      @if($property->active==1)
                                                                      <span class="label-featured label label-success">Featured</span>
                                                                      @endif
                                                                      <a href="/property-details/{{$property->id}}">
                                                                          <img src="/images/properties/agent_properties_150x110/{{$property->image}}" alt="thumb">
                                                                      </a>
                                                                  </figure>
                                                              </div>
                                                          </div>
                                                          <div class="media-body media-middle">
                                                              <div class="my-description">
                                                                  <h4 class="my-heading"><a href="/property-details/{{$property->id}}">
                                                                          <span class="label label-warning">
                                                                              @if($t=='published')
                                                                                  PUBLISHED
                                                                                  @elseif($t=='suspended')
                                                                                  SUSPENDED
                                                                                  @elseif($t=='expired')
                                                                                  EXPIRED
                                                                              @endif
                                                                          </span> {{$property->title}}</a></h4>
                                                                  <p class="address">{{$property->address}}, {{$property->district}} {{$property->country}}</p>
                                                                  @if($property->for_sale == 1)
                                                                      <?php $status = 'Sale';?>
                                                                  @else
                                                                      <?php $status = 'Rent';?>
                                                                  @endif
                                                                  <p class="status"><strong>Status:</strong> For {{$status}}, <strong> Price:</strong>
                                                                    <span style="text-transform: uppercase;">{{$property->currency}}</span> {{$property->price}}</p>
                                                              </div>
                                                              <div class="my-actions">
                                                                  <div class="btn-group">
                                                                      <a href="{{route('agent.edit.listing',['id'=>$property->id])}}" class="action-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                                      <a href="{{route('agent.delete.listing',['id'=>$property->id])}}" class="action-btn" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-close"></i></a>
                                                                  </div><!--
                                                                                                              <div class="btn-group">
                                                                                                                  <button class="pay-btn action-btn">Pay Now <i class="fa fa-angle-down"></i></button>
                                                                                                                  <div class="dropdown-menu">
                                                                                                                      <div class="pay-options">
                                                                                                                          <table>
                                                                                                                              <tr>
                                                                                                                                  <td>
                                                                                                                                      Submission Fee
                                                                                                                                  </td>
                                                                                                                                  <td>$3.00</td>
                                                                                                                              </tr>
                                                                                                                              <tr>
                                                                                                                                  <td>
                                                                                                                                      <div class="checkbox">
                                                                                                                                          <label>
                                                                                                                                              <input type="checkbox" value="option1">
                                                                                                                                              Featured Fee
                                                                                                                                          </label>
                                                                                                                                      </div>
                                                                                                                                  </td>
                                                                                                                                  <td>$5.00</td>
                                                                                                                              </tr>
                                                                                                                              <tfoot>
                                                                                                                              <tr>
                                                                                                                                  <td>Total</td>
                                                                                                                                  <td>$5.00</td>
                                                                                                                              </tr>
                                                                                                                              </tfoot>
                                                                                                                          </table>
                                                                                                                      </div>
                                                                                                                      <ul>
                                                                                                                          <li><a href="#"><i class="fa fa-credit-card"></i> Pay with Credit Card</a></li>
                                                                                                                          <li><a href="#"><i class="fa fa-paypal"></i> Pay with PayPal</a></li>
                                                                                                                          <li><a href="#"><i class="fa fa-retweet"></i> Pay with Wire Transfert</a></li>

                                                                                                                      </ul>
                                                                                                                  </div>
                                                                                                              </div>-->
                                                                  <p class="expire-text"><strong>Expiration:</strong> {{$daysleft}} days remaining</p>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                                @endforeach

                                        @else
                                        Sorry, You haven't added any properties yet.
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!--start Pagination-->
                    <div class="text-center">
                        <?php echo $properties->render(); ?>
                    </div>
                    <!--start Pagination-->
                </div>
            </div>
        </div>

    </section>
    <!--end section page body-->
@endsection
