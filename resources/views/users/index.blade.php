@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Home</title>
@endsection
@section('content')

    <!--start banner module-->
      @if(sizeof($banner_images)>0)
        @include('users.banner1')
      @endif
    <!--end banner module-->

    <!--start section page body-->
    <section id="section-body">

        <!--start carousel module-->
        <div class="houzez-module-main">
            <div class="houzez-module carousel-module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="module-title-nav clearfix">
                                <div>
                                    <h2>Latest for Sale</h2>
                                </div>
                                <div class="module-nav">
                                    <button class="btn btn-sm btn-crl-pprt-1-prev">Prev</button>
                                    <button class="btn btn-sm btn-crl-pprt-1-next">Next</button>
                                    <a href="{{route('listings.sale')}}" class="btn btn-carousel btn-sm">All</a>
                                </div>
                            </div>
                        </div>
                        @if(sizeof($properties_for_sale)>0)
                        <div class="col-sm-12">
                            <div class="row grid-row">
                                <div class="carousel properties-carousel-grid-1 slide-animated">
                                    @foreach($properties_for_sale as $property_for_sale)
                                        <div class="item">
                                            <div class="item-wrap">
                                                <div class="property-item item-grid">
                                                    <div class="figure-block">
                                                        <figure class="item-thumb">
                                                          @if($property_for_sale->for_sale==1)
                                                            <div class="label-wrap hide-on-list">
                                                                <div class="label-status label label-default">For Sale</div>
                                                            </div>
                                                            @else
                                                            <div class="label-wrap hide-on-list">
                                                                <div class="label-status label label-default">For Rent</div>
                                                            </div>
                                                            @endif
                                                             @if($property_for_sale->active==1)
                                                            <span class="label-featured label label-success">Featured</span>
                                                            @endif
                                                            <div class="price hide-on-list">
                                                                <h3 style="text-transform: uppercase;"> {{$property_for_sale->currency}} {{$property_for_sale->price}}</h3>
                                                            </div>
                                                            <a href="/property-details/{{$property_for_sale->id}}" class="hover-effect">
                                                                <img src="/images/properties/latest_home_and_best_property_355x240/{{$property_for_sale->image}}" alt="thumb">
                                                            </a>
                                                            <ul class="actions">
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
                                                                  <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>
                                                              </li>
                                                                <li>
                                                                    <span id="fav-span{{$property_for_sale->id}}" data-toggle="tooltip" data-placement="top" title="Favorite"
                                                                          onclick="addToFavorites({{$property_for_sale->id}},
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
                                                                <li>
                                                                  <span data-toggle="tooltip"
                                                                      data-placement="top"
                                                                      title="Photos ({{$property_for_sale->images->count()+1}})">

                                                                      <a class="example-image-link"
                                                                      href="/images/properties/latest_home_and_best_property_355x240/{{$property_for_sale->image}}"
                                                                      data-lightbox="sale{{$property_for_sale->id}}"
                                                                      data-title="">
                                                                        <i class="fa fa-camera"></i>
                                                                      </a>
                                                                      @foreach($property_for_sale->images as $image)
                                                                        <a class="example-image-link"
                                                                        href="/images/properties/latest_home_and_best_property_355x240/{{$image->image}}"
                                                                        data-lightbox="sale{{$property_for_sale->id}}"
                                                                        data-title=""></a>
                                                                      @endforeach
                                                                  </span>
                                                                </li>
                                                            </ul>
                                                        </figure>
                                                    </div>

                                                    <div class="item-body">

                                                        <div class="body-left">
                                                            <div class="info-row">
                                                                <div class="rating">
                                                                  @for ($k=1; $k <= 5 ; $k++)
                                                                  <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                                                      <span class="glyphicon glyphicon-star{{ ($k <= $property_for_sale->rating) ? '' : '-empty'}}"></span></span>
                                                                  @endfor
                                                                </div>
                                                                <h2 class="property-title"><a href="/property-details/{{$property_for_sale->id}}">{{$property_for_sale->title}}</a></h2>
                                                                <h4 class="property-location">{{$property_for_sale->address}}.  {{$property_for_sale->district}}, {{$property_for_sale->country}}</h4>
                                                            </div>
                                                            <div class="table-list full-width info-row">
                                                                <div class="cell">
                                                                    <div class="info-row amenities">
                                                                        <p>
                                                                            <span>Beds: {{$property_for_sale->bedrooms}}</span>
                                                                            <span>Baths: {{$property_for_sale->bathrooms}}</span>
                                                                            <span>Sqft: {{$property_for_sale->area_size}}</span>
                                                                        </p>
                                                                        <p>{{$property_for_sale->type->name}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cell">
                                                                    <div class="phone">
                                                                        <a href="/property-details/{{$property_for_sale->id}}" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                        <p><a href="#">{{$property_for_sale->agent->mobile_phone}}</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="item-foot date hide-on-list">
                                                    <div class="item-foot-left">
                                                        <p><i class="fa fa-user"></i> <a href="#">{{$property_for_sale->agent->first_name}} {{$property_for_sale->agent->last_name}}</a></p>
                                                    </div>
                                                    <div class="item-foot-right">
                                                        <p><i class="fa fa-calendar"></i> {{ $property_for_sale->created_at->format('M d,Y \a\t h:i a') }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                      @else
                        <div class="houzez-module module-title text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <h3 class="sub-heading text-center">No Listings available!</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                      @endif
                    </div>
                </div>
            </div>
        </div>
        <!--end carousel module-->

        <!--start carousel module-->
        <div class="houzez-module-main">
            <div class="houzez-module carousel-module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="module-title-nav clearfix">
                                <div>
                                    <h2>Latest for Rent</h2>
                                </div>
                                <div class="module-nav">
                                    <button class="btn btn-sm btn-crl-pprt-2-prev">Prev</button>
                                    <button class="btn btn-sm btn-crl-pprt-2-next">Next</button>
                                    <a href="{{route('listings.rent')}}" class="btn btn-carousel btn-sm">All</a>
                                </div>
                            </div>
                        </div>
                        @if(sizeof($properties_for_rent)>0)
                        <div class="col-sm-12">
                            <div class="row grid-row">
                                <div class="carousel properties-carousel-grid-2 slide-animated">
                                    @foreach($properties_for_rent as $property_for_rent)
                                        <div class="item">
                                            <div class="item-wrap">
                                                <div class="property-item item-grid">
                                                    <div class="figure-block">
                                                        <figure class="item-thumb">
                                                          @if($property_for_sale->for_sale==1)
                                                            <div class="label-wrap hide-on-list">
                                                                <div class="label-status label label-default">For Sale</div>
                                                            </div>
                                                            @else
                                                            <div class="label-wrap hide-on-list">
                                                                <div class="label-status label label-default">For Rent</div>
                                                            </div>
                                                            @endif
                                                             @if($property_for_sale->active==1)
                                                            <span class="label-featured label label-success">Featured</span>
                                                            @endif
                                                            <div class="price hide-on-list">
                                                                <h3 style="text-transform: uppercase;">{{$property_for_rent->currency}} {{$property_for_rent->price}}</h3>
                                                            </div>
                                                            <a href="/property-details/{{$property_for_rent->id}}" class="hover-effect">
                                                                <img src="/images/properties/latest_home_and_best_property_355x240/{{$property_for_rent->image}}" alt="thumb">
                                                            </a>
                                                            <ul class="actions">
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
                                                                  <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>
                                                              </li>
                                                                <li>
                                                                            <span id="fav-span{{$property_for_rent->id}}"
                                                                              data-toggle="tooltip"
                                                                              data-placement="top" title="Favorite"
                                                                                  onclick="addToFavorites({{$property_for_rent->id}},
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
                                                                <li>
                                                                  <span data-toggle="tooltip"
                                                                      data-placement="top"
                                                                      title="Photos ({{$property_for_rent->images->count()+1}})">

                                                                      <a class="example-image-link"
                                                                      href="/images/properties/latest_home_and_best_property_355x240/{{$property_for_rent->image}}"
                                                                      data-lightbox="sale{{$property_for_rent->id}}"
                                                                      data-title="">
                                                                        <i class="fa fa-camera"></i>
                                                                      </a>
                                                                      @foreach($property_for_rent->images as $image)
                                                                        <a class="example-image-link"
                                                                        href="/images/properties/latest_home_and_best_property_355x240/{{$image->image}}"
                                                                        data-lightbox="sale{{$property_for_rent->id}}"
                                                                        data-title=""></a>
                                                                      @endforeach
                                                                  </span>
                                                                </li>
                                                            </ul>
                                                        </figure>
                                                    </div>

                                                    <div class="item-body">

                                                        <div class="body-left">
                                                            <div class="info-row">
                                                                <div class="rating">
                                                                  @for ($k=1; $k <= 5 ; $k++)
                                                                  <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                                                      <span class="glyphicon glyphicon-star{{ ($k <= $property_for_rent->rating) ? '' : '-empty'}}"></span></span>
                                                                  @endfor
                                                                </div>
                                                                <h2 class="property-title"><a href="/property-details/{{$property_for_rent->id}}">{{$property_for_rent->title}}</a></h2>
                                                                <h4 class="property-location">{{$property_for_rent->address}}. {{$property_for_rent->district}}, {{$property_for_rent->country}}</h4>
                                                            </div>
                                                            <div class="table-list full-width info-row">
                                                                <div class="cell">
                                                                    <div class="info-row amenities">
                                                                        <p>
                                                                            <span>Beds: {{$property_for_rent->bedrooms}}</span>
                                                                            <span>Baths: {{$property_for_rent->bathrooms}}</span>
                                                                            <span>Sqft: {{$property_for_rent->area_size}}</span>
                                                                        </p>
                                                                        <p>{{$property_for_rent->type->name}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cell">
                                                                    <div class="phone">
                                                                        <a href="/property-details/{{$property_for_rent->id}}" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                        <p><a href="#">{{$property_for_rent->agent->mobile_phone}}</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="item-foot date hide-on-list">
                                                    <div class="item-foot-left">
                                                        <p><i class="fa fa-user"></i> <a href="#">{{$property_for_rent->agent->first_name}} {{$property_for_rent->agent->last_name}}</a></p>
                                                    </div>
                                                    <div class="item-foot-right">
                                                        <p><i class="fa fa-calendar"></i> {{ $property_for_rent->created_at->format('M d,Y \a\t h:i a') }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                      @else
                        <div class="houzez-module module-title text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <h3 class="sub-heading text-center">No Listings available!</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                      @endif
                    </div>
                </div>
            </div>
        </div>
        <!--end carousel module-->

        <!--start location module-->
        <div class="houzez-module-main module-white-bg">
            <div class="houzez-module module-title text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h2>Latest from the Community</h2>
                            <h3 class="sub-heading">Some of the latest blogs from the Community</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!--start post card grid module-->
              <div id="carousel-post-card-module" class="houzez-module carousel-post-card-module">
                  <div class="container">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="module-title-nav clearfix">
                                  <div class="module-nav">
                                      <button class="btn btn-sm btn-crl-post-card-prev">Prev</button>
                                      <button class="btn btn-sm btn-crl-post-card-next">Next</button>
                                      <a href="{{route('user.blog.posts')}}" class="btn btn-carousel btn-sm">All</a>
                                  </div>
                              </div>
                          </div>
                          @if(sizeof($posts)>0)
                          <div class="col-sm-12">
                              <div class="row grid-row">
                                  <div id="carousel-post-card">
                                    @foreach($posts as $post)

                                      <div class="item">
                                          <div class="item-wrap">
                                              <div class="post-card-item">
                                                  <div class="figure-block">
                                                      <figure class="item-thumb">
                                                          <a href="#" class="hover-effect">
                                                              <img src="/images/blog/user_810x400/{{$post->image}}" alt="Blog Image" width="266" height="266">
                                                          </a>
                                                          <div class="thumb-caption clearfix">
                                                              <div class="file-type pull-left"><i class="fa fa-file"></i></div>
                                                              <div class="comment-count pull-right"><span class="count">{{$post->num_comments}}</span><i class="fa fa-comments-o"></i></div>
                                                          </div>
                                                      </figure>
                                                  </div>
                                                  <div class="post-card-body">

                                                      <div class="post-card-description">
                                                          <ul class="list-inline">
                                                              <li><i class="fa fa-calendar"></i> {{ $post->created_at->format('M d,Y \a\t h:i a') }}</li>
                                                              <li><span>by {{$post->username}}</span></li>
                                                              <!--<li><i class="fa fa-bookmark-o"></i> Real Estate</li>-->
                                                          </ul>
                                                          <h3>{{$post->title}}</h3>
                                                          <p>{{ str_limit($post->body, $limit = 250, $end = '...') }}</p>
                                                          <a href="{{route('user.show.posts',['slug'=>$post->slug])}}" class="read">Continue reading <i class="fa fa-caret-right"></i></a>
                                                      </div>
                                                      <div class="post-card-author">
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      @endforeach

                                  </div>
                              </div>
                          </div>
                          @else
                          <div class="houzez-module module-title text-center">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-sm-12 col-xs-12">
                                          <h3 class="sub-heading text-center">No blogs available!</h3>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          @endif

                      </div>

                  </div>
              </div>
              <!--end post card grid module-->
        </div>
        <!--end location module-->

        </div>
        <!--end location module-->

        <!--start property item module-->
        @if(sizeof($properties_of_value)>0)
        <div class="houzez-module-main module-gray-bg">
            <div class="houzez-module module-title text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Best Property Value</h2>
                            <h3 class="sub-heading">Properties sold at the best prices this week</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-item-module" class="houzez-module property-item-module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row grid-row">
                                @foreach($properties_of_value as $property_of_value)
                                    <div class="col-sm-6">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                      @if($property_for_sale->for_sale==1)
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">For Sale</div>
                                                        </div>
                                                        @else
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">For Rent</div>
                                                        </div>
                                                        @endif
                                                         @if($property_for_sale->active==1)
                                                        <span class="label-featured label label-success">Featured</span>
                                                        @endif
                                                        <div class="price hide-on-list">
                                                            <h3 style="text-transform:uppercase;">{{$property_of_value->currency}} {{$property_of_value->price}}</h3>
                                                        </div>
                                                        <a href="/property-details/{{$property_of_value->id}}" class="hover-effect">
                                                            <img src="/images/properties/latest_home_and_best_property_355x240/{{$property_of_value->image}}"
                                                                 alt="thumb">
                                                        </a>
                                                        <ul class="actions">
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
                                                              <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>
                                                          </li>
                                                            <li>
                                                              <span id="fav-span{{$property_of_value->id}}"
                                                                data-toggle="tooltip" data-placement="top" title="Favorite"
                                                                    onclick="addToFavorites({{$property_of_value->id}},
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
                                                            <li>
                                                              <span data-toggle="tooltip"
                                                                  data-placement="top"
                                                                  title="Photos ({{$property_of_value->images->count()+1}})">

                                                                  <a class="example-image-link"
                                                                  href="/images/properties/latest_home_and_best_property_355x240/{{$property_of_value->image}}"
                                                                  data-lightbox="val{{$property_of_value->id}}"
                                                                  data-title="">
                                                                    <i class="fa fa-camera"></i>
                                                                  </a>
                                                                  @foreach($property_of_value->images as $image)
                                                                    <a class="example-image-link"
                                                                    href="/images/properties/latest_home_and_best_property_355x240/{{$image->image}}"
                                                                    data-lightbox="val{{$property_of_value->id}}"
                                                                    data-title=""></a>
                                                                  @endforeach
                                                              </span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                </div>

                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <div class="rating">
                                                              @for ($k=1; $k <= 5 ; $k++)
                                                              <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                                                  <span class="glyphicon glyphicon-star{{ ($k <= $property_of_value->rating) ? '' : '-empty'}}"></span></span>
                                                              @endfor
                                                            </div>
                                                            <h2 class="property-title"><a href="/property-details/{{$property_of_value->id}}">{{$property_of_value->title}}</a></h2>
                                                            <h4 class="property-location">{{$property_of_value->address}}. {{$property_of_value->district}}, {{$property_of_value->country}}</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: {{$property_of_value->bedrooms}}</span>
                                                                        <span>Baths: {{$property_of_value->bathrooms}}</span>
                                                                        <span>Sqft: {{$property_of_value->area_size}}</span>
                                                                    </p>
                                                                    <p>{{$property_of_value->type->name}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                                <div class="phone">
                                                                    <a href="/property-details/{{$property_of_value->id}}" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                    <p><a href="#">{{$property_of_value->agent->mobile_phone}}</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="item-foot date hide-on-list">
                                                <div class="item-foot-left">
                                                    <p><i class="fa fa-user"></i> <a href="#">{{$property_of_value->agent->first_name}} {{$property_of_value->agent->last_name}}</a></p>
                                                </div>
                                                <div class="item-foot-right">
                                                    <p><i class="fa fa-calendar"></i> {{ $property_of_value->created_at->format('M d,Y \a\t h:i a') }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif
        <!--end property item module-->


        <!--start agents module-->
        <div class="houzez-module module-title text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <h2>Featured Agents</h2>
                        <h3 class="sub-heading">List of featured Agents</h3>
                    </div>
                </div>
            </div>
        </div>
        @if(sizeof($home_agents)>0)
        <div id="agents-module" class="houzez-module agents-module">
        <div class="container">
            <div class="agents-blocks-main">
                <div class="row no-margin">
                  @foreach($home_agents as $home_agents)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="agents-block">
                            <figure class="auther-thumb">
                                <img src="/images/agents/home_71x71/{{$home_agents->profile_picture}}" alt="avatar">
                            </figure>
                            <div class="block-body">
                                <p class="auther-info">
                                  <a href="/agent-details/{{$home_agents->id}}" class="view">
                                    <span><span class="blue">{{ $home_agents->first_name }} {{ $home_agents->last_name }}</span></span></a>
                                    <span>{{ $home_agents->position }}, {{ $home_agents->company }}</span>
                                </p>
                                <p class="description">
                                  {!! str_limit($home_agents->bio, $limit = 80, $end = '.......') !!}
                                </p>
                                <a href="/agent-details/{{$home_agents->id}}" class="view">View profile</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
    @else
    <div class="houzez-module module-title text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h3 class="sub-heading text-center">No featured agents available!</h3>
                </div>
            </div>
        </div>
    </div>

    @endif
    <!--end agents module-->

        <!--end agents carousel module-->


    </section>
    <!--end section page body-->





    <!--More images modal-->
    <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content" id="modal-content">

          <!---<div class="mySlides">
            <div class="numbertext">1 / 4</div>
            <img src="/modal/h10.jpeg" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">2 / 4</div>
            <img src="/modal/h11.jpeg" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">3 / 4</div>
            <img src="/modal/h12.jpeg" style="width:100%">
          </div>

          <div class="mySlides">
            <div class="numbertext">4 / 4</div>
            <img src="/modal/h13.jpeg" style="width:100%">
          </div>-->

          <!--<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>-->

          <!--<div class="caption-container">
            <p id="caption"></p>
          </div>-->


          <!--<div class="column">
            <img class="demo cursor" src="/modal/h10.jpeg"
            style="width:100%" onclick="currentSlide(1)"
            alt="Nature and sunrise">
          </div>
          <div class="column">
            <img class="demo cursor" src="/modal/h11.jpeg"
            style="width:100%" onclick="currentSlide(2)"
            alt="Trolltunga, Norway">
          </div>
          <div class="column">
            <img class="demo cursor" src="/modal/h12.jpeg"
            style="width:100%" onclick="currentSlide(3)"
            alt="Mountains and fjords">
          </div>
          <div class="column">
            <img class="demo cursor" src="/modal/h13.jpeg"
            style="width:100%" onclick="currentSlide(4)"
            alt="Northern Lights">
          </div>-->
        </div>
      </div>

@endsection
