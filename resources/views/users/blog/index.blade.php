@extends('users.layouts.master')
@section('title')
   {{__('users/blog.all_blogs')}}
@endsection
@section('style')

@endsection
@section('content')
    @include('users.includes.filter.filter_blog')

<div class="col-lg-12">
    <div style="float: left;">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('users/blog.home')}}</a></li>
            <li>{{__('users/blog.all_blogs')}}</li>
        </ul>
    </div>
    <div style="float: right;">
            <a class="btn btn-bordered btn-info" style="background-color: DodgerBlue;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter_blog" ><i class="fa fa-filter" ></i> FILTREZ PLUS</a>

        
        
    </div>
    
</div>
<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
        <div class="row">

            <div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
            	@isset($blogs)
                <div class="blog_container clearfix">
                	
                	@foreach($blogs as $key=>$blog)

	                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"  style="margin-bottom:20px ">
	                        <article class="blog-wrap">
	                            <div class="ImageWrapper blog-media">
                                    @isset($blog->attachements)
	                                <img class="img-responsive immg" src="{{asset('AnnonceDz/public/Blog/'.$blog->titre.'/'.$blog->attachements[0]->file_name)}}"  alt="">
                                    @endisset
	                                <div class="ImageOverlayH"></div>
	                                <div class="Buttons StyleMg">
                                        @isset($blog->attachements)
	                                    <span class="WhiteSquare"><a class="fancybox" href="{{asset('AnnonceDz/public/Blog/'.$blog->titre.'/'.$blog->attachements[0]->file_name)}}"><i class="fa fa-search"></i></a></span>
                                         @endisset
	                                    <span class="WhiteSquare"><a href="{{route('blogs.show',$blog->uuid)}}"><i class="fa fa-link"></i></a></span>
	                                </div>
	                            </div><!-- end blog media -->
	                            <div class="post-date">
	                                <span class="day">{{date_format($blog->created_at,'d')}}</span>
                                    <span class="month">{{date_format($blog->created_at,'M')}}</span>
	                            </div><!-- end post-date -->

	                            <div class="post-content">
	                                <h2><a href="{{route('blogs.show',$blog->uuid)}}">{{$blog->titre}}</a></h2>

	                            </div><!-- post-content -->
	                        </article><!-- end blog wrap -->
	                    </div><!-- end col-lg-6 -->
                        @if($key!= 0 && $key%3 == 0)
                        <br><br><br><br>
                        @endif
                    @endforeach

                </div><!-- end row -->

                <div class="pagination_wrapper clearfix">
                    <!-- Pagination Normal -->
                    <ul class="pagination">
                        {{$blogs->links()}}
                    </ul>
                </div>
                @endisset

            </div><!-- end content -->

            <!-- <div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 last clearfix">    

               <div class="widget sidebar_agent clearfix">
                    <div class="title">
                        <h3>{{__('users/blog.new_blog')}}</h3>
                    </div>                           
                    <div class=" slider_box">
                        <div id="myCarousel12" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
		                        @isset($newsBlogs)
		                        	@foreach($newsBlogs as $key => $blog)
		                            <div class="item @if($key==0) active @endif">
		                                <div class="singleTeam text-center">
		                                    <div class="teamImg">
                                                @isset($blog->attachements)
		                                        <img style="height: 250px" src="{{asset('AnnonceDz/public/Blog/'.$blog->titre.'/'.$blog->attachements[0]->file_name)}}" alt="{{$blog->titre}}">
                                                @endisset
		                                    </div>
		                                    <div class="teamDet">
		                                        <h3>{{$blog->titre}}</h3>
		                                        <p>{{$blog->category->name}}</p>
		                                    </div>
		                                </div>
		                            </div>
                                	@endforeach
                                @endisset
                            </div> 
                        </div>
                        
                        <a class="carousel_control left" href="#myCarousel12" role="button" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel_control right" href="#myCarousel12" role="button" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div> 
                </div>

              

            </div> -->

        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end generalwrapper -->

@endsection

@section('script')
        <script>
            $(window).load(function () {
                $('#slider').flexslider({
                    animation: "fade",
                    controlNav: false,
                    animationLoop: true,
                    slideshow: true,
                    sync: "#carousel"
                });
            });
        </script>

@endsection
