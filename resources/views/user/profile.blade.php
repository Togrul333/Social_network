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
    <div class="content-wrapper">
        <div class="inner-container container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="section-heading">
                        <h4>{{$user->id}}</h4>
                        <h4>{{$user->name}}</h4>
                        <h4>{{$user->lastname}}</h4>
                        <h4>{{$user->firstname}}</h4>
                        <h4>{{$user->location}}</h4>
                        <div class="primary-white-button">
                            @if(\Illuminate\Support\Facades\Auth::user()->hasFriendRequestPending($user))
                                <a href="#">dostlug atmisan</a>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->hasFriendRequestReceived($user))
                                <a href="{{route('acceptFriend',['name'=>$user->name])}}">DOSTLUGU QEBUL ET</a>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->isFriendWith($user))
                                <a href="#">Dostumdur uje</a>
                            @else
                                <a href="{{route('addFriend',['name'=>$user->name])}}">DOSTLUG AT</a>
                            @endif
                        </div>
                        <div class="line-dec"></div>
                        <p>In malesuada placerat ligula et bibendum.ictum ac, gravida ac lectus.</p>
                        <div class="filter-categories">
                            <ul class="project-filter">
                                {{--<li class="filter" data-filter="all"><span>Show All</span></li>--}}
                                {{--                                <li class="filter" data-filter="branding"><span>DOSTLAR</span></li>--}}
                                {{--                                <li class="filter" data-filter="graphic"><span>Graphic</span></li>--}}
                                {{--                                <li class="filter" data-filter="nature"><span>Nature</span></li>--}}
                                {{--                                <li class="filter" data-filter="animation"><span>Animation</span></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="projects-holder-3">
                        <div class="projects-holder">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 project-item mix branding">
                                    <div class="thumb">
                                        <div>
                                            @if(!$user->friends()->count())
                                                <p>У него нет друзей</p>
                                            @else
                                                @foreach($user->friends() as $user)
                                                    @include('user.userblock2')
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs-content" id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @if(!$statuses->count())
                            <p>Пока статусов нет</p>
                        @endif
                        @foreach($statuses as $status)
                            <div class="media" style=" padding: 10px 10px; margin-top: 30px;">
                                <div style="width: 100px; height: 100px">
                                    <img src="{{asset('front/')}}/img/person-rifle-solid.svg" alt="">
                                </div>
                                <div class="media-body">
                                    <h4>
                                        <a href="{{route('profile',['name'=>$status->user->name])}}">{{$status->user->id}} {{ucfirst($status->user->name)}}</a>
                                    </h4>
                                    <p>{{$status->body}}</p>
                                    <ul class="list-inline">
                                        <li><p>{{$status->created_at->diffForHumans()}}</p></li>
                                        @if($status->user->id !== \Illuminate\Support\Facades\Auth::user()->id)
                                            <li class="list-inline-item">
                                                <a href="">лайк</a>
                                            </li>
                                        @endif
                                        <li class="list-inline-item"> лайков</li>
                                    </ul>
                                    <ul class="list-inline">
                                        @foreach($status->comments as $comment)
                                            <li class="list-inline-item">
                                                <div class="media " style="margin-left: 40px">
                                                    <div style="width: 50px; height: 50px">
                                                        <img src="{{asset('front/')}}/img/person-rifle-solid.svg"
                                                             alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4>
                                                            <a href="{{route('profile',['name'=>$comment->user->name])}}">{{$comment->user->id}} {{ucfirst($comment->user->name)}}</a>
                                                        </h4>
                                                        <p>{{$comment->body}}</p>
                                                        <ul class="list-inline">
                                                            <li><p>{{$comment->created_at->diffForHumans()}}</p></li>
                                                            @if($comment->user->id !== \Illuminate\Support\Facades\Auth::user()->id)
                                                                <li class="list-inline-item">
                                                                    <a href="">лайк</a>
                                                                </li>
                                                            @endif
                                                            <li class="list-inline-item"> лайков</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr>
                                        @endforeach
                                    </ul>
                                    @if($authUserIsFriend)
                                        <form method="post" action="{{route('comment',['statusId'=>$status->id])}}"
                                              class="mb-4">
                                            @csrf
                                            <div class="form-group">
                                    <textarea name="comment-{{$status->id}}" cols="50" rows="2"
                                              placeholder="  прокомментировать"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Написать</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
