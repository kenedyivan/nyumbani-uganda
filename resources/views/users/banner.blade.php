<!--start banner module-->
<div class="header-media">
    <div id="banner-module" class="houzez-module banner-module">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 no-padding">
                    <div id="banner-slider" class="owl-carousel owl-theme banner-slider slide-animated">
                        @foreach($banner_images as $banner_image)
                            <div class="item fave-screen-fix" style="background-image: url(/images/banner/banner_1423x603/{{$banner_image->image}})">
                                <div class="caption">
                                    <a href="#" class="btn btn-primary btn-detail">Details <i class="fa fa-angle-right"></i></a>
                                    <div class="item-body">
                                        <div class="body-left">
                                            <div class="price">
                                                <h3>Shs 25000000</h3><p class="rant">Shs 12000000/mo</p>
                                            </div>
                                            <div class="info-row">
                                                <h2 class="property-title"><a href="#">Kisomole</a></h2>
                                                <h4 class="property-location">Mia, lativa</h4>
                                            </div>
                                            <div class="info-row amenities">
                                                <p><span>Beds: 3</span><span>Baths: 3</span><span>Sq Ft: 23425</span></p>
                                                <p>adfasfasdf</p>
                                            </div>
                                            <div class="info-row date">
                                                <p><i class="fa fa-user"></i> <a href="#"> adafs asdfsad</a></p>

                                                <p><i class="fa fa-calendar"></i> May 05 2017</p>
                                            </div>
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
<!--end banner module-->