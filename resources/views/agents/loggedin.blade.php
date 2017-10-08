@extends('layouts/master')

@section('title')
  {{ $user->firstname }} {{ $user->lastname }}
@endsection

@section('body')
<div class="container">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-left">
                            <h1 class="title-head">Welcome back, {{ $user->firstname }} {{ $user->lastname }}</h1>
                        </div>
                        <div class="page-title-right">
                            <ol class="breadcrumb"><li><a href="/"><i class="fa fa-home"></i></a></li><li class="active">My Profile</li></ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="user-dashboard-full">
                <ul class="profile-menu-tabs">
                    <li class="active"> <a href="my-account.html"> My profile </a></li>
                    <li> <a href="my-properties.html"> My Properties </a></li>
                    <li> <a href="add-new-property.html"> Add a new property </a></li>
                    <li> <a href="my-favourite-properties.html"> Favourite properties </a></li>
                    <li> <a href="my-saved-search.html"> Saved searches </a></li>
                    <li> <a href="my-invoices.html"> Invoices </a></li>
                </ul>
                <div class="profile-area-content">
                  <div class="container">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <div class="profile-detail-block company-detail">
                                          <div class="row">
                                              <div class="col-md-3 col-sm-3 col-xs-12">
                                                  <div class="profile-image">
                                                      <img src="http://placehold.it/230x165" alt="Agent" width="230" height="165" class="">
                                                  </div>
                                              </div>
                                              <div class="col-md-5 col-sm-5 col-xs-12">
                                                  <div class="profile-description">
                                                      <h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
                                                      <h4 class="position">Executive Manager at Real Estate Inc.</h4>
                                                      <div class="rating">
                                                          <span data-title="Average Rate: 4.67 / 5" class="bottom-ratings tip"><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span style="width: 93.4%" class="top-ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span>
                                                          </span>
                                                          <span class="star-text-right">15 Ratings</span>
                                                      </div>
                                                      <ul class="profile-contact">
                                                          <li><span>OFFICE:</span> <a href="#">{{ $user_details->Telephone }}</a></li>
                                                          <li><span>MOBILE:</span> <a href="#">{{ $user_details->Telephone }}</a></li>
                                                          <li><span>FAX:</span> <a href="#">(765) 234 5678</a></li>
                                                          <li class="email"><span>Email:</span> <a href="#">{{ $user->email }}</a></li>
                                                          <li><span>Website:</span> <a href="#">realestate.com</a></li>
                                                      </ul>
                                                      <ul class="profile-social">
                                                          <li><a href="#"><i class="fa fa-phone-square"></i></a></li>
                                                          <li><a href="#" class="btn-facebook"><i class="fa fa-facebook-square"></i></a></li>
                                                          <li><a href="#" class="btn-twitter"><i class="fa fa-twitter-square"></i></a></li>
                                                          <li><a href="#" class="btn-linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                                      </ul>
                                                      <ul class="profile-rating">
                                                          <li><span>Properties listed:</span> {{ $num }}</li>
                                                          <li><span>Agents: </span> 6</li>
                                                          <li><span>Licenses: </span> 3108164 (Florida Real
                                                              Estate Broker)</li>
                                                      </ul>
                                                  </div>
                                              </div>
                                              <div class="col-md-4 col-sm-4 col-xs-12">
                                                  <div class="form-small">
                                                          @if (Auth::check() && (Auth::user()->access)==1)
                                                          <a href="{{ route('agent.edit',$user->id) }}"><button class="btn btn-secondary btn-block">Edit Profile</button></a>
                                                          @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                      <div id="content-area">
                                          <div class="profile-tab-area">
                                              <ul class="profile-tabs">
                                                  <li class="active">OVERVIEW</li>
                                                  <li>PROPERTIES</li>
                                                  <li>REVIEWS</li>
                                              </ul>
                                              <div class="tab-content">
                                                  <div class="profile-tab-pane tab-pane fade active in">
                                                      <div class="profile-tab-content profile-overview">
                                                          <h3 class="title">Agent Bio</h3>
                                                          <p>{{ $user_details->Details }}</p>
                                                      </div>
                                                  </div>
                                                  <div class="profile-tab-pane tab-pane fade">
                                                      <div class="profile-tab-content profile-properties">
                                                          <div class="property-filter-wrap">
                                                              <h4 class="filter-title"> {{ $num }} Properties </h4>
                                                        <!--      <form class="filter-inputs">
                                                                  <ul>
                                                                      <li><label> Filter by </label></li>
                                                                      <li>
                                                                          <select class="selectpicker" data-live-search="false" data-live-search-style="begins" title="Status">
                                                                              <option>Status 1</option>
                                                                              <option>Status 2</option>
                                                                              <option>Status 3</option>
                                                                              <option>Status 4</option>
                                                                              <option>Status 5</option>
                                                                          </select>
                                                                      </li>
                                                                      <li>
                                                                          <select class="selectpicker" data-live-search="false" data-live-search-style="begins" title="Agents">
                                                                              <option>Agent 1</option>
                                                                              <option>Agent 2</option>
                                                                              <option>Agent 3</option>
                                                                              <option>Agent 4</option>
                                                                              <option>Agent 5</option>
                                                                          </select>
                                                                      </li>
                                                                  </ul>
                                                              </form>--->
                                                          </div>
                                                          <!--start property items-->
                                                          <div class="property-listing grid-view grid-view-3-col">
                                                              <div class="row">
                                                                @foreach($property as $listing)
                                                                  <div class="item-wrap">
                                                                      <div class="property-item table-list">
                                                                          <div class="table-cell">
                                                                              <div class="figure-block">
                                                                                  <figure class="item-thumb">
                                                                                      <span class="label-featured label label-success">Featured</span>
                                                                                      <div class="label-wrap label-right hide-on-list">
                                                                                          <span class="label label-default">For Sale</span>
                                                                                          <span class="label label-danger">Sold</span>
                                                                                      </div>
                                                                                      <div class="price hide-on-list">
                                                                                          <p class="price-start">Price</p>
                                                                                          <h3>{{ $listing->price }}</h3>
                                                                                      </div>
                                                                                      <a href="#">
                                                                                          <img src="http://placehold.it/364x244" alt="thumb">
                                                                                      </a>
                                                                                      <ul class="actions">
                                                                                          <li>
                                                                                  <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Favorite">
                                                                                      <i class="fa fa-heart"></i>
                                                                                  </span>
                                                                                          </li>
                                                                                          <li class="share-btn">
                                                                                              <div class="share_tooltip fade">
                                                                                                  <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                                                                                  <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                                                                                  <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                                                                                                  <a target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
                                                                                              </div>
                                                                                              <span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>
                                                                                          </li>
                                                                                          <li>
                                                                                  <span data-toggle="tooltip" data-placement="top" title="Photos (12)">
                                                                                      <i class="fa fa-camera"></i>
                                                                                  </span>
                                                                                          </li>
                                                                                      </ul>
                                                                                  </figure>
                                                                              </div>
                                                                          </div>
                                                                          <div class="item-body table-cell">

                                                                              <div class="body-left table-cell">
                                                                                  <div class="info-row">
                                                                                      <div class="rating">
                                                                          <span data-title="Average Rate: 4.67 / 5" class="bottom-ratings tip"><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span style="width: 93.4%" class="top-ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span>
                                                                          </span>
                                                                                          <span class="star-text-right">15 Ratings</span>
                                                                                      </div>
                                                                                      <h2 class="property-title"><a href="{{ route('listings.show',$listing->id) }}">{{ $listing->title }}</a></h2>
                                                                                      <h4 class="property-location">{{ $listing->address }}</h4>
                                                                                  </div>
                                                                                  <div class="info-row amenities hide-on-grid">
                                                                                      <p>
                                                                                        <span>Beds: {{ $listing->bedrooms }}</span>
                                                                                        <span>Baths: {{ $listing->bathrooms }}</span>
                                                                                        <span>Sqft: {{ $listing->area_size }}</span>
                                                                                      </p>
                                                                                      <p>Single Family Home</p>
                                                                                  </div>
                                                                                  <div class="info-row date hide-on-grid">
                                                                                      <p><i class="fa fa-user"></i> <a href="#">{{ $listing->firstname }} {{ $listing->lastname }}</a></p>
                                                                                      <p><i class="fa fa-calendar"></i> 12 Days ago </p>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="body-right table-cell hidden-gird-cell">
                                                                                  <div class="info-row price">
                                                                                      <h3>{{ $listing->price }}</h3>
                                                                                  </div>
                                                                                  <div class="info-row phone text-right">
                                                                                      <a href="{{ route('listings.show',$listing->id) }}" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                                      <p><a href="#">{{ $listing->Telephone }}</a></p>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="table-list full-width hide-on-list">
                                                                                  <div class="cell">
                                                                                      <div class="info-row amenities">
                                                                                          <p>
                                                                                              <span>Beds: {{ $listing->bedrooms }}</span>
                                                                                              <span>Baths: {{ $listing->bathrooms }}</span>
                                                                                              <span>Sqft: {{ $listing->area_size }}</span>
                                                                                          </p>
                                                                                          <p>Single Family Home</p>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="cell">
                                                                                      <div class="phone">
                                                                                          <a href="{{ route('listings.show',$listing->id) }}" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                                          <p><a href="#">{{ $listing->Telephone }}</a></p>
                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="item-foot date hide-on-list">
                                                                          <div class="item-foot-left">
                                                                              <p><i class="fa fa-user"></i> <a href="#">{{ $listing->firstname }} {{ $listing->lastname }}</a></p>
                                                                          </div>
                                                                          <div class="item-foot-right">
                                                                              <p><i class="fa fa-calendar"></i> 12 Days ago </p>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  @endforeach
                                                              </div>
                                                          </div>
                                                          <!--end property items-->
                                                      </div>
                                                  </div>
                                                  <div class="profile-tab-pane tab-pane fade">
                                                      <div class="profile-tab-content profile-review">
                                                          <h3 class="title">2 Reviews for Real Estate Inc.</h3>
                                                          <div class="reviews-list">
                                                              <div class="media">
                                                                  <div class="media-left">
                                                                      <a href="#">
                                                                          <img class="media-object img-circle" src="http://placehold.it/60x60" alt="Thumb" height="60" width="60">
                                                                      </a>
                                                                  </div>
                                                                  <div class="media-body">
                                                                      <div class="review-top">
                                                                          <h3 class="media-heading"><a href="#">John Doe</a></h3>
                                                                          <div class="rating">
                                                                              <span class="bottom-ratings"><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span style="width: 70%" class="top-ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></span>
                                                                          </div>
                                                                      </div>
                                                                      <p class="review-date">February 6, 2014 </p>

                                                                      <p>Lorem ipsum dolor sit amet,
                                                                          consectetur adipiscing elit. Etiam
                                                                          risus tortor, accumsan at nisi et,
                                                                      </p>
                                                                  </div>
                                                              </div>
                                                              <div class="media">
                                                                  <div class="media-left">
                                                                      <a href="#">
                                                                          <img class="media-object img-circle" src="http://placehold.it/60x60" alt="Thumb" height="60" width="60">
                                                                      </a>
                                                                  </div>
                                                                  <div class="media-body">
                                                                      <div class="review-top">
                                                                          <h3 class="media-heading"><a href="#">John Doe</a></h3>
                                                                          <div class="rating">
                                                                              <span class="bottom-ratings tip"><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span style="width: 70%" class="top-ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></span>
                                                                          </div>
                                                                      </div>
                                                                      <p class="review-date">February 6, 2014 </p>

                                                                      <p>Lorem ipsum dolor sit amet,
                                                                          consectetur adipiscing elit. Etiam
                                                                          risus tortor, accumsan at nisi et,
                                                                      </p>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="add-review-block">
                                                              <h4 class="review-title">Add a review</h4>
                                                              <form>
                                                                  <div class="add-rating">
                                                                      <label>Your rating</label>
                                                                      <div class="rating">
                                                                          <span class="bottom-ratings"><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span style="width: 70%" class="top-ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></span>
                                                                      </div>
                                                                  </div>
                                                                  <div class="row">
                                                                      <div class="col-sm-6 col-xs-12">
                                                                          <div class="form-group">
                                                                              <input class="form-control" placeholder="Your name">
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-sm-6 col-xs-12">
                                                                          <div class="form-group">
                                                                              <input class="form-control" placeholder="Email address">
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-sm-12 col-xs-12">
                                                                          <div class="form-group">
                                                                              <textarea class="form-control" rows="5" placeholder="Your review"></textarea>
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-sm-12 col-xs-12">
                                                                          <button class="btn btn-secondary">Submit Review</button>
                                                                      </div>
                                                                  </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                </div>

            </div>
        </div>

@endsection
