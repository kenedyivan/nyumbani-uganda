@extends('...layouts.user_layout')
@section('content')


    <!--start section page body-->
    <section id="section-body">
        <div class="container">
            <div class="page-title breadcrumb-top">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="/"><i class="fa fa-home"></i></a></li>
                            <li class="active">{{$agent->first_name}} {{$agent->last_name}}</li>
                        </ol>
                        <div class="page-title-left">
                            <h2>{{$agent->first_name}} {{$agent->last_name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="profile-detail-block agent-detail">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="profile-image">
                                    <img src="/images/agents/profile_330x330/{{$agent->profile_picture}}" alt="Agent" width="330" height="330">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 col-xs-12">
                                <div class="profile-description">
                                    <h3>{{$agent->first_name}} {{$agent->last_name}}</h3>
                                    <h4 class="position">{{$agent->position}} at {{$agent->company}}</h4>
                                    <p>{{$agent->bio}}</p>
                                    <ul class="profile-contact">
                                      <li><span>OFFICE:</span> <a href="tel:{{$agent->office_phone}}">{{$agent->office_phone}}</a></li>
                                      <li><span>MOBILE:</span> <a href="tel:{{$agent->mobile_phone}}">{{$agent->mobile_phone}}</a></li>
                                      <li><span>FAX:</span> <a href="tel:{{$agent->fax}}">{{$agent->fax}}</a></li>
                                      <li class="email"><span>Email:</span> <a href="mailto:{{$agent->email}}">{{$agent->email}}</a></li>
                                    </ul>
                                    <ul class="profile-social">
                                      <li><a href="tel:{{$agent->mobile_phone}}"><i class="fa fa-phone-square"></i></a></li>
                                      <li><a href="{{$agent->facebook_link}}"><i class="fa fa-facebook-square"></i></a></li>
                                      <li><a href="{{$agent->twitter_link}}"><i class="fa fa-twitter-square"></i></a></li>
                                      <li><a href="{{$agent->linkedin_link}}"><i class="fa fa-linkedin-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="form-small">
                                    <h3>CONTACT JOHN DOE</h3>
                                    <form>
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Phone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Hi John Doe, I saw your profile on Houzez and wanted to see if you could help me." rows="3" class="form-control"></textarea>
                                        </div>
                                        <button class="btn btn-secondary btn-block">SEND MESSAGE</button>
                                    </form>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 list-grid-area container-contentbar">
                    <div id="content-area">
                        <!--start list tabs-->
                        <div class="list-tabs table-list full-width">
                            <div class="tabs table-cell">
                                <ul>
                                    <li>
                                        <a href="{{route('agent.detail',['id'=>$agent->id])}}" class="@if($t=='all') active @endif">ALL</a>
                                    </li>
                                    <li>
                                        <a href="{{route('agent.detail.sale',['id'=>$agent->id])}}" class="@if($t=='sale') active @endif">FOR SALE</a>
                                    </li>
                                    <li>
                                        <a href="{{route('agent.detail.rent',['id'=>$agent->id])}}" class="@if($t=='rent') active @endif">FOR RENT</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="sort-tab table-cell text-right">
                                Sort by:
                                <select class="selectpicker bs-select-hidden" title="Please select" data-live-search-style="begins" data-live-search="true">
                                    <option>Relevance</option>
                                    <option>Relevance</option>
                                    <option>Relevance</option>
                                </select>
                            </div>
                        </div>
                        <!--end list tabs-->

                        <!--start property items-->
                        <div class="property-listing list-view">
                            <div class="row">
                              @if(sizeof($properties)>0)
                                @foreach($properties as $property)
                                    <div class="item-wrap">
                                        <div class="property-item table-list">
                                            <div class="table-cell">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        @if($property->active==1)
                                                        <span class="label-featured label label-success">Featured</span>
                                                        @endif

                                                        <div class="label-wrap hide-on-list">
                                                            @if($property->for_sale==1)
                                                            <span class="label label-default">For Sale</span>
                                                            @if($property->status==1)
                                                            <span class="label label-danger">Sold</span>
                                                            @endif
                                                             @else
                                                            <span class="label label-info">For Rent</span>
                                                            @if($property->status==1)
                                                            <span class="label label-danger">Rented</span>
                                                            @endif
                                                            @endif
                                                        </div>
                                                        <div class="price hide-on-list">
                                                            <p class="price-start">Start from</p>
                                                            <h3 style="text-transformation:capitalize;">{{$property->currency}} {{$property->price}}</h3>
                                                        </div>
                                                        <a href="/property-details/{{$property->id}}">
                                                            <img src="/images/properties/property_listing_364x244/{{$property->image}}" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="item-body table-cell">

                                                <div class="body-left table-cell">
                                                    <div class="info-row">
                                                        <div class="label-wrap hide-on-grid">
                                                          @if($property->for_sale==1)
                                                            <span class="label-status label label-default">For Sale</span>
                                                            @if($property->status==1)
                                                            <span class="label label-danger">Sold</span>
                                                            @endif
                                                             @else
                                                            <span class="label-status label label-default">For Rent</span>
                                                            @if($property->status==1)
                                                            <span class="label label-danger">Rented</span>
                                                            @endif
                                                            @endif
                                                        </div>
                                                        <h2 class="property-title"><a href="/property-details/{{$property->id}}">{{$property->title}}</a></h2>
                                                        <h4 class="property-location">{{$property->address}}. {{$property->district}}, {{$property->country}}</h4>
                                                    </div>
                                                    <div class="info-row amenities hide-on-grid">
                                                        <p>
                                                          <span>Beds: {{$property->bedrooms}}</span>
                                                          <span>Baths: {{$property->bathrooms}}</span>
                                                          <span>Sqft: {{$property->area_size}}</span>
                                                        </p>
                                                        <p>Single Family Home</p>
                                                    </div>
                                                    <div class="info-row date hide-on-grid">
                                                        <p><i class="fa fa-user"></i> <a href="/agent-details/{{$property->agent->id}}">{{$property->agent->first_name}} {{$property->agent->last_name}}</a></p>
                                                        <p><i class="fa fa-calendar"></i> {{ $property->created_at->format('M d,Y \a\t h:i a') }} </p>
                                                    </div>
                                                </div>
                                                <div class="body-right table-cell hidden-gird-cell">
                                                    <div class="info-row price">
                                                        <p class="price-start">Price</p>
                                                        <h3 style="text-transformation:capitalize;">{{$property->currency}} {{$property->price}}</h3>
                                                    </div>
                                                    <div class="info-row phone text-right">
                                                        <a href="/property-details/{{$property->id}}" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                        <p><a href="tel:{{$property->agent->mobile_phone}}">{{$property->agent->mobile_phone}}</a></p>
                                                    </div>
                                                </div>
                                                <div class="table-list full-width hide-on-list">
                                                    <div class="cell">
                                                        <div class="info-row amenities">
                                                            <p>
                                                              <span>Beds: {{$property->bedrooms}}</span>
                                                              <span>Baths: {{$property->bathrooms}}</span>
                                                              <span>Sqft: {{$property->area_size}}</span>
                                                            </p>
                                                            <p>Single Family Home</p>
                                                        </div>
                                                    </div>
                                                    <div class="cell">
                                                        <div class="phone">
                                                            <a href="/property-details/{{$property->id}}" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            <p><a href="tel:{{$property->agent->mobile_phone}}">{{$property->agent->mobile_phone}}</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-foot date hide-on-list">
                                            <div class="item-foot-left">
                                                <p><i class="fa fa-user"></i> <a href="/agent-details/{{$property->agent->id}}">{{$property->agent->first_name}} {{$property->agent->last_name}}</a></p>
                                            </div>
                                            <div class="item-foot-right">
                                                <p><i class="fa fa-calendar"></i> {{ $property->created_at->format('M d,Y \a\t h:i a') }} </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                              @else
                                No Properties added by this agent!
                              @endif

                            </div>
                        </div>
                        <!--end property items-->

                        <hr>

                        <!--start Pagination-->
                        <div class="text-center">
                            <?php echo $properties->render(); ?>
                        </div>
                        <!--start Pagination-->

                    </div>
                </div>
                @include('users.left_bar')
            </div>
        </div>
    </section>
    <!--end section page body-->
@endsection
