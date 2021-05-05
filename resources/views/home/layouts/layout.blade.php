<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('assets/home/images/favicon.ico')}}" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{asset('assets/home/images/apple-touch-icon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
    <link href="{{asset('assets/home/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/home/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/home/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/home/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/home/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('assets/home/css/colors.css')}}" rel="stylesheet">
    <link href="{{asset('assets/home/css/version/marketing.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div id="wrapper">
    <header class="market-header header">
        <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{route('home.index')}}"><img
                        src="{{asset('assets/home/images/version/market-logo.png')}}" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categories.single',['slug'=>'marketing'])}}">Marketing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categories.single',['slug'=>'make-money'])}}">Make Money</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.blade.php">Contact Us (FIX)</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-item">
                    @if(!Auth::check())
                    <a href="{{route('login.create')}}">Login</a>
                        @else
                    <a href="{{route('admin.index')}}">Admin</a>
                        @endif
                </div>
            </nav>
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->

    @yield('header')

    <section class="section lb @if(!Request::is('/')) m3rem @endif">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                   @yield('content')
                </div><!-- end col -->

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    @include('home.layouts.sidebar')<!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="single.blade.php"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/home/upload/small_04.jpg')}}" alt=""
                                             class="img-fluid float-left">
                                        <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                        <small>12 Jan, 2016</small>
                                    </div>
                                </a>

                                <a href="single.blade.php"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/home/upload/small_05.jpg')}}" alt=""
                                             class="img-fluid float-left">
                                        <h5 class="mb-1">Let's make an introduction for creative life</h5>
                                        <small>11 Jan, 2016</small>
                                    </div>
                                </a>

                                <a href="single.blade.php"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="{{asset('assets/home/upload/small_06.jpg')}}" alt=""
                                             class="img-fluid float-left">
                                        <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                                        <small>07 Jan, 2016</small>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="single.blade.php"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/home/upload/small_01.jpg')}}" alt=""
                                             class="img-fluid float-left">
                                        <h5 class="mb-1">Banana-chip chocolate cake recipe with customs</h5>
                                        <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                    </div>
                                </a>

                                <a href="single.blade.php"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/home/upload/small_02.jpg')}}" alt=""
                                             class="img-fluid float-left">
                                        <h5 class="mb-1">10 practical ways to choose organic vegetables</h5>
                                        <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                    </div>
                                </a>

                                <a href="single.blade.php"
                                   class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="{{asset('assets/home/upload/small_03.jpg')}}" alt=""
                                             class="img-fluid float-left">
                                        <h5 class="mb-1">We are making homemade ravioli, nice and good</h5>
                                        <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular Categories</h2>
                        <div class="link-widget">
                            <ul>
                                <li><a href="#">Marketing <span>(21)</span></a></li>
                                <li><a href="#">SEO Service <span>(15)</span></a></li>
                                <li><a href="#">Digital Agency <span>(31)</span></a></li>
                                <li><a href="#">Make Money <span>(22)</span></a></li>
                                <li><a href="#">Blogging <span>(66)</span></a></li>
                                <li><a href="#">Entertaintment <span>(11)</span></a></li>
                                <li><a href="#">Video Tuts <span>(87)</span></a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div><!-- end row -->


            <div class="dmtop">Scroll to Top</div>

        </div>
    </footer>


    <script src="{{asset('assets/home/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/home/js/tether.min.js')}}"></script>
    <script src="{{asset('assets/home/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/home/js/animate.js')}}"></script>
    <script src="{{asset('assets/home/js/custom.js')}}"></script>


</div>
</body>
</html>
