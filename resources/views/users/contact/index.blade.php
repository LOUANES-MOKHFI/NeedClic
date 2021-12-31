@extends('users.layouts.master')
@section('title')
	Contactez-nous
@endsection
@section('style')
<style type="text/css">
    .form-control{
        font-size: 15px;
    }
</style>
@endsection
@section('content')

<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
        <div class="row">
            
            <div id="content" class=" col-lg-11 col-md-11 col-sm-11 col-xs-12 clearfix">
                <div class="modal-body clearfix">
                   {{--  <h3 class="big_title">Do you have questions? <small>Dont worry! We're here to help you</small></h3>
                    <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free.</p> --}}
                    <hr>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                       
                        <div class="servicetitle"><h3>{{__('users/contact.contact')}}</h3></div>
                        <ul>

                            @if(!empty(Setting()->email))<li style="font-size:16px"><i class="fa fa-envelope"></i> {{Setting()->email}}</li>@endif<br>
                            @if(!empty(Setting()->phone))<li style="font-size:16px"><i class="fa fa-phone-square"></i> {{Setting()->phone}}</li>@endif
                            <div id="footer" style="border-top: 1px solid white">
                                <div class=" col-md-12 col-sm-12">
                       
                                    <p class="block"><!-- social -->
                                        @if(!empty(Setting()->facebook))<a href="{{Setting()->facebook}}" class="social fa fa-facebook"></a>@endif
                                        @if(!empty(Setting()->twitter))<a href="{{Setting()->twitter}}" class="social fa fa-twitter"></a>@endif
                                        @if(!empty(Setting()->email))<a href="{{Setting()->email}}" class="social fa fa-google-plus"></a>@endif
                                        @if(!empty(Setting()->linkedin))<a href="{{Setting()->linkedin}}" class="social fa fa-linkedin"></a>@endif
                                        @if(!empty(Setting()->instagram))<a href="{{Setting()->instagram}}" class="social fa fa-instagram"></a>@endif
                                    </p><!-- /social -->
                                </div>
                            </div>
                        </ul>
                    </div>

                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    	@include('users.dashboard.includes.alerts.alerts')

                        <form id="contact" class="row" action="{{route('contact.store')}}" name="contactform" method="post">
                        	@csrf 
                            
                            <input type="text" name="name" id="name" class="form-control" placeholder="{{__('users/contact.name')}}"> 
                            <input type="text" name="email" id="email" class="form-control" placeholder="{{__('users/contact.email')}}"> 
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="{{__('users/contact.subject')}}"> 
                            <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="{{__('users/contact.msg')}}"></textarea>
                            <button type="submit" class="btn btn-primary">{{__('users/contact.send')}}</button>
                        </form>
                    </div>
                </div>
            </div><!-- end content -->
            
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end generalwrapper -->

@endsection

@section('script')

@endsection
