@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Property Details</title>
@endsection
@section('content')

<!--end advanced search section-->

<!--start detail top-->
    <section class="detail-top detail-top-grid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header-detail table-list">
                        <div class="header-left">
                            <ol class="breadcrumb">
                                <li><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="active"><?php echo ucfirst($property->title);?></li>
                            </ol>
                            <h1>
                                {{$property->title}} ({{$property->views}} Views) - Rating ({{$property->rating}}):
                            @for ($k=1; $k <= 5 ; $k++)
                            <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                <span class="glyphicon glyphicon-star{{ ($k <= $property->rating) ? '' : '-empty'}}"></span></span>
                            @endfor
                                <span class="label-wrap hidden-sm hidden-xs">
                                    <span class="label label-primary">@if($property->for_sale == 1) For Sale @elseif($property->for_rent == 1) For Rent @endif</span>
                                </span>
                            </h1>
                            <address class="property-address">{{$property->address}}. {{$property->district}}, {{$property->country}}</address>
                        </div>
                        <div class="header-right">
                            <ul class="actions">
                                <li class="share-btn">
                                    &nbsp;
                                </li>
                                <li>
                                    &nbsp;
                                </li>
                            </ul>
                            <span class="item-price" style="text-transform: uppercase;">{{$property->currency}} {{$property->price}}</span>
                        </div>
                    </div>
                    <div class="detail-media">
                        <div class="tab-content">


                            <div id="gallery" class="tab-pane fade in active" style="background-image: url(/images/properties/single_property_1170x600/{{$property->image}})">
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
                                  <div class="thumb-caption clearfix">
                                      <ul class="actions pull-right" style="padding-right:8px; padding-top:8px;">

                                          <li>
                                              <span id="fav-span{{$property->id}}" data-toggle="tooltip" data-placement="top" title="Favorite"
                                                    onclick="addToFavorites({{$property->id}},
                                                    @if(Auth::guard('agent')->id())
                                                    {{Auth::guard('agent')->id()}}
                                                    @else
                                                            0
                                                    @endif
                                                    );"
                                              >
                                                          <i class="fa fa-heart-o"></i>
                                              </span>
                                          </li>
                                          <li class="share-btn">
                                              <?php $url = URL::full();?>
                                              <div class="share_tooltip fade">
                                                  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}">
                                                      <i class="fa fa-facebook"></i></a>
                                                  <a target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}">
                                                      <i class="fa fa-twitter"></i></a>
                                                  <a target="_blank" href="https://plus.google.com/share?url={{ urlencode($url) }}">
                                                      <i class="fa fa-google-plus"></i></a>
                                              </div>
                                              <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share">
                                                <i class="fa fa-share-alt"></i></span>
                                          </li>
                                          <li>
                                            <span data-toggle="tooltip"
                                                data-placement="top"
                                                title="Photos ({{$property->images->count()+1}})">

                                                <a class="example-image-link"
                                                href="/images/properties/latest_home_and_best_property_355x240/{{$property->image}}"
                                                data-lightbox="val{{$property->id}}"
                                                data-title="">
                                                  <i class="fa fa-camera"></i>
                                                </a>
                                                @foreach($property->images as $image)
                                                  <a class="example-image-link"
                                                  href="/images/properties/latest_home_and_best_property_355x240/{{$image->image}}"
                                                  data-lightbox="val{{$property->id}}"
                                                  data-title=""></a>
                                                @endforeach
                                            </span>
                                          </li>
                                      </ul>
                                </div>
                                <div class="form-small form-media">
                                    <div class="media agent-media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img src="/images/agents/contact_agent_74x74/{{$property->agent->profile_picture}}" class="media-object" alt="image" width="74" height="74">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">CONTACT AGENT</h4>
                                            <ul>
                                                <li><i class="fa fa-user"></i> {{$property->agent->first_name}} {{$property->agent->last_name}}</li>
                                                <li><i class="fa fa-phone"></i> {{$property->agent->mobile_phone}}</li>
                                                <br/>
                                                <br/>
                                                <br/>
                                                <li>
                                                    <span><a href="{{$property->agent->facebook_link}}" target="_blank"><i class="fa fa-facebook-square"></i> Facebook</a></span>
                                                    <span><a href="{{$property->agent->twitter_link}}" target="_blank"><i class="fa fa-twitter-square"></i>  Twitter</a></span>
                                                    <span><a href="{{$property->agent->linkedin_link}}" target="_blank"><i class="fa fa-linkedin-square"></i>  Linkedin</a></span>
                                                </li>
                                            </ul>
                                            <a href="/agent-details/{{$property->agent->id}}" class="view">View my listing</a>
                                        </div>
                                    </div><!--
                                    <form>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Your Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" placeholder="Location"></textarea>
                                        </div>
                                        <button class="btn btn-secondary btn-block">Request info</button>
                                    </form>-->
                                </div>
                            </div>

                            <div id="map" class="tab-pane fade">

                            </div>
                            <div id="street-map" class="tab-pane fade">

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end detail top-->

    <!--start section page body-->
    <section id="section-body">

        <!--start detail content-->
        <section class="section-detail-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
                        <div class="detail-bar">

                            <div id="description" class="property-description detail-block target-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Description</h2>
                                    <div class="title-right"><!--
                                        <a href="#">Flag this listing <i class="fa fa-flag"></i></a>-->
                                    </div>
                                </div>
                                <p>{{$property->description}}</p>
                            </div>

                            <div id="address" class="detail-address detail-block target-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Address</h2>
                                    <div class="title-right">
                                        <a href="http://maps.google.com/?q={{$property->latitude}},{{$property->longitude}}" target="_blank">Open on Google Maps <i class="fa fa-map-marker"></i></a>
                                    </div>
                                </div>
                                <ul class="list-three-col">
                                    <li><strong>Address:</strong> {{$property->address}}</li>
                                    <li><strong>City:</strong> {{$property->town}}</li>
                                    <li><strong>State/Country:</strong> {{$property->country}}</li>
                                    <li><strong>District:</strong> {{$property->district}}</li>
                                </ul>
                            </div>
                            <div id="detail" class="detail-list detail-block target-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Additional details</h2>
                                    <div class="title-right">
                                        <p>Information last updated on {{ $property->updated_at->format('M d,Y \a\t h:i a') }}</p>
                                    </div>
                                </div>
                                <div class="aler alert-info">
                                    <ul class="list-three-col">
                                        <li><strong>Property ID:</strong> {{$property->propertyID}}</li>
                                        <li><strong>Price:</strong> {{$property->price}}</li>
                                        <li><strong>Property Size:</strong> {{$property->area_size}} Sq Ft</li>
                                        <li><strong>Bedrooms:</strong> {{$property->bedrooms}}</li>
                                        <li><strong>Bathrooms:</strong> {{$property->bathrooms}}</li>
                                        <li><strong>Garage:</strong> {{$property->garage}}</li>
                                        <li><strong>Garage Size:</strong> {{$property->garage_size}} SqFt</li>
                                        <li><strong>Year Built:</strong> {{$property->year_built}}</li>
                                        <li><strong>Deposit:</strong> {{$property->forward}}</li>
                                    </ul>
                                </div><!--
                                <div class="detail-title-inner">
                                    <h4 class="title-inner">Additional details</h4>
                                </div>
                                <ul class="list-three-col">

                                    <li><strong>Pool Size:</strong> 300 Sqft</li>
                                    <li><strong>Last remodel year:</strong> 1987</li>
                                    <li><strong>Amenities:</strong> Clubhouse</li>
                                    <li><strong>Additional Rooms::</strong> Guest Bath</li>
                                    <li><strong>Equipment:</strong> Grill - Gas</li>-->
                                </ul>
                            </div><!--
                            <div id="features" class="detail-features detail-block target-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Features</h2>
                                </div>
                                <ul class="list-three-col list-features">
                                    <li><a href="#"><i class="fa fa-check"></i>Air Conditioning</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Barbeque</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Dryer</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Gym</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Laundry</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Lawn</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Microwave</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Outdoor Shower</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Refrigerator</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Sauna</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Swimming Pool</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>TV Cable</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Washer</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>WiFi</a></li>
                                    <li><a href="#"><i class="fa fa-check"></i>Window Coverings</a></li>
                                </ul>
                            </div>-->
                            <div id="contact-info" class="detail-contact detail-block target-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Reviews</h2>
                                </div>
                                @foreach(App\Review::where('property_id', $property->id)->orderBy('created_at','DESC')->take(2)->get() as $reviews)
                                  <div class="media-left">
                                      <a href="#">
                                          <img src="/images/agents/contact_agent_74x74/{{$reviews->agent->profile_picture}}" class="media-object" alt="image" width="74" height="74">
                                      </a>
                                  </div>
                                  <div class="media-body">
                                      <ul>
                                          <li><i class="fa fa-user"></i> {{$reviews->agent->first_name}} {{$reviews->agent->last_name}}</li>

                                          <li>
                                            <div class="rating">
                                                <span class="bottom-ratings">
                                                  @for ($k=1; $k <= 5 ; $k++)
                                                <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                                    <span class="glyphicon glyphicon-star{{ ($k <= $reviews->property->rating) ? '' : '-empty'}}"></span></span>
                                                @endfor
                                            </div>
                                          </li>
                                          <li>
                                              <p>{{$reviews->review}}</p>
                                          </li>
                                      </ul>
                                  </div>
                              @endforeach

                            </div>

                            <div id="contact-info" class="detail-contact detail-block target-block">
                                <div class="detail-title">
                                    <h2 class="title-left">Contact info</h2>
                                    <div class="title-right"><strong><a href="/agent-details/{{$property->agent->id}}">View my listing</a></strong></div>
                                </div>
                                <div class="media agent-media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="/images/agents/contact_agent_74x74/{{$property->agent->profile_picture}}" class="media-object" alt="image" width="74" height="74">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">CONTACT AGENT</h4>
                                        <ul>
                                            <li><i class="fa fa-user"></i> {{$property->agent->first_name}} {{$property->agent->last_name}} {{$property->agent->profile_picture}}</li>
                                            <li>
                                                <span><i class="fa fa-phone"></i> {{$property->agent->mobile_phone}}</span>
                                                <span><i class="fa fa-mobile"></i>  {{$property->agent->office_phone}} </span>
                                                <span><a href="#"><i class="fa fa-skype"></i>  {{$property->agent->username}} </a></span>
                                            </li>
                                            <li>
                                                <span><a href="{{$property->agent->facebook_link}}" target="_blank"><i class="fa fa-facebook-square"></i> Facebook</a></span>
                                                <span><a href="{{$property->agent->twitter_link}}" target="_blank"><i class="fa fa-twitter-square"></i>  Twitter</a></span>
                                                <span><a href="{{$property->agent->linkedin_link}}" target="_blank"><i class="fa fa-linkedin-square"></i>  Linkedin</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="detail-title-inner">
                                    <h4 class="title-inner">Review and Rate this Property</h4>
                                </div>
                                <form method="post" action="{{route('user.review.submit')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                                    <div class="row">
                                        <div class="col-sm-10 col-xs-12">
                                            <div class="range-advanced-main">
                                                <div class="range-text">
                                                    <label><span class="range-title">Rate:</span></label>
                                                    {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
                                                    <div class="text-left">
                                                        <div class="stars starrr"></div>
                                                        <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;">
                                                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label><span class="range-title">Review:</span></label>
                                                <textarea class="form-control" name="review" rows="5" placeholder="Your review"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Submit Review</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @include('users.right_bar')
                </div>
            </div>

        </section>
        <!--end detail content-->

    </section>
    <!--end section page body-->


@endsection
