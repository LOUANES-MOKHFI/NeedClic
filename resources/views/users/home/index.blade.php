@extends('users.layouts.master')
@section('title')
{{__('users/menu.home')}}
@endsection
@section('style')

 <style type="text/css">
    @if(app()->getLocale() === 'ar')
                @media (max-width: 767px) {
                   .search-section{
                    
                   }
                }
    @endif
 	.items {
    height: 240px;
   
}

.slick-slide {
   
}

.slick-slide img {
   
}
.big-ImageWrapper img {
    height: 220px;
}
.slides .desc, .sticky-toolbar {
    display: block;
}
.slider-pro-desc .type,
.slider-pro-desc .price,
.slider-pro-desc .status {
    display: inline-block;
    font-size: 13px;
    min-width:126px;
    max-width:126px;
    padding: 6px 0px 8px;
    text-align:center;
    position: absolute;
    text-decoration: none;
}
.slider-pro-desc .price {
    bottom: -34px;
    left: 126px;
}
 </style>
@endsection
@section('content')
    
<section>
    @include('users.includes.publicite.publicite')
    
    <!-- <div class=" dm-shadow">
        <div class="container">
            <div class="row">

                <div class="boxes col-md-6 col-lg-6 col-sm-12 col-xs-12">
                	<div class="boxes text-center" style="background-color: DodgerBlue;padding-top:12px">
                		<h3 style="color: white;font-weight: bold;">{{__('users/home.proffessionnelles')}}</h3>
                	</div>
	                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	                    <div class="first" data-effect="slide-bottom">
	                        <div class="ImageWrapper big-ImageWrapper boxes_img">
	                            <a href="{{route('categories.proffessionnelles','Artisant')}}">
                                <img class="img-responsive" src="{{asset('users/img/home/artisant2.png')}}" alt="NeedClic">
                                </a>
	                            
	                        </div>
	                        <h2 class="title text-center">
	                            <a style="color: DodgerBlue;font-weight: bold" href="{{route('categories.proffessionnelles','Artisant')}}"> {{__('users/home.artisant')}}</a>
	                        </h2>
	                    </div>
	                </div>
	                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	                    <div class="first" data-effect="slide-bottom">
	                        <div class="ImageWrapper big-ImageWrapper boxes_img">
                                <a href="{{route('categories.proffessionnelles','Ingénieure')}}">
	                               <img class="img-responsive" src="{{asset('users/img/home/ingenieur2.png')}}" alt="">
                                </a>                         

	                        </div>
	                        <h2 class="title text-center">
	                            <a style="color: DodgerBlue;font-weight: bold" href="{{route('categories.proffessionnelles','Ingénieure')}}"> {{__('users/home.ingenieur')}}</a>
	                        </h2>
	                    </div>
	                </div>
                </div>
                <div class="boxes col-md-6 col-lg-6 col-sm-12 col-xs-12">
                	<div class="boxes text-center"  style="background-color: DodgerBlue;padding-top:12px">
                		<h3 style="color: white;font-weight: bold;">{{__('users/home.boutique')}}</h3>
                	</div> 
	                <div class="items">
	                	@isset($services)
	                	@foreach($services as $key=>$service)
					     <div>
                            <a href="{{route('annonces.service',$service->slug)}}">
					     	     <img src="{{asset('AnnonceDz/public/Service/'.$service->name.'/'.$service->image)}}" style="height: 200px;">
                            </a>

					     	<div class="boxes text-center">
					     		<h2 class="title text-center">
	                            	<a style="color: DodgerBlue;font-weight: bold" href="{{route('annonces.service',$service->slug)}}"> {{$service->name}}</a>
	                        	</h2>
					     	</div>
					     </div>
					     @endforeach
					     @endisset
					</div>
                </div>

             

            </div>
        </div>
    </div> -->

