<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
    <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>e-NYUMBANI:Admin</title>


  <link rel="apple-touch-icon" sizes="144x144" href="/uploads/logo5.png">
  <link rel="icon" type="image/png" href="/uploads/logo5.png" sizes="32x32">
  <link rel="icon" type="image/png" href="/uploads/logo5.png" sizes="16x16">
  <link rel="manifest" href="/client-inc/images/favicons/manifest.json">
  <link rel="mask-icon" href="/client-inc/images/favicons/safari-pinned-tab.svg" >
  <meta name="theme-color" content="#ffffff">
  <!-- Vendor CSS BUNDLE
      Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
      TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
    <link href="/admin-inc/css/vendor/all.css" rel="stylesheet">


    <link href="/admin-inc/css/vendor/bootstrap.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/font-awesome.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/picto.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/material-design-iconic-font.css" rel="stylesheet">
    <link href="/admin-inc/css/vendor/datepicker3.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/jquery.minicolors.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/bootstrap-slider.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/railscasts.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/jquery-jvectormap.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/owl.carousel.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/slick.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/morris.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/ui.fancytree.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/daterangepicker-bs3.css" rel="stylesheet">
    <link href="/admin-inc/css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet">
     <link href="/admin-inc/css/vendor/select2.css" rel="stylesheet">


    <link href="/admin-inc/css/app/app.css" rel="stylesheet">



    <link href="/admin-inc/css/app/essentials.css" rel="stylesheet" />
    <link href="/admin-inc/css/app/layout.css" rel="stylesheet" />
    <link href="/admin-inc/css/app/sidebar.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/sidebar-skins.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/navbar.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/media.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/player.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/timeline.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/cover.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/chat.css" rel="stylesheet" />
    <link href="/admin-inc/css/app/maps.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/colors-alerts.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/colors-background.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/colors-buttons.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/colors-calendar.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/colors-progress-bars.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/colors-text.css" rel="stylesheet" />
     <link href="/admin-inc/css/app/ui.css" rel="stylesheet" />

     <link href="/admin-inc/font-awesome/css/font-awesome.css" rel="stylesheet" />


<!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
<script src="/js/jquery.js"></script>
<script src="/js/recommend_property.js"></script>
<script src="/js/suspend-agent.js"></script>
<script src="/js/suspend-property.js"></script>
<script src="/js/show-in-banner.js"></script>
<![endif]-->

    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 55px;
            height: 27px;
        }

        /* Hide default HTML checkbox */
        .switch input {display:none;}

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

<body>
<!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

      @include('admin.top_menu')

      @include('admin.sidebar')

      @yield('content')
  </div>

    <!-- Footer -->
        <footer class="footer">
          <strong>Rem Housing</strong> v1.0.0 &copy; Copyright 2017
        </footer>
        <!-- // Footer -->
  </div>

  <!-- Modal -->
    <div class="modal fade image-gallery-item" id="showImageModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-header">
          On my way to the top
        </div>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img class="img-responsive" src="images/place1-full.jpg" alt="Place">
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
    <!-- <script src="js/vendor/core/all.js"></script> -->
    <!-- <script src="js/vendor/core/jquery.js"></script> -->
    <!-- <script src="js/vendor/core/bootstrap.js"></script> -->
    <!-- <script src="js/vendor/core/breakpoints.js"></script> -->
    <!-- <script src="js/vendor/core/jquery.nicescroll.js"></script> -->
    <!-- <script src="js/vendor/core/isotope.pkgd.js"></script> -->
    <!-- <script src="js/vendor/core/packery-mode.pkgd.js"></script> -->
    <!-- <script src="js/vendor/core/jquery.grid-a-licious.js"></script> -->
    <!-- <script src="js/vendor/core/jquery.cookie.js"></script> -->
    <!-- <script src="js/vendor/core/jquery-ui.custom.js"></script> -->
    <!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
    <!-- <script src="js/vendor/core/handlebars.js"></script> -->
    <!-- <script src="js/vendor/core/jquery.hotkeys.js"></script> -->
    <!-- <script src="js/vendor/core/load_image.js"></script> -->
    <!-- <script src="js/vendor/core/jquery.debouncedresize.js"></script> -->
    <!-- <script src="js/vendor/tables/all.js"></script> -->
    <!-- <script src="js/vendor/forms/all.js"></script> -->
    <!-- <script src="js/vendor/media/all.js"></script> -->
    <!-- <script src="js/vendor/player/all.js"></script> -->
    <!-- <script src="js/vendor/charts/all.js"></script> -->
    <!-- <script src="js/vendor/charts/flot/all.js"></script> -->
    <!-- <script src="js/vendor/charts/easy-pie/jquery.easypiechart.js"></script> -->
    <!-- <script src="js/vendor/charts/morris/all.js"></script> -->
    <!-- <script src="js/vendor/charts/sparkline/all.js"></script> -->
    <!-- <script src="js/vendor/maps/vector/all.js"></script> -->
    <!-- <script src="js/vendor/tree/jquery.fancytree-all.js"></script> -->
    <!-- <script src="js/vendor/nestable/jquery.nestable.js"></script> -->
    <!-- <script src="js/vendor/angular/all.js"></script> -->

    <!-- App Scripts Bundle
      Includes Custom Application JavaScript used for the current theme/module;
      Do not use it simultaneously with the standalone modules below. -->

    <script src="/admin-inc/js/app/app.js"></script>

    <!-- App Scripts Standalone Modules
      As a convenience, we provide the entire UI framework broke down in separate modules
      Some of the standalone modules may have not been used with the current theme/module
      but ALL the modules are 100% compatible -->

    <!--<script src="js/app/essentials.js"></script>
    <script src="js/app/layout.js"></script>
    <script src="js/app/sidebar.js"></script>
    <script src="js/app/media.js"></script>
    <script src="js/app/player.js"></script>
    <script src="js/app/timeline.js"></script>
    <script src="js/app/chat.js"></script>
    <script src="js/app/maps.js"></script>
    <script src="js/app/charts/all.js"></script>
    <script src="js/app/charts/flot.js"></script>
    <script src="js/app/charts/easy-pie.js"></script>
    <script src="js/app/charts/morris.js"></script>
    <script src="js/app/charts/sparkline.js"></script>-->

    <script>
      $('div.alert').not('.alert-important').delay(1000).fadeOut(1500);
    </script>
    <script src="/utils/ckeditor/ckeditor.js">
    </script>
    <script>
      CKEDITOR.replace('blog-editor');
    </script>
    <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
    </script>

</body>
</html>
