@extends('users.layouts.master')
@section('title')
	{{$album->title}}
@endsection
@section('style')
<style type="text/css">
	@media(max-width: 676px){
		.imgg{
			height: 120px;
		}
	}
	@media(min-width: 676px){
		.imgg{
			height: 180px;
		}
	}
</style>
@endsection
@section('content')
    @include('users.includes.publicite.publicite')

<div class="col-lg-12">
    

    <div style="float: left;">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('users/albums.home')}}</a></li>
            <li><a href="">{{__('users/albums.all_albums')}}</a></li>
            <li>{{$album->title}}</li>
        </ul>
        <h2>{{$album->title}}</h2>
    </div>
    
    
</div>
<section class="generalwrapper dm-shadow clearfix">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                        <div class="blog_container clearfix">
                        	@isset($album->attachements)
	                        	@foreach($album->attachements as $key=>$attachement)
		                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
		                                <article class="blog-wrap boxes portfolio-wrap">
		                                    <div class="blog-media">
		                                        <div class="ImageWrapper boxes_img">
		                                            <img class="img-responsive imgg" src="{{asset('AnnonceDz/public/Albums/'.$album->id.'/'.$attachement->file_name)}}" alt="">
		                                            <div class="ImageOverlayH"></div>
		                                            <div class="Buttons StyleMg">
		                                                <span class="WhiteSquare"><a class="fancybox" href="{{asset('AnnonceDz/public/Albums/'.$album->id.'/'.$attachement->file_name)}}"><i class="fa fa-search"></i></a></span>
		                                            </div> 
		                                        </div><!-- ImageWrappe-->
		                                    </div><!-- end blog media -->
		                                </article><!-- end blog wrap -->
		                            </div><!-- end col-lg-3 -->
	                            @endforeach
                            @endisset


                        </div><!-- end row -->

                    </div><!-- end content -->

                   
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->
@endsection

@section('script')
 <script>
            $(window).load(function () {
                $('#carousel').flexslider({
                    animation: "slide",
                    controlNav: false,
                    directionNav: false,
                    animationLoop: true,
                    slideshow: true,
                    itemWidth: 122,
                    itemMargin: 0,
                    asNavFor: '#slider'

                });
                $('#slider').flexslider({
                    animation: "fade",
                    slideshowSpeed: 6000,
                    animationSpeed: 1300,
                    controlNav: true,
                    keyboardNav: true,
                    controlNav: '#slider',
                    directionNav: true,
                });
            });

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
<script type="text/javascript">
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
