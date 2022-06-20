<div style="border-color:#2b542c">
    <a href="{{route('profile',['name'=>$user->name])}}">
        <div>
            <img src="{{asset('front/')}}/img/service_icon_02.png" alt="">
        </div>
        <p></p>
        <h4>{{$user->id}}</h4>
        <p>{{$user->getName()}}</p>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </a>
    <div class="primary-white-button" style="border-color: #0f0f0f">
        @if(\Illuminate\Support\Facades\Auth::user()->hasFriendRequestPending($user))
            <h1 >dostlug atmisan</h1>
            <hr>
        @elseif(\Illuminate\Support\Facades\Auth::user()->hasFriendRequestReceived($user))
            <a href="{{route('acceptFriend',['name'=>$user->name])}}">DOSTLUGU QEBUL ET</a>
            <hr>
        @elseif(\Illuminate\Support\Facades\Auth::user()->isFriendWith($user))
            <h1>Dostumdur uje</h1>
            <a href="{{route('deleteFriend',['name'=>$user->name])}}" class="btn btn-danger">Dostlugdan sil</a>
            <hr>
        @elseif(\Illuminate\Support\Facades\Auth::id() !== $user->id)
            <a href="{{route('addFriend',['name'=>$user->name])}}">DOSTLUG AT</a>
            <hr>
        @endif
    </div>
</div>

