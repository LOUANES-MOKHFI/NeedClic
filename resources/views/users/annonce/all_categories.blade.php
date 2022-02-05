@extends('users.layouts.master')
@section('title')
	@isset($type) {{$type}} @endisset
	

@endsection
@section('style')
<style type="text/css">
	.show-menu-arrow option{
		color: black;
	}
	@media(max-width: 767px)
	.big-ImageWrapper img{
		height: 60px;
	}
</style>
@endsection
@section('content')
    @include('users.includes.publicite.publicite')

<div class="col-lg-12 parallax" id="one-parallax" style="background-image: url('/users/img/01_parallax.jpg');"
    data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <ul class="breadcrumb">
        <li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
        <li>@isset($type) {{$type}} @endisset</li>
    </ul>
</div>
<section style="background-image: url('/users/img/01_parallax.jpg');"
    data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
	<div class="container">
	    <div class="row">
	            	@isset($categories)
	            		@foreach($categories as $key=> $category)
			                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			                        
			                        	@if($type == 'Particulier' || $type == 'Artisanat')
			                        	<a href="{{route('annonces.category',[$category->slug,$type])}}">
			                            <img class="img-responsive" src="{{asset('AnnonceDz/public/Category/'.$category->id.'/'.$category->image)}}" alt="{{$category->name}}">
			                            </a>
			                            @else
			                            <a href="{{route('comptes.category',[$category->slug,$type])}}">
			                            <img class="img-responsive" src="{{asset('AnnonceDz/public/Category/'.$category->id.'/'.$category->image)}}" alt="{{$category->name}}">
			                            </a>
			                            @endif
			                            
			                        
			                        <h2 class="title text-center">
			                        	@if($type == 'Particulier' || $type == 'Artisanat')
			                        		<a style="color: black;font-weight: bold;font-size: 15px" href="{{route('annonces.category',[$category->slug,$type])}}"> {{$category->name}}</a>
			                        	@else
			                            <a style="color: black;font-weight: bold;font-size: 15px" href="{{route('comptes.category',[$category->slug,$type])}}"> {{$category->name}}</a>
			                           @endif
			                        </h2>
			                </div>
			            @endforeach
			        @endisset

	        
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