<!DOCTYPE html>
<html lang="en">
<head>

@yield('title')
<!--Meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="e-NYUMBANI, Get your baest house offer, trusted blockers, cheap houses, great accomodation!">
    <meta name="description" content="e-NYUMBANI, Get your baest house offer! The sest housing platform in EastAfrica">
    <meta name="author" content="Favethemes">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="144x144" href="/uploads/logo5.png">
    <link rel="icon" type="image/png" href="/uploads/logo5.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/uploads/logo5.png" sizes="16x16">
    <link rel="manifest" href="/client-inc/images/favicons/manifest.json">
    <link rel="mask-icon" href="/client-inc/images/favicons/safari-pinned-tab.svg">
    <meta name="theme-color" content="#ffffff">

    <link href="/client-inc/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/client-inc/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
    <link href="/client-inc/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/client-inc/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="/client-inc/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="/client-inc/css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="/css/animate.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/lightbox_dhakar/css/lightbox.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" rel="stylesheet"
          type="text/css">

    <script>

        agent = {{Auth::guard('agent')->id()}};
    </script>

</head>
<body>
<?php
$property_type = App\PropertyType::all();

$url = URL::full();
?>
<!--start header section header v1-->
<header id="header-section" class="header-section-4 header-main  nav-left hidden-sm hidden-xs" data-sticky="1">
    <div class="container">
        <div class="header-left">
            <div class="logo">
                <a href="/">
                    {{--<img src="/client-inc/images/houzez-logo-color.png" alt="logo">--}}
                    <img src="/uploads/logo6.png" alt="logo" width="200" height="200">
                </a>
            </div>
            <nav class="navi main-nav">
                <ul>

                    <li>
                        <a href="{{route('listings.all')}}">Properties</a></a>
                        <ul class="sub-menu">
                            <li><a href="{{route('listings.all')}}">All</a></li>
                            @foreach($property_type as $type)
                                @if($type->properties->count()>0)
                                    <li>
                                        <a href="/property-category/{{$type->id}}">{{$type->name}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('agents.all')}}">Agents</a>
                    </li>

                    <li>
                        <a href="{{route('user.blog.posts')}}">Community Discussion</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <div class="user">
                @if(Auth::guard('agent')->user())
                    <a href="{{route('agent.profile')}}">My account</a>
                    <a href="#"
                       onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('agent.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}</form>
                @elseif(Auth::guard('admin')->user())
                    <a href="{{route('admin.dashboard')}}">Admin</a>
                    <a href="#"
                       onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}</form>
                @else
                    <a href="{{route('agent.login.form')}}">Sign In</a>
                    <a href="{{route('agent.register.form')}}">Register</a>
                    &nbsp;
                    &nbsp;@endif
                <a href="{{route('agent.select.package')}}" class="btn btn-default">Create Listing</a>
            </div>
        </div>
    </div>
</header>

<div class="header-mobile visible-sm visible-xs" style="background:white;">
    <div class="container">
        <!--start mobile nav-->
        <div class="mobile-nav">
            <span class="nav-trigger"><i class="fa fa-navicon" style="color:#00AEEF"></i></span>
            <div class="nav-dropdown main-nav-dropdown"></div>
        </div>
        <!--end mobile nav-->
        <div class="header-logo">
            <a href="/"><img src="/uploads/logo6.png" alt="logo" style="object-fit: cover;" width="100"
                             height="350"></a>
        </div>
        <div class="header-user">
            <ul class="account-action">
                <li>
                    <span class="user-icon"><i class="fa fa-user" style="color:#00AEEF"></i></span>
                    <div class="account-dropdown">
                        <ul>
                            @if(Auth::guard('agent')->user())
                                <li><a href="{{route('agent.profile')}}">My account</a></li>
                                <li><a href="#"
                                       onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('agent.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}</form>
                            @elseif(Auth::guard('admin')->user())
                                <li><a href="{{route('admin.dashboard')}}">Admin</a></li>
                                <li><a href="#"
                                       onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}</form>
                            @else
                                <li><a href="{{route('agent.login.form')}}"><i class="fa fa-user"></i> Sign In</a></li>
                                <li><a href="{{route('agent.register.form')}}"><i class="fa fa-user"></i> Register</a>
                                </li>
                                <li><a href="{{route('agent.create.listing')}}" class="btn btn-default"><i
                                                class="fa fa-plus-circle"></i> Create Listing</a></li>
                            @endif

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--end header section header v1-->
@include('users.search')

@include('flash::message')

@yield('content')


<!--start footer section-->

@include('users.site_footer')

<!--end footer section-->


<script type="text/javascript" src="/client-inc/js/jquery.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script>
<script type="text/javascript" src="/client-inc/js/modernizr.custom.js"></script>
<script type="text/javascript" src="/client-inc/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/client-inc/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/client-inc/js/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="/client-inc/js/bootstrap-select.js"></script>
<script type="text/javascript" src="/client-inc/js/jquery-ui.js"></script>
<script type="text/javascript" src="/client-inc/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="/client-inc/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/client-inc/js/vegas.min.js"></script>
<script type="text/javascript" src="/client-inc/js/infobox.js"></script>
<script type="text/javascript" src="/client-inc/js/markerclusterer.js"></script>
<script type="text/javascript" src="/client-inc/js/custom.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/add-new-property.js"></script>
<script type="text/javascript" src="/js/add-to-favorites.js"></script>
<script type="text/javascript" src="/js/select-multiple-images.js"></script>
<script src="/lightbox_dhakar/js/lightbox-plus-jquery.js"></script>
{{--<script language="javascript" type="text/javascript" src="/client-inc/js/vpb_script.js"></script>--}}
<script language="javascript" type="text/javascript" src="/client-inc/js/expanding.js"></script>
<script language="javascript" type="text/javascript" src="/client-inc/js/starrr.js"></script>
<script src="/js/dropzone.js"></script>

<script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(1500);
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    //Dropzone.options.myAwesomeDropzone = false;
    Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        url:'/multi-upld',
        paramName: 'photo',
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 5,
        maxFiles: 5,

        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;

            // First change the button to actually tell Dropzone to process the queue.
            document.querySelector("#add-property").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function() {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
                console.log('form being processed');
            });

            this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
                //console.log('Files have been sent successfully');
                //console.log(response);
                var formData = new FormData(document.getElementById("add-property-form"));
                //console.log(formData.get('firstname'));

                $.ajax({
                    type: 'POST',
                    headers: {"cache-control": "no-cache"},
                    url: "/agent/add-new-property",
                    async: true,
                    cache: false,
                    dataType: "json",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (jsonData, textStatus, jqXHR) {

                      //console.log("Success: "+jsonData["success"]);
                      //console.log("Data: "+jsonData["data"]);

                      if(jsonData["success"]){
                          window.location="/agent/add-payment";
                      }else{
                          console.log("Redirection failure");
                      }


                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });

                //window.location="results.php";
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
        }

    }
</script>

</body>
</html>