</section>
<section id="one-parallax" class="parallax" style="background-image: url('/users/img/01_parallax.jpeg');"
    data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="mapandslider">
        <div class=" dm-shadow" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        
                            <div class="first" data-effect="slide-bottom">
                                <div class="ImageWrapper big-ImageWrapper boxes_img">
                                    <a href="{{route('categories.proffessionnelles','Artisant')}}">
                                    <img class="img-responsive" src="{{asset('users/img/home/artisant3.png')}}" alt="NeedClic" style="height: 200px;">
                                    </a>
                                    
                                </div>
                                <h2 class="title text-center" style="color: DodgerBlue;font-size: 15px;">
                                    <a style="color: DodgerBlue;font-weight: bold" href="{{route('categories.proffessionnelles','Artisant')}}"> {{__('users/home.artisant')}}</a>
                                </h2>
                            </div><!-- end boxes -->
                        
                    </div><!-- end col-lg-4 -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        
                            <div class="first" data-effect="slide-bottom">
                                <div class="ImageWrapper big-ImageWrapper boxes_img">
                                    <a href="{{route('categories.proffessionnelles','Ingénieure')}}">
                                       <img class="img-responsive" src="{{asset('users/img/home/ingenieur3.png')}}" alt="" style="height: 200px;">
                                    </a>                         

                                </div>
                                <h2 class="title text-center" style="color: DodgerBlue;font-size: 15px;">
                                    <a style="color: DodgerBlue;font-weight: bold" href="{{route('categories.proffessionnelles','Ingénieure')}}"> {{__('users/home.ingenieur')}}</a>
                                </h2>
                            </div><!-- end boxes -->
                        
                    </div><!-- end col-lg-4 -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="text-center"  style="color: DodgerBlue;padding-top:0px">
                            <h3 style="color: DodgerBlue;font-weight: bold;">{{__('users/home.boutique')}}</h3>
                        </div>
                            <div class="items">
                            @isset($services)
                                @foreach($services as $key=>$service)
                                 <div>
                                    <a href="{{route('annonces.service',$service->slug)}}">
                                         <img src="{{asset('AnnonceDz/public/Service/'.$service->name.'/'.$service->image)}}" style="height: 200px;">
                                    </a>

                                    <div class=" text-center">
                                        <h2 class="title text-center" style="color: DodgerBlue;font-size: 15px;">
                                            <a style="color: DodgerBlue;font-size: 15px;">
                                <a style="color: DodgerBlue;font-weight: bold" href="{{route('annonces.service',$service->slug)}}"> {{$service->name}}</a>
                                        </h2>
                                    </div>
                                 </div>
                                @endforeach
                            @endisset
                            </div>
                        
                    </div><!-- end col-lg-4 -->
                    
                </div><!-- end row -->
            </div><!-- end dm_container -->
        </div>
    </div>
