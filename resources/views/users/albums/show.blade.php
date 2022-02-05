@extends('users.layouts.master')
@section('title')
	{{$album->title}}
@endsection
@section('style')
<style type="text/css">
	@media(max-width: 676px){
		.imgg{
			height: 250px;
		}
	}
	@media(min-width: 676px){
		.imgg{
			height: 600px;
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
                <div class="property_wrapper   boxes clearfix">
                    <div class="boxes_img">
                        <div id="slider" class="flexslider clearfix">
                            <ul class="slides">
                                
                                @foreach($album->attachements as $key=>$attachement)
                                <li><img class="img-thumbnail imgg" src="{{asset('AnnonceDz/public/Albums/'.$album->id.'/'.$attachement->file_name)}}" alt="{{$album->titre}}"></li>
                                @endforeach
                               
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider clearfix">
                            <ul class="slides">
                                @isset($album->attachements)
                                @foreach($album->attachements as $key=>$attachement)
                                <li><img class="img-thumbnail" src="{{asset('AnnonceDz/public/Albums/'.$album->id.'/'.$attachement->file_name)}}" alt="{{$album->titre}}"></li>

                                @endforeach
                                @endisset
                            </ul>
                        </div> 
                    </div><!-- boxes_img -->
                    <hr>
                    
                </div><!-- end property_wrapper -->

            </div><!-- end content -->

            

        </div><!-- end row -->
    </div><!-- end container -->
</section>

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
