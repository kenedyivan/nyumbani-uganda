@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Edit Property</title>
@endsection
@section('content')
    <!--start section page body-->
    <section id="section-body">
        <div class="container">
            <div class="membership-page-top">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="membership-page-title">
                            <h1 class="page-title"> Complete your order </h1>
                            <p class="page-subtitle"> Please enter your Account and Billing information to complete your membership! </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="membership-content-area">
                <form action="{{route('agent.edit.listing.submit')}}" method="post" enctype="multipart/form-data">
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>Property description and price</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="property-title">Title</label>
                                            <input class="form-control" id="property-title" name="title" value="{{$property->title}}" >
                                            <input class="form-control" type="hidden" id="property-title" name="idproperty" value="{{$property->id}}" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" rows="6"
                                                      name="description" placeholder="Enter your property title">{{$property->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-type">Type</label>
                                            <select class="selectpicker" id="property-type" data-live-search="false"
                                                    data-live-search-style="begins" title="Select" name="type">
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}" selected="selected">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-sale_type">Sale type</label>
                                            <select class="selectpicker" id="property-sale_type"
                                                    data-live-search="false" data-live-search-style="begins" title="Select" name="sale_type">
                                                <option value="for_sale" selected="selected">Sale</option>
                                                <option value="for_rent">Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-price">Property price</label>
                                            <input class="form-control" id="property-price" name="price" value="{{$property->price}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-price-before">Rent price</label>
                                            <input class="form-control" id="property-price-before" name="price_per_month" value="{{$property->price_per_month}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-price-after">Months forward</label>
                                            <input class="form-control" id="property-price-after" name="forward_months" value="{{$property->forward}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>Property location</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row  push-padding-bottom">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input class="form-control" id="address" name="address" value="{{$property->address}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="district">District</label>
                                            <input class="form-control" id="district" name="district" value="{{$property->district}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="town">Town</label>
                                            <input class="form-control" id="town" name="town" value="{{$property->town}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="region">Region</label>
                                            <input class="form-control" id="region" name="region" value="{{$property->region}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="zip">Zip</label>
                                            <input class="form-control" id="zip" name="zip" value="{{$property->zip}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select class="selectpicker" id="country"
                                                    name="country" data-live-search="false" data-live-search-style="begins" title="Select">
                                                <option value="ug" selected="selected">Uganda</option>
                                                <option value="ky">Kenya</option>
                                                <option value="tz">Tanzania</option>
                                                <option value="rw">Rwanda</option>
                                                <option value="br">Burundi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>Additional details</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-id">Property ID</label>
                                            <input class="form-control" id="property-id" name="propertyId" value="{{$property->propertyID}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-area">Area Size</label>
                                            <input class="form-control" id="property-area" name="area_size" value="{{$property->area_size}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-size-prefix">Size Prefix</label>
                                            <input class="form-control" id="property-size-prefix" name="size_prefix" value="{{$property->size_prefix}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-bedrooms">Bedrooms</label>
                                            <input class="form-control" id="property-bedrooms" name="bedrooms" value="{{$property->bedrooms}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-bathrooms">Bathrooms</label>
                                            <input class="form-control" id="property-bathrooms" name="bathrooms" value="{{$property->bathrooms}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-garage">Garage</label>
                                            <input class="form-control" id="property-garage" name="garage" value="{{$property->garage}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-garage-size">Garages Size</label>
                                            <input class="form-control" id="property-garage-size" name="garage_size" value="{{$property->garage_size}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-year-built">Year Built</label>
                                            <div class="input-group input_date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="date" class="form-control" id="property-year-built"
                                                       name="year_built" value="{{$property->year_built}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="last_remodel_year">Last remodel year</label>
                                            <input type="date" class="form-control" id="last_remodel_year" name="last_remodel_year" value="{{$property->last_remodel_year}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>Property Features</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                    @foreach($features as $feature)
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="feature" value="{{$feature->id}}">
                                                    {{$feature->name}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-block text-right">
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Submit Property</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--end section page body-->
@endsection
