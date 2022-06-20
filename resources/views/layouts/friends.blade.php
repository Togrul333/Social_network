<section id="about" class="page-section">
    <div class="container">
        <div class="row">
            @foreach($usersNotContact as $user)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="{{asset('front/')}}/img/service_icon_01.png" alt="">
                        </div>
                        <h4>{{$user->name}}</h4>
                        <div class="line-dec"></div>
                        <p>"{{$user->location}}"{ id = {{$user->id}} }Curabitur non Cras aliquam tempor sem, vestibulum facilisis dui. Mauris
                            malesuada porta.</p>
                        <div class="primary-blue-button">
                            @if(\Illuminate\Support\Facades\Auth::user()->hasFriendRequestPending($user))
                                <a href="#">dostlug atmisan</a>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->hasFriendRequestReceived($user))
                                <a href="{{route('acceptFriend',['name'=>$user->name])}}">DOSTLUGU QEBUL ET</a>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->isFriendWith($user))
                                <a href="#">Dostumdur uje</a>
                            @else
                                <a href="{{route('addFriend',['name'=>$user->name])}}">Отправить запрос</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