</section><!-- end mapandslider -->
<section id="one-parallax" class="parallax" style="background-image: url('/users/img/01_parallax.jpeg');"
    data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="mapandslider">
        <div class=" dm-shadow" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        
                        <div class="first" data-effect="slide-bottom">
                            <div class="ImageWrapper big-ImageWrapper boxes_img">
                                <a href="{{route('categories.artisanat','Artisanat')}}">
                                <img class="img-responsive" src="{{asset('users/img/home/artisanatR1.png')}}" alt="NeedClic" >
                                </a>
                            </div>
                            
                            <p class="title text-center" style="color: DodgerBlue;font-size: 15px;">
                                <a style="color: DodgerBlue;font-weight: bold" href="{{route('categories.artisanat','Artisanat')}}"> 
                                {{__('users/home.artisanat')}}
                                 </a>
                            </p>
                           
                        </div><!-- end boxes -->
                        
                    </div><!-- end col-lg-4 -->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        
                        <div class="first" data-effect="slide-bottom">
                            <div class="ImageWrapper big-ImageWrapper boxes_img">
                                <a href="{{route('categories.particulier','Particulier')}}">
                                    <img class="img-responsive" src="{{asset('users/img/home/particulier1.png')}}" alt="NeedClic">
                                </a>
                                
                            </div>
                            <p class="title text-center" style="color: DodgerBlue;font-size: 15px;">
                                <a style="color: DodgerBlue;font-weight: bold" href="{{route('categories.particulier','Particulier')}}"> {{__('users/home.particulier')}}</a>
                            </p>
                        </div><!-- end boxes -->
                        
                    </div><!-- end col-lg-4 -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div id="" class="clearfix">
                            <!-- <div class="itemss">
                                @isset($categoriesBlogs)
                                @foreach($categoriesBlogs as $key=>$category)
                                 <div>
                                    <div class=" text-center">
                                        <h2 class="title text-center">
                                            <a style="color: DodgerBlue;font-weight: bold" href="{{route('blogs.category',$category->slug)}}"> {{$category->name}}</a>
                                        </h2>
                                        <div>
                                            <a href="{{route('blogs.category',$category->slug)}}" style="float:center">
                                                <img src="{{asset('BlogCategories/'.$category->name.'/'.$category->image)}}" style="height: 180px;">
                                            </a>
                                        </div>
                                        
                                        <div class="itemsss">
                                            @isset($category->blogs)
                                            @foreach($category->blogs as $key => $blog)
                                            @isset($blog->attachements)
                                                
                                             <div>
                                                <a href="{{route('blogs.show',$blog->uuid)}}">
                                                  <img src="{{asset('AnnonceDz/public/Blog/'.$blog->titre.'/'.$blog->attachements[0]->file_name)}}" style="height: 180px;">
                                                </a>
                                             </div>
                                             @endisset
                                             @endforeach
                                             @endisset
                                        </div>
                                        
                                    </div>

                                 </div>
                                 @endforeach
                                 @endisset
                                 >
                            </div> -->
                    <div class="itemss">
                            @isset($categoriesBlogs)
                                @foreach($categoriesBlogs as $key=>$category)
                                 <div>
                                    <a href="{{route('blogs.category',$category->slug)}}">
                                         <img src="{{asset('AnnonceDz/public/BlogCategories/'.$category->name.'/'.$category->image)}}" style="height: 220px;">
                                    </a>
                                    <div class=" text-center">
                                        <h2 class="title text-center" style="color: DodgerBlue;font-size: 15px;">
                                            <a style="color: DodgerBlue;font-size: 15px;font-weight:bold" href="{{route('blogs.category',$category->slug)}}"> {{$category->name}}</a>
                                        </h2>
                                    </div>
                                 </div>
                                @endforeach
                            @endisset
                            </div>
                        </div><!-- end property-slider -->
                    </div><!-- end col-lg-8 -->
                </div><!-- end row -->
            </div><!-- end dm_container -->
        </div>
    </div>
</section><!-- end mapandslider -->
<section id="one-parallax" class="parallax" style="background-image: url('/users/img/01_parallax.jpeg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="mapandslider">
            <div class=" dm-shadow" style="padding-top: 15px; padding-bottom: 15px;">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding-bottom: 15px;">
                            <div id="" class="clearfix">
                                <div class="flexslider">
                                    <ul class="slides">
                                        @isset($pubsbas)
                                        @foreach($pubsbas as $key => $pub)
                                        <li>
                                            <!-- <div class="desc">
                                                <div class="slider-pro-desc">
                                                    <h1><a href="#">{{$pub->title}}</a></h1>

                                                    
                                                </div>
                                            </div> -->
                                            <a href="#"><img style="height: 285px" src="{{asset('AnnonceDz/public/Publicite/'.$pub->title.'/'.$pub->image)}}" alt=""></a>
                                        </li>
                                        @endforeach
                                        @endisset
                                    </ul><!-- end slides -->
                                </div><!-- end flexslider -->
                            </div><!-- end property-slider -->
                        </div><!-- end col-lg-8 -->
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div id="" class="clearfix">
                            <div class="flexslider">
                                <ul class="slides">
                                    @isset($users)
                                        @foreach($users as $key => $user)
                                            <li>
                                                <div class="desc">
                                                    <div class="slider-pro-desc">
                                                        <h1><a href="{{route('boutique',$user->uuid)}}">{{$user->name}}</a></h1>

                                                        <a  class="slide-agent" href="{{route('boutique',$user->uuid)}}"><img src="{{asset('AnnonceDz/public/User/'.$user->name.'/'.$user->image)}}" alt="{{$user->name}}"></a>
                                                        @if($user->type_compte == 0)
                                                            <span class="text-info type">
                                                                @isset($user->category)
                                                                    {{$user->category->name}}
                                                                @endisset
                                                            </span>
                                                        @elseif($user->type_compte == 1)
                                                            <span class="text-warning type">
                                                                @isset($user->category)
                                                                    {{$user->category->name}}
                                                                @endisset
                                                            </span>
                                                        @elseif($user->type_compte == 2)
                                                            <span class="text-danger type">
                                                                @isset($user->category)
                                                                    {{$user->category->name}}
                                                                @endisset
                                                            </span>
                                                        @elseif($user->type_compte == 3)
                                                            <span class="text-success type">
                                                                {{DetailUser($user->id) ? DetailUser($user->id)->service->name : "/"}}   
                                                            </span>
                                                        @endif
                                                        <span class="price">
                                                            @isset($user->wilaya)
                                                                {{$user->wilaya->name}}
                                                            @endisset
                                                        </span>
                                                        
                                                    </div>
                                                </div>
                                                <a href="{{route('boutique',$user->uuid)}}"><img src="{{asset('AnnonceDz/public/User/'.$user->name.'/'.$user->img_couverture)}}" alt="" style="height: 280px"></a>
                                            </li>
                                        @endforeach
                                    @endisset
                                </ul><!-- end slides -->
                            </div><!-- end flexslider -->
                        </div><!-- end property-slider -->
                        </div>

                    </div><!-- end row -->
                </div><!-- end dm_container -->
            </div>
        </div>
    </section><!-- end mapandslider -->
