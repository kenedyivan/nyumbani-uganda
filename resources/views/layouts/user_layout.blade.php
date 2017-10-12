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

    <style>
        #overlay {
          background-color: black;
          position: fixed;
          top: 0; right: 0; bottom: 0; left: 0;
          opacity: 0.2; /* also -moz-opacity, etc. */
          z-index: 9999;
        }
        
        .loader {
  margin: 100px auto;
  font-size: 25px;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  position: relative;
  text-indent: -9999em;
  -webkit-animation: load5 1.1s infinite ease;
  animation: load5 1.1s infinite ease;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
}
@-webkit-keyframes load5 {
  0%,
  100% {
    box-shadow: 0em -2.6em 0em 0em #ffffff, 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.5), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7);
  }
  12.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.7), 1.8em -1.8em 0 0em #ffffff, 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5);
  }
  25% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.5), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7), 2.5em 0em 0 0em #ffffff, 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  37.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5), 2.5em 0em 0 0em rgba(255, 255, 255, 0.7), 1.75em 1.75em 0 0em #ffffff, 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  50% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.5), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.7), 0em 2.5em 0 0em #ffffff, -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  62.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.5), 0em 2.5em 0 0em rgba(255, 255, 255, 0.7), -1.8em 1.8em 0 0em #ffffff, -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  75% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.5), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.7), -2.6em 0em 0 0em #ffffff, -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  87.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.5), -2.6em 0em 0 0em rgba(255, 255, 255, 0.7), -1.8em -1.8em 0 0em #ffffff;
  }
}
@keyframes load5 {
  0%,
  100% {
    box-shadow: 0em -2.6em 0em 0em #ffffff, 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.5), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7);
  }
  12.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.7), 1.8em -1.8em 0 0em #ffffff, 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5);
  }
  25% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.5), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7), 2.5em 0em 0 0em #ffffff, 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  37.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5), 2.5em 0em 0 0em rgba(255, 255, 255, 0.7), 1.75em 1.75em 0 0em #ffffff, 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  50% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.5), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.7), 0em 2.5em 0 0em #ffffff, -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  62.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.5), 0em 2.5em 0 0em rgba(255, 255, 255, 0.7), -1.8em 1.8em 0 0em #ffffff, -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  75% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.5), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.7), -2.6em 0em 0 0em #ffffff, -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
  }
  87.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.5), -2.6em 0em 0 0em rgba(255, 255, 255, 0.7), -1.8em -1.8em 0 0em #ffffff;
  }
}

    </style>
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
<script type="text/javascript" src="/js/delete-property-image.js"></script>
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
    
    function processAddProperty(){
        var formData = new FormData(document.getElementById("add-property-form"));
        //console.log(formData.get('firstname'));
        $("body").append('<div id="overlay" style="padding-top:300px"><div class="loader">Loading...</div></div>');

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
                  $("#overlay").remove();
                  window.location="/agent/add-payment";
              }else{
                  console.log("Redirection failure");
              }


            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }
    
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
            var wrapperThis = this;

            // First change the button to actually tell Dropzone to process the queue.
            document.querySelector("#add-property").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                
                if(myDropzone.getQueuedFiles().length > 0){
                    console.log('uploading form + dropzone');
                    myDropzone.processQueue();
                }else{
                    alert('Add at least one image');
                }
            });

            this.on("addedfile", function (file) {

                    // Create the remove button
                    var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove File</button>");

                    // Listen to the click event
                    removeButton.addEventListener("click", function (e) {
                        // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                        // Remove the file preview.
                        wrapperThis.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
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
                
                processAddProperty();

                //window.location="results.php";
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
        }

    }
</script>

<script>
    
    function processEditForm(){
        var formData = new FormData(document.getElementById("edit-property-form"));
                //console.log(formData.get('firstname'));
                
                $("body").append('<div id="overlay" style="padding-top:300px"><div class="loader">Loading...</div></div>');

                $.ajax({
                    type: 'POST',
                    headers: {"cache-control": "no-cache"},
                    url: "/agent/edit-property",
                    async: true,
                    cache: false,
                    dataType: "json",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (jsonData, textStatus, jqXHR) {

                        console.log("Success: "+jsonData["success"]);
                        console.log("Data: "+jsonData["data"]);

                        if(jsonData["success"]){
                            $("#overlay").remove();
                            location.reload();
                            window.scrollTo(0, 0);
                        }else{
                            console.log("Redirection failure");
                        }


                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
    }
    
    //Dropzone.options.myAwesomeDropzone = false;
    Dropzone.options.editDropzone = { // The camelized version of the ID of the form element

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
            var wrapperThis = this;

            // First change the button to actually tell Dropzone to process the queue.
            document.querySelector("#edit-property").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                //myDropzone.processQueue();
                /*if (myDropzone.getQueuedFiles().length > 0) {                        
                    myDropzone.processQueue();  
                } else {                       
                    myDropzone.uploadFiles([]); //send empty 
                }*/
                
                console.log('save button clicked'+myDropzone.getQueuedFiles().length);
                
                if(myDropzone.getQueuedFiles().length > 0){
                    console.log('uploading form + dropzone');
                    myDropzone.processQueue();
                }else{
                    console.log('uploading only form');
                    processEditForm();
                }
                
                /*if (myDropzone.getQueuedFiles().length > 0) {                        
                    myDropzone.processQueue();
                    console.log(myDropzone.getQueuedFiles().length);
                    console.log("howdy");
                } else {                       
                    //myDropzone.uploadFiles([{filename:'nofiles'}]); //send empty 
                }*/  
            });

            this.on("addedfile", function (file) {

                // Create the remove button
                var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove File</button>");

                // Listen to the click event
                removeButton.addEventListener("click", function (e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove the file preview.
                    wrapperThis.removeFile(file);
                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                });

                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
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
                
                processEditForm();

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
