<!DOCTYPE html>
<html class="login" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="/admin-inc/css/vendor/all.css" rel="stylesheet">

  <!-- Vendor CSS Standalone Libraries
        NOTE: Some of these may have been customized (for example, Bootstrap).
        See: src/less/themes/{theme_name}/vendor/ directory -->
  <!-- <link href="/admin-inc/css/vendor/bootstrap.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/font-awesome.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/picto.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/material-design-iconic-font.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/datepicker3.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/jquery.minicolors.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/bootstrap-slider.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/railscasts.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/jquery-jvectormap.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/owl.carousel.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/slick.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/morris.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/ui.fancytree.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/daterangepicker-bs3.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet"> -->
  <!-- <link href="/admin-inc/css/vendor/select2.css" rel="stylesheet"> -->

  <!-- APP CSS BUNDLE [/admin-inc/css/app/app.css]
INCLUDES:
    - The APP CSS CORE styling required by the "admin" module, also available with main.css - see below;
    - The APP CSS STANDALONE modules required by the "admin" module;
NOTE:
    - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
      It was optimised to load only what is actually used by the "admin" module;
      Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
      See src/less/themes/admin-inc/app.less
TIP:
    - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
  <link href="/admin-inc/css/app/app.css" rel="stylesheet">

  <!-- App CSS CORE
This variant is to be used when loading the separate styling modules -->
  <!-- <link href="/admin-inc/css/app/main.css" rel="stylesheet"> -->

  <!-- App CSS Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL modules are 100% compatible -->

  <!-- <link href="/admin-inc/css/app/essentials.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/layout.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/sidebar.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/sidebar-skins.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/navbar.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/media.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/player.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/timeline.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/cover.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/chat.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/charts.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/maps.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/colors-alerts.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/colors-background.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/colors-buttons.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/colors-calendar.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/colors-progress-bars.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/colors-text.css" rel="stylesheet" /> -->
  <!-- <link href="/admin-inc/css/app/ui.css" rel="stylesheet" /> -->

  <link href="/admin-inc/font-awesome/css/font-awesome.css" rel="stylesheet" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

  <div class="container-fluid">

    <div class="brand-logo">
      <img src="/uploads/logo6.png" alt="logo" />
    </div>
    <div class="row">

      <h1>Admin Access</h1>

      <div class="col-sm-4 col-sm-offset-4">
        <div class="panel panel-default">
          <div class="panel-body">

            <form role="form" action="{{route('admin.login')}}" method="post">
			        {{ csrf_field() }}
              @if($errors)
                @foreach ($errors->all() as $message)
                  <div class="alert alert-danger alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> {{ $message }}
                  </div>
                @endforeach
              @endif
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-shield"></i></span>
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                </div>
              </div>
              <div class="text-center">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-success">Login  <i class="fa fa-fw fa-unlock-alt"></i></button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>

  </div>

  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "admin",
      skins: {
        "default": {
          "primary-color": "#3498db"
        }
      }
    };
  </script>

  <!-- Vendor Scripts Bundle
    Includes all of the 3rd party JavaScript libraries above.
    The bundle was generated using modern frontend development tools that are provided with the package
    To learn more about the development process, please refer to the documentation.
    Do not use it simultaneously with the separate bundles above. -->
  <script src="/admin-inc/js/vendor/all.js"></script>

  <!-- Vendor Scripts Standalone Libraries -->
  <!-- <script src="/admin-inc/js/vendor/core/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/jquery.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/bootstrap.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/breakpoints.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/jquery.nicescroll.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/isotope.pkgd.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/packery-mode.pkgd.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/jquery.grid-a-licious.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/jquery.cookie.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/jquery-ui.custom.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/handlebars.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/load_image.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/core/jquery.debouncedresize.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/tables/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/forms/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/media/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/player/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/charts/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/charts/flot/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/charts/easy-pie/jquery.easypiechart.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/charts/morris/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/charts/sparkline/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/maps/vector/all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/tree/jquery.fancytree-all.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/nestable/jquery.nestable.js"></script> -->
  <!-- <script src="/admin-inc/js/vendor/angular/all.js"></script> -->

  <!-- App Scripts Bundle
    Includes Custom Application JavaScript used for the current theme/module;
    Do not use it simultaneously with the standalone modules below. -->
  <script src="/admin-inc/js/app/app.js"></script>
  <script type="text/javascript">
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
  </script>

  <!-- App Scripts Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL the modules are 100% compatible -->

  <!-- <script src="/admin-inc/js/app/essentials.js"></script> -->
  <!-- <script src="/admin-inc/js/app/layout.js"></script> -->
  <!-- <script src="/admin-inc/js/app/sidebar.js"></script> -->
  <!-- <script src="/admin-inc/js/app/media.js"></script> -->
  <!-- <script src="/admin-inc/js/app/player.js"></script> -->
  <!-- <script src="/admin-inc/js/app/timeline.js"></script> -->
  <!-- <script src="/admin-inc/js/app/chat.js"></script> -->
  <!-- <script src="/admin-inc/js/app/maps.js"></script> -->
  <!-- <script src="/admin-inc/js/app/charts/all.js"></script> -->
  <!-- <script src="/admin-inc/js/app/charts/flot.js"></script> -->
  <!-- <script src="/admin-inc/js/app/charts/easy-pie.js"></script> -->
  <!-- <script src="/admin-inc/js/app/charts/morris.js"></script> -->
  <!-- <script src="/admin-inc/js/app/charts/sparkline.js"></script> -->

</body>

</html>
