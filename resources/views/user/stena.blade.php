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
                                        <a href="{{route('like',['statusId'=>$status->id])}}">лайк</a>
                                    </li>
                                @endif
                                <li class="list-inline-item"><p>{{$status->likes->count()}} лайков</p></li>
                            </ul>
                            <ul class="list-inline">
                                @foreach($status->comments as $comment)
                                    <li class="list-inline-item">
                                        <div class="media " style="margin-left: 40px">
                                            <div style="width: 50px; height: 50px">
                                                <img src="{{asset('front/')}}/img/person-rifle-solid.svg" alt="">
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
                                                            <a href="{{route('like',['statusId'=>$status->id])}}">лайк</a>
                                                        </li>
                                                    @endif
                                                    <li class="list-inline-item"><p>{{$status->likes->count()}} лайков</p></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>

                            <form method="post" action="{{route('comment',['statusId'=>$status->id])}}" class="mb-4">
                                @csrf
                                <div class="form-group">
                                    <textarea name="comment-{{$status->id}}" cols="50" rows="2"
                                              placeholder="  прокомментировать"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Написать</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
