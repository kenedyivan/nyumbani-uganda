@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Select Package</title>
@endsection
@section('content')
    <!--start section page body-->
    <section id="section-body">
        <div class="container">
            <div class="membership-page-top">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="membership-page-title">
                            <h1 class="page-title"> Select Your Membership Package </h1>
                            <p class="page-subtitle"> Thank you for joining your Membership </p>
                        </div>
                        <ol class="pay-step-bar">
                            <li class="pay-step-block active"><span>1. <span class="hidden-xs">Select</span> Package</span></li>
                            <li class="pay-step-block"><span>2. Listing</span></li>
                            <li class="pay-step-block"><span>3. Payment</span></li>
                            <li class="pay-step-block"><span>4. Done</span></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="membership-content-area">
                <div class="houzez-module package-table-module">
                    <div class="container">
                        <div class="row">
                            @foreach($packages as $package)
                                <div class="col-md-3 col-sm-6">
                                    <div class="package-block">
                                        <h3 class="package-title" style="text-transform:capitalize;">{{$package->title}}</h3>
                                        <h1 class="package-price">
                                            <span class="price-before">Shs</span><span class="price-number">{{$package->price}}</span><span class="price-before"></span>
                                        </h1>
                                        <ul class="package-list">
                                            <li><i class="fa fa-check"></i> Time Period: <strong>{{$package->days}} Days</strong></li>
                                            <li><i class="fa fa-check"></i> Featured Lisitng: <strong>{{$package->featured_listings}}</strong></li>
                                            <li><i class="fa fa-check"></i> Properties: <strong>{{$package->properties}}</strong></li>
                                        </ul>
                                        <div class="package-link">
                                            <form action="{{route('agent.select.package.submit')}}" method="post">
                                                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="package_id" value="{{$package->id}}">
                                                <button class="btn btn-primary btn-lg">Choose</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section page body-->
@endsection
