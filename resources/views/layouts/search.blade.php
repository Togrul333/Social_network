<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--
    Tinker CSS Template
    https://templatemo.com/tm-506-tinker
    -->
    <title>Соцыальная сеть {{config('app.name')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <link rel="apple-touch-icon" href="{{asset('front/')}}/apple-touch-icon.png">

    <link rel="stylesheet" href="{{asset('front/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/fontAwesome.css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/hero-slider.css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/owl-carousel.css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/templatemo-style.css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/lightbox.css">

    <script src="{{asset('front/')}}/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
<div class="header">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                        data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand scroll-top"><em>T</em>inker</a>
            </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav" style="display:flex; align-items: center">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li>
                            <form style="display: flex" method="Get" action="">
                                <input name="query" class="form-control me-2 scroll-link" type="search"
                                       placeholder="Search"
                                       aria-label="Search">
                                <button class="btn btn-success" type="submit">Найти</button>
                            </form>
                        </li>
                        <li><a href="{{asset('front/')}}/#" class="scroll-top">Home</a></li>
                        <li><a href="{{asset('front/')}}/#" class="scroll-link" data-id="about">Friends</a></li>
                        <li><a href="{{asset('front/')}}/#" class="scroll-link"
                               data-id="portfolio">{{\Illuminate\Support\Facades\Auth::user()->name }}</a></li>
                        <li><a href="{{asset('front/')}}/#" class="scroll-link" data-id="blog">Стена</a></li>
                        <li><a href="{{route('logout')}}">Выйти</a></li>
                    @else
                        <li>
                            <div class="pop-button">
                                <h4>Зарегистрироваться</h4>
                            </div>
                        </li>
                        <li><a href="#" class="scroll-link" data-id="contact-us">Войти</a></li>
                    @endif
                </ul>
            </div>
            <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
    </div>
    <!--/.container-->
</div>
<!--/.header-->
<div class="parallax-content baner-content" id="home">
    <div class="container">
        <div class="text-content">
            @include('partials.alerts')
            <div>
                <h2><em>Results :</em> <span>{{\Illuminate\Support\Facades\Request::input('query')}}</span></h2>
            </div>
            @if(!$users->count())

            @endif
            <div class="row">
                @foreach($users as $user)
                    @include('user.userblock')
                @endforeach
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')
