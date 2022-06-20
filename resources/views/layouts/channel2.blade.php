<div class="tabs-content" id="blog">
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <div class="col-md-4">
                    <div class="section-heading">
                       <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                           <li>
                               <form action="{{route('status')}}" method="POST">
                                   @csrf
                                   <div class="form-group">
                                       <textarea name="status" id="" cols="40" rows="3" placeholder="   Что нового {{\Illuminate\Support\Facades\Auth::user()->name}} ?" required></textarea>
                                   </div>
                                   <button type="submit" class="btn btn-primary">Опубликовать</button>
                               </form>
                           </li>
                            <li><a href="#tab1" class="active">Cтена</a></li>
{{--                            <li><a href="#tab2">Quisque ultricies maximus</a></li>--}}
{{--                            <li><a href="#tab3">Sed vel elit et lorem</a></li>--}}
{{--                            <li><a href="#tab4">Vivamus purus neque</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">


                        </div>
{{--                        <div id="tab2">--}}
{{--                            <img src="{{asset('front/')}}/img/blog_item_02.jpg" alt="">--}}
{{--                            <div class="text-content">--}}
{{--                                <h4>Quisque ultricies maximus</h4>--}}
{{--                                <span><a href="{{asset('front/')}}/#">Branding</a> / <a href="{{asset('front/')}}/#">David</a> / <a href="{{asset('front/')}}/#">24 August 2020</a></span>--}}
{{--                                <p>Etiam fringilla posuere pretium. Maecenas tempor pellentesque elit in dapibus. Curabitur viverra urna sem, ut sollicitudin sem congue vel. Donec fringilla augue in justo molestie fermentum quis ac mi.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div id="tab3">--}}
{{--                            <img src="{{asset('front/')}}/img/blog_item_03.jpg" alt="">--}}
{{--                            <div class="text-content">--}}
{{--                                <h4>Sed vel elit et lorem</h4>--}}
{{--                                <span><a href="{{asset('front/')}}/#">Web Design</a> / <a href="{{asset('front/')}}/#">William</a> / <a href="{{asset('front/')}}/#">18 July 2020</a></span>--}}
{{--                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id ipsum porta, dictum sem sed, bibendum quam. Maecenas mattis risus eget orci rhoncus.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div id="tab4">--}}
{{--                            <img src="{{asset('front/')}}/img/blog_item_04.jpg" alt="">--}}
{{--                            <div class="text-content">--}}
{{--                                <h4>Vivamus purus neque</h4>--}}
{{--                                <span><a href="{{asset('front/')}}/#">E-Commerce</a> / <a href="{{asset('front/')}}/#">George</a> / <a href="{{asset('front/')}}/#">14 July 2020</a></span>--}}
{{--                                <p>Aliquam erat volutpat. Nulla at nunc nec ante rutrum congue id in diam. Nulla at lectus non turpis placerat volutpat lacinia ut mi. Quisque ultricies maximus justo a blandit. Donec sit amet commodo arcu. Sed sit amet iaculis mi, vel fermentum nisi. Morbi dui enim, vestibulum non accumsan ac, tempor non nisl.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
