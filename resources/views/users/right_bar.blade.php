<?php $side_bar = Session::get('side_bar');?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar">
    <aside id="sidebar">
        <div class="widget widget-recommend">
            <div class="widget-top">
                <h3 class="widget-title">We recommend</h3>
            </div>
            <?php $recommend = $side_bar["most_recommended"];?>
            <div class="widget-body">
              @foreach(App\Property::where('recommended',1)->take(3)->get() as $recommend_property)
                <div class="media">
                    <div class="media-left">
                        <figure class="item-thumb">
                            <a class="hover-effect" href="/property-details/{{$recommend_property->id}}">
                                <img alt="thumb" src="/images/properties/agent_properties_150x110/{{$recommend_property->image}}" width="100" height="75">
                            </a>
                        </figure>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><a href="/property-details/{{$recommend_property->id}}">{{$recommend_property->title}}</a></h3>
                        <h4 style="text-transform: uppercase;"> {{$recommend_property->currency}} {{$recommend_property->price}}</h4>
                        <div class="amenities">
                            <p>{{$recommend_property->bedrooms}} beds • {{$recommend_property->bathrooms}} baths • {{$recommend_property->area_size}} sqft</p>
                            <p>{{$recommend_property->type->name}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <?php $most_rated = $side_bar["most_rated"];?>
        <div class="widget widget-rated">
            <div class="widget-top">
                <h3 class="widget-title">Most Rated Properties</h3>
            </div>
            <div class="widget-body">
              @foreach(App\Property::orderBy('rating','DESC')->take(3)->get() as $most_rated_property)
                <div class="media">
                    <div class="media-left">
                        <figure class="item-thumb">
                            <a class="hover-effect" href="/property-details/{{$most_rated_property->id}}">
                                <img alt="thumb" src="/images/properties/agent_properties_150x110/{{$most_rated_property->image}}" width="100" height="75">
                            </a>
                        </figure>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><a href="/property-details/{{$most_rated_property->id}}">{{$most_rated_property->title}}</a></h3>
                        <div class="rating">
                            <span class="star-text-left" style="text-transform: uppercase;">{{$most_rated_property->currency}} {{$most_rated_property->price}}</span>
                            @for ($k=1; $k <= 5 ; $k++)
                                <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                <span class="glyphicon glyphicon-star{{ ($k <= $most_rated_property->rating) ? '' : '-empty'}}"></span></span>
                            @endfor
                        </div>
                        <div class="amenities">
                          <p>{{$most_rated_property->bedrooms}} beds • {{$most_rated_property->bathrooms}} baths • {{$most_rated_property->area_size}} sqft</p>
                          <p>{{$most_rated_property->type->name}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="widget widget-categories">
            <div class="widget-top">
                <h3 class="widget-title">Property Categories</h3>
            </div>
            <div class="widget-body">
                <ul>
                  @foreach(App\PropertyType::all() as $type)
                  @foreach(App\Property::all() as $all_property)
                       <?php
                       $j=0;
                       ?>
                       @for($i=0; $i<=sizeof(App\Property::all()); $i++)
                       @if($all_property->type->name == $type->name)
                       <?php $j=$j+1;?>
                       @endif
                       @endfor

                       @endforeach
                  <li><a href="/property-category/{{$type->id}}"> {{$type->name}} </a> <span class="cat-count">({{$type->properties->count()}})</span></li>
                  @endforeach
                </ul>
            </div>
        </div>
        <div class="widget widget-reviews">
            <div class="widget-top">
                <h3 class="widget-title">Latest Reviews</h3>
            </div>
            <div class="widget-body">
              @foreach(App\Review::orderBy('created_at','DESC')->take(2)->get() as $reviews)
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object"
                            src="/images/properties/latest_reviews_50x50/{{$reviews->property->image}}"
                            alt="Thumb" width="50" height="50">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><a href="/property-details/{{$reviews->property->id}}">{{$reviews->property->title}}</a></h3>
                        <div class="rating">
                            <span class="bottom-ratings">
                              @for ($k=1; $k <= 5 ; $k++)
                            <span data-title="Average Rate: 5 / 5" class="bottom-ratings tip">
                                <span class="glyphicon glyphicon-star{{ ($k <= $reviews->property->rating) ? '' : '-empty'}}"></span></span>
                            @endfor
                        </div>
                        <p>{{$reviews->review}}</p>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </aside>
</div>
