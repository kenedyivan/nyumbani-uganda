@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Payment</title>
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
                            <li class="pay-step-block"><a href="add-new-property.html">1. Listing</a></li>
                            <li class="pay-step-block"><a href="listing-select-package.html">2. <span class="hidden-xs">Select</span> Package</a></li>
                            <li class="pay-step-block active"><span>3. Payment</span></li>
                            <li class="pay-step-block"><span>4. Done</span></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="membership-content-area">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 container-contentbar">
                        <div class="membership-content">
                            <form action="{{route('agent.payment.submit')}}" method="post">
                                <div class="info-title">
                                    <h2 class="info-title-left"> Account Information </h2>
                                </div>
                                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-success btn-submit"> Complete Listing Upload </button>
                                <span class="help-block">By clicking "Complete Listing upload" you agree to our
                                  <a href="{{route('user.termsofUse')}}">Terms of use.</a></span>
                            </form>
                        </div>
                    </div>
                    <?php
                    $package_details = App\Package::find($package);
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-md-offset-0 col-sm-offset-3 container-sidebar">
                        <aside id="sidebar">
                            <div class="payment-side-block">
                                <h3 class="side-block-title"> Membership Package </h3>
                                <ul class="pkg-total-list">
                                    <li class="total-list-head">
                                        <span class="pull-left">{{$package_details->title}}</span>
                                    </li>
                                    <li>
                                        <span class="pull-left">Package Time:</span>
                                        <span class="pull-right"><strong>{{$package_details->days}} Days</strong></span>
                                    </li>
                                    <li>
                                        <span class="pull-left">Listing Included:</span>
                                        <span class="pull-right"><strong>{{$package_details->properties}}</strong></span>
                                    </li>
                                    <li>
                                        <span class="pull-left">Featured Listing Included:</span>
                                        <span class="pull-right"><strong>{{$package_details->featured_listings}}</strong></span>
                                    </li>
                                    <li>
                                        <span class="pull-left">Total Price:</span>
                                        <span class="pull-right">UGX {{$package_details->price}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="payment-side-block">
                                <h3 class="side-block-title"> Need help? </h3>
                                <a href="{{route('user.contact')}}" class="btn btn-primary btn-block">Contact us</a>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section page body-->
@endsection
