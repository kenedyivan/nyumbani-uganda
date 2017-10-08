@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Create New listing</title>
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
                        <ol class="pay-step-bar">
                          <li class="pay-step-block"><span>1. Select Package</span></li>
                          <li class="pay-step-block active"><span>2. <span class="hidden-xs">Listing</span></span></li>
                          <li class="pay-step-block"><span>3. Payment</span></li>
                          <li class="pay-step-block"><span>4. Done</span></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="membership-content-area">
                <div class="membership-content-area">
                    <form action="{{route('agent.create.listing.submit')}}" method="post"
                          enctype="multipart/form-data" id="add-property-form">
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
                                                <input class="form-control" id="property-title"
                                                       name="title" placeholder="Enter your property title" value="acacia resort" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" rows="6"
                                                          name="description" placeholder="Enter your property description" required>Just some description</textarea>
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
                                                        data-live-search-style="begins" title="Select" name="type" required>
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
                                                        data-live-search="false" data-live-search-style="begins"
                                                        title="Select" name="sale_type" required>
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
                                                <input class="form-control" id="property-price" name="price"
                                                       placeholder="Enter your property price" required
                                                       value="110000000">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-price-before">Currency</label>
                                                <select class="selectpicker" id="currency"
                                                        name="currency" data-live-search="false"
                                                        data-live-search-style="begins" title="Select" required>
                                                    <option value="ugx" selected="selected">UGX</option>
                                                    <option value="usd">USD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-block">
                            <div class="add-title-tab">
                                <h3>Property media</h3>
                                <div class="add-expand"></div>
                            </div>
                            <div class="add-tab-content">
                                <div class="add-tab-row">
                                    <div class="property-media">
                                        <div class="media-gallery">
                                            <div id="my-awesome-dropzone" class="dropzone"></div>
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
                                                <input class="form-control" id="address" name="address"
                                                       placeholder="Enter address" required
                                                       value="acacia avenue">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <input class="form-control" id="district" name="district"
                                                       placeholder="Enter district" required
                                                       value="kampala">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="town">Town</label>
                                                <input class="form-control" id="town" name="town"
                                                       placeholder="Enter town" required
                                                       value="kampala">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="region">Region</label>
                                                <input class="form-control" id="region"
                                                       name="region" placeholder="Enter region" required
                                                       value="central">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select class="selectpicker" id="country"
                                                        name="country" data-live-search="false"
                                                        data-live-search-style="begins"
                                                        title="Select" required>
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
                                                <label for="property-area">Area Size</label>
                                                <input class="form-control" id="property-area" name="area_size"
                                                       placeholder="Enter property area size" required
                                                       value="500">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-area">Latitude</label>
                                                <input class="form-control" id="latitude" name="latitude"
                                                       placeholder="Enter Google Map Latitude" required
                                                       value="0.3254367">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-area">Longitude</label>
                                                <input class="form-control" id="longitude" name="longitude"
                                                       placeholder="Enter Google Map Longitude" required
                                                       value="32.638478">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-size-prefix">Size Prefix</label>
                                                <input class="form-control" id="property-size-prefix" name="size_prefix"
                                                       placeholder="Sq Ft" value="sq ft" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-bedrooms">Bedrooms</label>
                                                <input class="form-control" id="property-bedrooms" name="bedrooms"
                                                       placeholder="Enter number of bedrooms" required
                                                       value="3">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-bathrooms">Bathrooms</label>
                                                <input class="form-control" id="property-bathrooms"
                                                       name="bathrooms" placeholder="Enter number of bathrooms" required
                                                       value="2">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-garage">Garage</label>
                                                <input class="form-control" id="property-garage"
                                                       name="garage"
                                                       placeholder="Enter number of garages" required
                                                       value="1">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="property-year-built">Year Built</label>
                                                <div class="input-group input_date">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                    <input type="date" class="form-control" id="property-year-built"
                                                           name="year_built"
                                                           required
                                                           value="09/09/2015">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="last_remodel_year">Last remodel year</label>
                                                <input type="date" class="form-control" id="last_remodel_year" name="last_remodel_year"
                                                       placeholder="Enter last remodel year"
                                                       required
                                                       value="09/09/2017">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-block text-right">
                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" id="add-property" class="btn btn-primary">Submit Property</button>
                        </div>
                    </form>
            </div>
        </div>
    </section>
    <!--end section page body-->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script>

        window.onload = function(){

            //Check File API support
            if(window.File && window.FileList && window.FileReader)
            {
                var filesInput = document.getElementById("files");

                var all = [];

                var file_data = [];

                filesInput.addEventListener("change", function(event){

                  console.log("Files: "+all.length);

                    if(all.length == 6){
                      alert('max number reached');
                      document.getElementById('files').
                      return;
                    }

                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result");

                    for(var i = 0; i< files.length; i++)
                    {
                        var file = files[i];

                        all.push(file);

                        var f = all[i];

                        //Only pics
                        if(!file.type.match('image'))
                            continue;

                        var picReader = new FileReader();

                        picReader.addEventListener("load",function(event){

                            var picFile = event.target;

                            var div = document.createElement("div");
                            div.className = "col-sm-2";
                            div.innerHTML = "<figure class='gallery-thumb'>"+
                            "<img src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>"+
                            "</figure>";

                            file_data.push(picFile.result);

                            $("#arr").val(JSON.stringify(file_data));

                            console.log(file_data);

                            output.insertBefore(div,null);

                        });

                        //Read the image
                        picReader.readAsDataURL(file);
                    }

                    console.log("Number of files: "+all.length);

                    //console.log("All your files: "+files.length);



                });




            }
            else
            {
                console.log("Your browser does not support File API");
            }
        }

    </script>
@endsection
