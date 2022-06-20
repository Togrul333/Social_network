<div id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading ">
                    <h4>Contact Us</h4>
                    <div class="line-dec"></div>
                    <div class="row ">
                        <div class="col-lg-4 mx-auto ">
                            <h1>Login</h1>
                            <form method="POST" action="{{route('loginPost')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail2" class="form-label">Email address</label>
                                    <input type="email" id="exampleInputEmail2"
                                           value="{{request()->old('email')? : ''}}"
                                           name="email"
                                           class="form-control {{$errors->has('email')? 'is-invalid' :''}}">

                                    @if($errors->has('email'))
                                        <span class="help-block text-danger">
                         {{$errors->first('email')}}
                         </span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" id="exampleInputPassword1" name="password"
                                           class="form-control {{$errors->has('password')? 'is-invalid' :''}}">

                                    @if($errors->has('password'))
                                        <span class="help-block text-danger">
                {{$errors->first('password')}}
                </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        register --}}
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="pop">
                    <span>✖</span>
                    <form id="contact" action="{{route('registerPost')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                           placeholder="Your name..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <input name="email" type="email" class="form-control" id="email"
                                           placeholder="Your email..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <input name="password" type="password" class="form-control" id="email"
                                           placeholder="Your password..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Зарегистрироваться</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
