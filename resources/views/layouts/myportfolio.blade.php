<section id="portfolio">
    <div class="content-wrapper">
        <div class="inner-container container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="section-heading">
                        <h4>{{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
                        <h4>{{\Illuminate\Support\Facades\Auth::user()->lastname}}</h4>
                        <h4>{{\Illuminate\Support\Facades\Auth::user()->firstname}}</h4>
                        <h4>{{\Illuminate\Support\Facades\Auth::user()->location}}</h4>
                        <div class="line-dec"></div>
                        {{--                        <p>In malesuada placerat ligula et bibendum. Aenean eget urna enim. Sed enim ante, bibendum nec dictum ac, gravida ac lectus.</p>--}}
                        <div class="filter-categories">
                            <ul class="project-filter">
                                <li class="filter" data-filter="all"><span>Show All</span></li>
                                <li class="filter" data-filter="branding"><span>Dostlar</span></li>
                                <li class="filter" data-filter="graphic"><span>Mene gelenler</span></li>
                                <li class="filter" data-filter="nature"><span>Gonderdiklerim</span></li>
{{--                                <li class="filter" data-filter="animation"><span>Animation</span></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="projects-holder-3">
                        <div class="projects-holder">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 project-item mix nature">
                                    @if(!\Illuminate\Support\Facades\Auth::user()->myRequests()->count())
{{--                                        <p>У вас нет отправленных запросов</p>--}}
                                    @else
                                        @foreach(\Illuminate\Support\Facades\Auth::user()->myRequests() as $user)
                                            @include('user.userblock2')
                                        @endforeach
                                    @endif
                                </div>
{{--                                <div class="col-md-6 col-sm-6 project-item mix animation">--}}
{{--                                    <div class="thumb">--}}
{{--                                        <div class="image">--}}
{{--                                            <a href="{{asset('front/')}}/img/portfolio_big_item_02.jpg"--}}
{{--                                               data-lightbox="image-1"><img--}}
{{--                                                    src="{{asset('front/')}}/img/portfolio_item_02.jpg"></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-3 col-sm-3 project-item mix branding">
                                    <div class="thumb" style="display: flex;">
                                        @if(!\Illuminate\Support\Facades\Auth::user()->friends()->count())
                                            <p>У вас нет друзей</p>
                                        @else
                                            @foreach(\Illuminate\Support\Facades\Auth::user()->friends() as $user)
                                                @include('user.userblock2')
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 project-item mix graphic">
                                        @if(!\Illuminate\Support\Facades\Auth::user()->friendRequests()->count())
{{--                                            <p>У вас нет отправленных запросов</p>--}}
                                        @else
                                            @foreach(\Illuminate\Support\Facades\Auth::user()->friendRequests() as $user)
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
</section>
