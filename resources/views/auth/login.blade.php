@extends('users.layouts.master')
@section('title')
     {{__('users/auth.login')}}
@endsection
@section('style')

@endsection
@section('content')
    <section id="one-parallax" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('/users/img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="overlay1 dm-shadow">
            <div class="container">
                <div class="post-wrapper-top-shadow">
                    <span class="s1"></span>
                </div>
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}"> {{__('users/annonce.home')}}</a></li>
                        <li> {{__('users/auth.login')}}</li>
                    </ul>
                    <h2> {{__('users/auth.login')}}</h2>
                </div>
            </div>
        </div>
    </section>
     <section class="generalwrapper dm-shadow clearfix">
            <div class="container">
                <div class="row">
                    
                    <div id="content" class="col-md-6 col-md-offset-3 clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12">   
                            <div class="widget clearfix">
                                <div class="title">
                                    <h3> {{__('users/auth.login')}}</h3>
                                </div>
                                @if(session()->has('success'))
                                    <div class="alert alert-success text-center" id="msg">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder=" {{__('users/auth.email')}}" value="{{ old('email') }}" required autocomplete="email" name="email" autofocus>
                                        </div>
                                        @error('email')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder=" {{__('users/auth.password')}}" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label> 
                                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>  {{__('users/auth.remember_me')}}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> {{__('users/auth.login')}}</button>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class=" btn-link" href="{{ route('password.request') }}">
                                         {{__('users/auth.forget_password')}}
                                    </a>
                                @endif
                                </form>
                            </div>
                        </div><!-- end login -->
                    </div><!-- end content -->
 
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->
 

@endsection

@section('script')

@endsection

