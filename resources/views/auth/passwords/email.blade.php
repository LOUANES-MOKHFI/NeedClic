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
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                        @error('email')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                  
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> Envoyer</button>
                                    </div>
                                   
                              
                                </form>
                            </div>
                        </div><!-- end login -->
                    </div><!-- end content -->
 
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->

@endsection
