@extends('users.layouts.master')
@section('title')
    {{ __('réinitialiser le mot de passe') }}
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
                        <li> {{ __('réinitialiser le mot de passe') }}</li>
                    </ul>
                    <h2> {{ __('réinitialiser le mot de passe') }}</h2>
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
                                    <h3>  {{ __('réinitialiser le mot de passe') }}</h3>
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group ">
                                        
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        
                                    </div>

                                    <div class="form-group ">
                                        
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                      
                                    </div>
                                  
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> 
                                        {{ __('réinitialiser le mot de passe') }}
                                        </button>
                                    </div>
                                   
                              
                                </form>
                            </div>
                        </div><!-- end login -->
                    </div><!-- end content -->
 
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->

@endsection
