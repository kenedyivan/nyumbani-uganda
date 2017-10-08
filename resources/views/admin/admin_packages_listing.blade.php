@extends('...layouts.admin')

@section('content')

    <?php $menu = "packages"; $sub = "property-packages";  ?>
    <!-- this is the wrapper for the content -->
    <div class="st-content" id="content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

            <div class="container-fluid">

                @include('flash::message')

                <div class="page-section" style="padding-top:10px;">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                            <h4 class="page-section-heading">Packages</h4>
                            <div class="table-responsive">

                              <!-- Pricing table -->
                              <table class="table panel panel-default table-pricing table-pricing-2">

                                <!-- Table heading -->
                                <thead>
                                  <tr>
                                    @foreach($packages as $package)
                                      <th class="text-center"
                                      style="text-transform:capitalize;">
                                      {{$package->title}}</th>
                                    @endforeach
                                  </tr>
                                </thead>
                                <!-- // Table heading END -->

                                <!-- Table body -->
                                <tbody>

                                  <!-- Table pricing row -->
                                  <tr class="pricing">
                                    @foreach($packages as $package)
                                      <td class="text-center">
                                        <span class="price">Shs{{$package->price}}</span>
                                        <span>per month</span>
                                      </td>
                                    @endforeach

                                  </tr>
                                  <!-- // Table pricing row END -->

                                  <!-- Table row -->
                                  <tr>
                                    @foreach($packages as $package)
                                    <td class="text-center">
                                      <p>
                                        @if($package->featured_listings > 999)
                                              Unlimited listings
                                        @else
                                              {{$package->featured_listings}} Listing(s)
                                        @endif

                                        <br/> @if($package->slider == 1)
                                                One listing on the slider
                                              @endif
                                        <br/> @if($package->feature == 1)
                                                Appear under featured
                                              @endif
                                        <br/> @if($package->recommended == 1)
                                                Property recommended
                                              @endif
                                        <br/> @if($package->slider == 1)
                                                Best of value property
                                              @endif
                                        <br/>@if($package->slider == 1)
                                                Feature as partner
                                              @endif
                                      </p>
                                      <a href="{{route('admin.packages.edit',['id'=>$package->id])}}"
                                      class="btn btn-primary">
                                      Edit</a>
                                    </td>
                                    @endforeach
                                  </tr>
                                  <!-- // Table row END -->

                                </tbody>
                                <!-- // Table body END -->

                              </table>
                              <!-- // Pricing table END -->

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /st-content-inner -->

    </div>
    <!-- /st-content -->

@endsection
