@extends('users.layouts.master')
@section('title')
	@isset($service) {{$service->name}} @endisset
@endsection
@section('style')
<style type="text/css">
	.show-menu-arrow option{
		color: black;
	}
</style>
@endsection
@section('content')
    @include('users.includes.publicite.publicite')

<div class="col-lg-12">
    
    <div style="float: left;">
		<ul class="breadcrumb">
	        <li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
	        <li>@isset($service) {{$service->name}} @endisset </li>
	    </ul>
	</div>
	<div style="float: right;">
		<a class="btn btn-bordered btn-info" style="background-color: DodgerBlue;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter_boutique" ><i class="fa fa-filter" ></i> FILTREZ PLUS</a>
	</div>
    
</div>
<section class="generalwrapper dm-shadow clearfix">
	<div class="container">
	    <div class="row">
	        <div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
	            <div class="clearfix">
	            	@if($users->count() == 0)
	            		<div class="col-md-12 boxes">
			        		<div class="alert alert-danger text-center" id="msg">
								Aucun Boutique existe dans cette categorie
							</div>
			        	</div>
	            	@endif
	            	@isset($users)
	            		@foreach($users as $key=> $user)
			                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
			                    <div class="boxes first" data-effect="slide-bottom">
			                        <div class="ImageWrapper big-ImageWrapper boxes_img">
			                            <img class="img-responsive" src="{{asset('AnnonceDz/public/User/'.$user->name.'/'.$user->image)}}" alt="{{$user->name}}">
			                            <div class="ImageOverlayH"></div>
			                            <div class="Buttons StyleSc">
			                                <span class="WhiteSquare">
			                                    <a class="fancybox" href="{{asset('AnnonceDz/public/User/'.$user->name.'/'.$user->image)}}" alt="{{$user->name}}"><i class="fa fa-search"></i></a>
			                                </span>
			                                <span class="WhiteSquare">
			                                    <a href="{{route('boutique',$user->uuid)}}"><i class="fa fa-link"></i></a>
			                                </span>
			                            </div>
			                        </div>
			                        <h2 class="title">
			                            <a style="color: DodgerBlue;font-weight: bold" href="{{route('boutique',$user->uuid)}}"> {{$user->name}}</a>
			                            <small class="small_title">
			                            	<div class="my-rating" data-rating="{{$user->avg_rating}}" data-uuid="{{$user->uuid}}" data-id="{{$user->id}}"></div>
			                            </small>
			                            <a class="box-agent-icon" href="{{route('boutique',$user->uuid)}}"><img style="width: 35px;height: 35px" src="{{asset('AnnonceDz/public/User/'.$user->name.'/'.$user->image)}}" alt="{{$user->name}}"></a>
			                        </h2>
			                    </div><!-- end boxes -->
			                </div>
			            @endforeach
			        @endisset

	            </div>

	            <div class="pagination_wrapper clearfix">
	                <!-- Pagination Normal -->
	                <ul class="pagination">
	                    {{$users->links()}}
	                </ul>
	            </div>

	        </div><!-- end content -->

	       

	    </div><!-- end row -->
            </div><!-- end container -->
        </section>

@endsection


@section('script')
    @include('users.includes.filter.filter_boutique')

<script src="{{asset('admin/assets/scripts/jquery.min.js')}}"></script>

<script type="text/javascript">

	 (function(jQuery){
    jQuery(window).load(function(){
        jQuery('.flexslider').flexslider({
             animation: "fade",
            slideshowSpeed: 6000,
            animationSpeed: 1300,
            controlNav: true,
            keyboardNav: true,
            controlNav: "sliders", 
            directionNav: true,


        
        start: function(slider){
          jQuery('.slider-container').removeClass('loading');
        }
      });
     
    });
}(jQuery));

    $('#wilaya_id').on('change',function(e){
        var wilaya_id = e.target.value;
        $('#commune_id').empty();
        $('.commune').css('display','block');
        //ajax
        $.ajax({
            type: "GET",
            url: "/users/get-commune/"+wilaya_id,
            success:function(communes){
                if(communes.length != 0){
                    communes.forEach(element =>
                    {
                        $('#commune_id').append('<option value="' +element.id+'">'+ element.name+'</option>');
                    });
                }
            }
            });
        });

   
</script>
@endsection