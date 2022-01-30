@extends('users.layouts.master')
@section('title')
	@isset($category) {{$category->name}} @endisset
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
    @include('users.includes.filter.filter_artisant')
    @include('users.includes.filter.filter_ing')
<div class="col-lg-12 parallax" id="one-parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    
    <div style="float: left;">
		<ul class="breadcrumb">
	        <li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
	        <li>@isset($category) {{$category->name}} @endisset</li>
    	</ul>
	</div>
	<div style="float: right;">
		    @if($category->category_compte == 2)
				<a class="btn btn-bordered btn-info" style="background-color: DodgerBlue;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter_artisant" ><i class="fa fa-filter" ></i> FILTRER PLUS</a>
			@elseif($category->category_compte == 4)
				<a class="btn btn-bordered btn-info" style="background-color: DodgerBlue;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter_ing" ><i class="fa fa-filter" ></i> FILTRER PLUS</a>
			@endif
		
	</div>
    
</div>

<section class="generalwrapper dm-shadow clearfix parallax" id="one-parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
	<div class="container">
	    <div class="row">
	        <div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
	            <div class="clearfix">
	            	@if($users->count() == 0)
	            		<div class="col-md-12 boxes">
			        		<div class="alert alert-danger text-center" id="msg">
								Aucun compte n'existe dans cette catégorie
							</div>
			        	</div>
	            	@endif
	            	@isset($users)
	            		@foreach($users as $key=> $user)
			                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
			                    <div class="boxes first" data-effect="slide-bottom">
			                        <div class="ImageWrapper big-ImageWrapper boxes_img">
			                        	<a href="{{route('boutique',$user->uuid)}}">
			                            <img class="img-responsive" src="{{asset('AnnonceDz/public/User/'.$user->id.'/'.$user->img_couverture)}}" alt="{{$user->name}}">
			                            </a>
			                        </div>
			                        <h2 class="title">
			                            <a style="color: DodgerBlue;font-weight: bold" href="{{route('boutique',$user->uuid)}}"> {{$user->name}}</a>
			                            <small class="small_title">
			                            	<div class="my-rating" data-rating="{{$user->avg_rating}}"  data-id="{{$user->id}}"></div>
			                            </small>
			                            <a class="box-agent-icon" href="{{route('boutique',$user->uuid)}}"><img style="width: 35px;height: 35px" src="{{asset('AnnonceDz/public/User/'.$user->id.'/'.$user->image)}}" alt="{{$user->name}}"></a>
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

</script>

@endsection