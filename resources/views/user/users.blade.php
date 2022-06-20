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
<section id="portfolio">
    <div class="inner-container container">
        <div>
            @if(!$users->count())
                <p>У него нет друзей</p>
            @else
                @foreach($users as $user)
                    @include('user.userblock2')
                @endforeach
            @endif
        </div>

    </div>
</section>

@include('layouts.footer')
