<!DOCTYPE html>
<!--
    Author      : Muhammad Ramadhan
    Date        : 18/05/2018
    Description : Base template DTC
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin DTC</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('assets/images/konsuldok-01.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('assets/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('assets/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('assets/css/themes/all-themes.css')}}" rel="stylesheet" />
</head>

<body class="theme-red">
<!-- Page Loader -->
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="/">Admin Konsuldok</a>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset('assets/images/user.png')}}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Session::get('nama')}}</div>

                <!-- <div class="btn-group user-helper-dropdown">
                     <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                      <ul class="dropdown-menu pull-right">
                         <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                         <li role="seperator" class="divider"></li>
                         <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                         <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                         <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                         <li role="seperator" class="divider"></li>
                         <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                     </ul>
                </div> -->
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                @php if(Session::get('roles') == 1)
                {
                @endphp
                <li>
                    <a href="/">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="/admin">
                        <i class="material-icons">account_box</i>
                        <span>Admin</span>
                    </a>
                </li>
                <li>
                    <a href="/catering">
                        <i class="material-icons">assignment</i>
                        <span>Catering</span>
                    </a>
                </li>
                <li>
                    <a href="/subcatering">
                        <i class="material-icons">assignment</i>
                        <span>SubCatering</span>
                    </a>
                </li>
                <li>
                    <a href="/slide">
                        <i class="material-icons">subscriptions</i>
                        <span>Slide</span>
                    </a>
                </li>
                <li>
                    <a href="/berita">
                        <i class="material-icons">assignment</i>
                        <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a href="/informasi">
                        <i class="material-icons">info</i>
                        <span>Informasi</span>
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="material-icons">lock_open</i>
                        <span>Log Out</span>
                    </a>
                </li>
                @php
                    } else if(Session::get('roles') == 2)
                    {
                @endphp
                <li>
                    <a href="/">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="/catering">
                        <i class="material-icons">assignment</i>
                        <span>Catering</span>
                    </a>
                </li>
                <li>
                    <a href="/subcatering">
                        <i class="material-icons">assignment</i>
                        <span>SubCatering</span>
                    </a>
                </li>
                <li>
                    <a href="/slide">
                        <i class="material-icons">subscriptions</i>
                        <span>Slide</span>
                    </a>
                </li>
                <li>
                    <a href="/berita">
                        <i class="material-icons">assignment</i>
                        <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a href="/informasi">
                        <i class="material-icons">info</i>
                        <span>Informasi</span>
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="material-icons">lock_open</i>
                        <span>Log Out</span>
                    </a>
                </li>
                @php
                    }
                @endphp
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 <p>Dwi Tunggal Putra</p>.
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>

@yield('content')

<!-- Jquery Core Js -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('assets/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('assets/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{asset('assets/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
<script src="{{asset('assets/plugins/flot-charts/jquery.flot.time.js')}}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('assets/js/admin.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('assets/js/demo.js')}}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    window.onload = function() {
        CKEDITOR.replace( 'summary-ckeditor', {
            filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}'
        });
    };
</script>


</body>

</html>