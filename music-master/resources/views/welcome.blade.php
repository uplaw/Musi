<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Music</title>


    <link rel="icon" href="img/core-img/favicon.ico">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontEnd/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    </div>
    <!-- ##### Header Area Start ##### -->
    <header>
        <!-- End most top info -->

        <nav class="navbar  navbar-expand-lg navbar-light top-navbar" data-toggle="sticky-onscroll">
            <div class="container">
                <a class="mr-5" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                    <ul class="navbar-nav pull-right">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Explor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Beats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Top Charts</a>
                        </li>
                    </ul>

                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav pull-right">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Become a seller</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="{{ asset('frontEnd') }}/img/icon/cart.png"
                                    id="user-icon" alt=""></a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="{{ asset('frontEnd') }}/img/icon/user.png"
                                    id="user-icon" alt=""></a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

    </header>
    <!-- End top header-->

    <div class="container" id="app">


        <!-- ##### Buy Now Area Start ##### -->
        <index-component></index-component>
        <!-- ##### Buy Now Area End ##### -->

    </div>
    <!-- Footer -->
    <section id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h5>Music</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href=""><i class="fa fa-angle-double-right"></i>About us</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Job</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Blog</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Sign In</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Sign Up</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h5>Buying</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Browse Beats</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Top selling Beats</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Recent Beats</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Free Beats</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h5>Selling</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Price</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Why Airbit</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Selling Tools</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Infinity Store</a></li>
                        <li><a href="" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Youtube
                                Monetization</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h5>Follow US</h5>
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href=""><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href=""><i class="fa fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="" target="_blank"><i class="fa fa-envelope"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