<!-- <section id="two-parallax" class="parallax"  data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class=" dm-shadow">
        <div class="container padding-btm40">
            <div class="">
                <div class="text-center clearfix">
                    <h3 class="big_title">{{__('users/home.our_blogs')}} <small>{{__('users/home.blogs_type')}}</small></h3>
                </div>
            </div>
                    <div class="itemss">
	                	@isset($categoriesBlogs)
	                	@foreach($categoriesBlogs as $key=>$category)
					     <div>
					     	<div class="boxes text-center">
					     		<h2 class="title text-center">
	                            	<a style="color: DodgerBlue;font-weight: bold" href="{{route('blogs.category',$category->slug)}}"> {{$category->name}}</a>
	                        	</h2>
	                        	
					     		
					     		<div class="itemsss">
				                	@isset($category->blogs)
				                	@foreach($category->blogs as $key => $blog)
                                    @isset($blog->attachements)
                                        
								     <div>
                                        <a href="{{route('blogs.show',$blog->uuid)}}">
								     	  <img src="{{asset('AnnonceDz/public/Blog/'.$blog->titre.'/'.$blog->attachements[0]->file_name)}}" style="height: 200px;">
                                        </a>
								     </div>
                                     @endisset
								     @endforeach
								     @endisset
								</div>
					     		
					     	</div>

					     </div>
					     @endforeach
					     @endisset
					</div>

           
        </div>
    </div>
</section> -->
@endsection

@section('script')
 
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
$('.itemss').slick({
dots: true,
infinite: true,
speed: 800,
autoplay: false,
autoplaySpeed: 2000,
slidesToShow: 2,
slidesToScroll: 2,
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 2,
slidesToScroll: 2,
infinite: true,
dots: true
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 2,
slidesToScroll: 2
}
},
{
breakpoint: 480,
settings: {
slidesToShow: 2,
slidesToScroll: 2
}
}

]
});


$('.items').slick({
dots: true,
infinite: true,
speed: 800,
autoplay: true,
autoplaySpeed: 2000,
slidesToShow: 4,
slidesToScroll: 4,
responsive: [
{
breakpoint: 1024,
settings: {
slidesToShow: 3,
slidesToScroll: 3,
infinite: true,
dots: true
}
},
{
breakpoint: 600,
settings: {
slidesToShow: 2,
slidesToScroll: 2
}
},
{
breakpoint: 480,
settings: {
slidesToShow: 2,
slidesToScroll: 2
}
}

]
});

$('.itemsss').slick({
    dots: true,
    infinite: true,
    speed: 800,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 2,
    slidesToScroll: 2,
    responsive: [
        {
        breakpoint: 1024,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
            }
        },
        {
        breakpoint: 600,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
                }
        }

        ]
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
