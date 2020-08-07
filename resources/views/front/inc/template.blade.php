<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('uploads/config').'/'.$config->favicon}}" type="image/x-icon"/>
    <title>{{$config->title}}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/bootstrap.min.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('front')}}/css/style.css"/>
</head>
<body>

<!-- Header -->
<header id="header">
    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset('uploads/config').'/'.$config->logo}}" alt="{{$config->title}}">
                    </a>
                </div>
                <!-- /logo -->

                <!-- nav -->
                <ul class="nav-menu nav navbar-nav">
                    <li><a href="category.html">Yeniler</a></li>
                    <li><a href="category.html">Popüler</a></li>
                    @foreach($top_categories as $category)
                        <li class="cat-{{$category->color}}"><a
                                href="{{route('category',$category->slug)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
                <!-- /nav -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <!-- nav -->
            <div class="section-row">
                <ul class="nav-aside-menu">
                    @foreach($pages as $page)
                        <li><a href="{{route('page',$page->slug)}}">{{$page->title}}</a></li>
                    @endforeach
                    <li><a href="{{route('contact')}}">İletişim</a></li>
                </ul>
            </div>
            <div class="section-row">
                <h3>Bizi Takip Edin</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            <!-- /social links -->

            <!-- aside nav close -->
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
    </div>
    <!-- /Nav -->
</header>
<!-- /Header -->
@yield('content')

<!-- Footer -->
<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index.html" class="logo"><img src="{{asset('front')}}/img/logo.png" alt=""></a>
                    </div>
                    <div class="footer-copyright">
								<span>&copy; Copyright &copy; {{now()->year}} Tüm hakları saklıdır. | Bu site
                                    <a href="https://evtsoft.com" target="_blank" class="text-success">evtsoft</a>
                                    tarafından hazırlanmıştır.
                                    </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="footer-widget">
                            <h3 class="footer-title">Sayfalar</h3>
                            <ul class="footer-links">
                                @foreach($pages as $page)
                                    <li><a href="{{route('page',$page->slug)}}">{{$page->title}}</a></li>
                                @endforeach
                                <li><a href="{{route('contact')}}">İletişim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-widget">
                    <h3 class="footer-title">Bültenimize üye olun!</h3>
                    <div class="footer-newsletter">
                        <form>
                            <input class="input" type="email" name="newsletter" placeholder="Email adresinizi giriniz">
                            <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <ul class="footer-social">
                        @if($config->facebook)
                            <li>
                                <a href="https://facebook.com/{{$config->facebook}}" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        @endif
                        @if($config->instagram)
                            <li>
                                <a href="https://instagram.com/{{$config->instagram}}" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        @endif
                        @if($config->twitter)
                            <li>
                                <a href="https://twitter.com/{{$config->twitter}}" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        @endif
                        @if($config->youtube)
                            <li>
                                <a href="https://youtube.com/{{$config->youtube}}" target="_blank">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /Footer -->

<!-- jQuery Plugins -->
<script src="{{asset('front')}}/js/jquery.min.js"></script>
<script src="{{asset('front')}}/js/bootstrap.min.js"></script>
<script src="{{asset('front')}}/js/main.js"></script>

</body>
</html>
