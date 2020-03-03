<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travel Agency </title>
    <link rel="canonical" href="/site-assets/index-2.html"/>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tour And Travelling">
    <meta name="keywords" content="Tour,Travelling,Hotel">


    <link href="/site-assets/css/bootstrap.css" rel="stylesheet">
    <link href="/site-assets/css/font-awesome.css" rel="stylesheet">
    <link href="/site-assets/css/animate.css" rel="stylesheet">
    <link href="/site-assets/css/select2.css" rel="stylesheet">
    <link href="/site-assets/css/smoothness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
    <link href="/site-assets/css/style.css" rel="stylesheet">
    <link href="/site-assets/css/custom.css" rel="stylesheet">
    <link href="/site-assets/swiper/css/swiper.css" rel="stylesheet">

    <script src="/site-assets/js/jquery.js"></script>
    <script src="/site-assets/js/jquery-ui.js"></script>
    <script src="/site-assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/site-assets/js/jquery.easing.1.3.js"></script>
    <script src="/site-assets/js/superfish.js"></script>

    <script src="/site-assets/js/select2.js"></script>

    <script src="/site-assets/js/jquery.parallax-1.1.3.resize.js"></script>

    <script src="/site-assets/js/SmoothScroll.js"></script>

    <script src="/site-assets/js/jquery.appear.js"></script>

    <script src="/site-assets/js/jquery.caroufredsel.js"></script>
    <script src="/site-assets/js/jquery.touchSwipe.min.js"></script>

    <script src="/site-assets/js/jquery.ui.totop.js"></script>

    <script src="/site-assets/js/script.js"></script>
    <link rel="stylesheet" href="/site-assets/css/sweetalert.css">

    <!-- App styles -->

    <script src="/site-assets/js/sweetalert.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/site-assets/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="/site-assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="front">
@if(\Illuminate\Support\Facades\Session::has('success'))
    <script type="text/javascript">
        swal({
            title: 'Success',
            text: "{{\Illuminate\Support\Facades\Session::get('success')}}",
            type: 'success',
            showConfirmButton: true,
            timer: 5000
        });
    </script>
@endif
@if(\Illuminate\Support\Facades\Session::has('warning'))
    <script type="text/javascript">
        swal({
            title: 'Warning',
            text: "{{\Illuminate\Support\Facades\Session::get('warning')}}",
            type: 'warning',
            showConfirmButton: true,
            timer: 5000
        });
    </script>
@endif

<div id="main">
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="top2_wrapper">
            <div class="container">
                <div class="top2 clearfix">
                    <header>
                        <div class="logo_wrapper">
                            <a href="/" class="logo">
                                <img src="/site-assets/images/logo.svg" alt="" class="img-responsive">
                            </a>
                        </div>
                    </header>
                    <div class="navbar navbar_ navbar-default">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                      @php
    $panel_address = '';

        if (\Illuminate\Support\Facades\Auth::check()) {
            if (\Illuminate\Support\Facades\Auth::user()->role==\App\User::ADMIN) {
                $panel_address = '/admin';
            } else {
                $panel_address = '/user';
            }
        }

@endphp
                        <div class="navbar-collapse navbar-collapse_ collapse">
                            <ul class="nav navbar-nav sf-menu clearfix">

                                <li><a href="{{$panel_address}}">Panel</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    <div class="bot2_wrapper">
        <div class="container">
            <div class="left_side">
                Copyright © 2017 <a href="#" target="_blank"><strong>DigiAlpha</strong></a> <span>|</span> <a href="#">Privacy
                    Policy</a> <span>|</span> <a href="#">About Us</a> <span>|</span> <a href="#">FAQ</a> <span>|</span>
                <a href="#">Contact Support</a>
            </div>
            <div class="right_side">Designed by <a href="#" target="_blank"><strong>DigiAlpha</strong></a></div>
        </div>
    </div>


</div>
<script src="/site-assets/js/bootstrap.min.js"></script>
<script src="/site-assets/swiper/js/swiper.js"></script>

@yield('scripts')
</body>

</html>