<div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-item">
            <a href="{{route('profile',['name'=>$user->name])}}">
                <div class="icon">
                    <img src="{{asset('front/')}}/img/service_icon_02.png" alt="">
                </div>
                <p></p>
                <div class="line-dec"></div>
                <h4>{{$user->id}}</h4>
                <p>{{$user->getName()}}</p>
{{--                <p>{{$user->location ? $user->location : 'Az-can'}}</p>--}}
{{--                <p> {{$user->firstname}} | Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </a>
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
        </div>
    </div>
