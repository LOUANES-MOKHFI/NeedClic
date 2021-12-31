@extends('users.layouts.master')
@section('title')
    {{ __('Confirmer le mot de passe') }}
@endsection
@section('style')

@endsection
@section('content')
<section id="one-parallax" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('/users/img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" 
    data-stellar-vertical-offset="20">
        <div class="overlay1 dm-shadow">
            <div class="container">
                <div class="post-wrapper-top-shadow">
                    <span class="s1"></span>
                </div>
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}"> {{__('users/annonce.home')}}</a></li>
                        <li> {{ __('Confirmer le mot de passe') }}</li>
                    </ul>
                    <h2> {{ __('Confirmer le mot de passe') }}</h2>
                </div>
            </div>
        </div>
</section>
<section class="generalwrapper dm-shadow clearfix">
            <div class="container">
                <div class="row">
                    
                    <div id="content" class="col-md-12 col-md-offset clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12">   
                            <div class="widget clearfix">
                                <div class="title">
                                    <h3>  {{ __('Confirmer le mot de passe') }}</h3>
                                </div>
                                {{ __('veuillez confirmer votre mot de passe avant de continuer') }}
                                 <form method="POST" action="{{ route('password.confirm') }}">
                                     @csrf
                                    <div class="form-group ">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                   <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Confirm Password') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                   
                              
                                </form>
                            </div>
                        </div><!-- end login -->
                    </div><!-- end content -->
 
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->

@endsection




