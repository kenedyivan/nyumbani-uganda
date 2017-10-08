<!--start advanced search section-->
<section class="advanced-search advance-search-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="/search" method="GET" role="search">
                    {{ csrf_field() }}
                    <div class="form-group search-long">
                        <div class="search">
                            <div class="input-search input-icon" >
                                <div class="col-xs-6">
                                <input style="background-color: #f1f1f1;" class="form-control" name="title" type="text" placeholder="Search for a place to stay? title">
                                </div>
                                <div class="col-xs-3">
                                <input style="background-color: #f1f1f1;" class="form-control" name="district" type="text" list="districts" placeholder="All Districts">
                                </div>
                                <div class="col-xs-3"> 
                                <input style="background-color: #f1f1f1;" class="form-control" name="town" type="text" list="cities"  placeholder="All Towns">
                                </div>
                            </div>
                            <div class="advance-btn-holder">
                                <button class="advance-btn btn" type="button"><i class="fa fa-gear"></i> Advanced</button>
                            </div>
                        </div>
                        <div class="search-btn">
                            <button class="btn btn-secondary">Go</button>
                        </div>
                    </div>
                    <div class="advance-fields">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="status" data-live-search="true" data-live-search-style="begins" title="Status">
                                        <option value="for_sale">For Sale</option>
                                        <option value="for_rent">For Rent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="type" data-live-search="true" data-live-search-style="begins" title="Property Type">
                                        @foreach(App\PropertyType::all() as $types)
                                            <option value="{{ $types->id }}">{{ $types->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="bedrooms" data-live-search="true" data-live-search-style="begins" title="Beds">
                                        @for($i=0; $i<=15; $i++)
                                            <option value="{{ $i }}">{{ $i }} Bedrooms</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="bathrooms" data-live-search="true" data-live-search-style="begins" title="Baths">
                                        @for($i=0; $i<=8; $i++)
                                            <option value="{{ $i }}">{{ $i }} Bathrooms</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <?php
                            $i = 100;
                            $k = 1000;
                            $m = 100;
                            $n = 1000;
                            $p = 50000;
                            $q = 50000000;
                            $r = 50000;
                            $t = 50000000;
                            ?>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="area_size_min" data-live-search="true" data-live-search-style="begins" title="Min Areas (Sqft)">
                                        @while($i<=$k)
                                            <option value="{{ $i }}">{{ $i }} Sqft</option>
                                            <?php $i = $i+50; ?>
                                        @endwhile
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="area_size_max" data-live-search="true" data-live-search-style="begins" title="Max Areas (Sqft)">
                                        @while($m<=$n)
                                            <option value="{{ $m }}">{{ $m }} Sqft</option>
                                            <?php $m = $m+50; ?>
                                        @endwhile
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="price_min" min="50000" max="5000000000" pattern="[0-9]" placeholder="50000">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="price_max" min="50000" max="5000000000" pattern="[0-9]" placeholder="50000">
                                    </div>
                                </div><!--
                                <div class="range-advanced-main">
                                    <div class="range-text">
                                        <input type="text" name="price_min" class="min-price-range-hidden range-input" readonly >
                                        <input type="text" name="price_max" class="max-price-range-hidden range-input" readonly >
                                        <p><span class="range-title">Price Range:</span> from <span class="min-price-range"></span> to <span class="max-price-range"></span></p>
                                    </div>
                                    <div class="range-wrap">
                                        <div class="price-range-advanced"></div>
                                    </div>
                                </div>-->
                            </div>
                            <div class="col-sm-12 col-xs-12 features-list">

                                <label class="advance-trigger text-uppercase title"><i class="fa fa-plus-square"></i> Other Features </label>
                                <div class="clearfix"></div>
                                <div class="field-expand">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Garage" value="Garage"> Garage
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Air_Conditioning" value="Air Conditioning"> Air Conditioning
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Barbeque" value="Barbeque"> Barbeque
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Dryer" value="Dryer"> Dryer
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Gym" value="Gym"> Gym
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Laundry" value="Laundry"> Laundry
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Refrigerator" value="Refrigerator"> Refrigerator
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Swimming_Pool" value="Swimming Pool"> Swimming Pool
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Window_Coverings" value="Window Coverings"> Window Coverings
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Outdoor_Shower" value="Outdoor Shower"> Outdoor Shower
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Sauna" value="Sauna"> Sauna
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="Lawn" value="Lawn"> Lawn
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--end advanced search section-->
