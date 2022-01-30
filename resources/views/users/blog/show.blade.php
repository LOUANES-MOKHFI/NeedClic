@extends('users.layouts.master')
@section('title')
   {{$blog->titre}}
@endsection
@section('style')

@endsection
@section('content')


<div class="col-lg-12 parallax" id="one-parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <ul class="breadcrumb">
        <li><a href="{{route('home')}}">{{__('users/blog.home')}}</a></li>
        <li><a href="{{route('blogs')}}">{{__('users/blog.all_blogs')}}</a></li>
        <li>{{$blog->titre}}</li>
    </ul>
</div>
<section class="generalwrapper dm-shadow clearfix parallax" id="one-parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
            <div class="container">
                <div class="row"> 
                    <div id="content" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix">
                        <div class="blog_container   boxes clearfix">
                            <div class="boxes_img">
                                <div id="slider" class="flexslider clearfix">
                                    <ul class="slides">
                                        @isset($blog->attachements)
                                        @foreach($blog->attachements as $key=>$image)
                                        <li><img class="img-thumbnail" style="height: 400px" src="{{asset('AnnonceDz/public/Blog/'.$blog->id.'/'.$image->file_name)}}" alt="{{$blog->titre}}"></li>
                                        @endforeach
                                        @endisset
                                    </ul>
                                </div>
                                <div id="carousel" class="flexslider clearfix">
                                    <ul class="slides">
                                        @isset($blog->attachements)
                                        @foreach($blog->attachements as $key=>$image)
                                        <li><img class="img-thumbnail" src="{{asset('AnnonceDz/public/Blog/'.$blog->id.'/'.$image->file_name)}}" alt="{{$blog->titre}}"></li>

                                        @endforeach
                                        @endisset
                                    </ul>
                                </div> 
                                <article class="blog-wrap">
                                    
                                    <div class="post-date">
                                        <span class="day">{{date_format($blog->created_at,'d')}}</span>
                                        <span class="month">{{date_format($blog->created_at,'M')}}</span>
                                    </div><!-- end post-date -->

                                    <div class="post-content">
                                        <div class="title"><h2><a href="single-blog.html">{{$blog->titre}}</a></h2></div>

                                        <div class="post-meta">
                                            <span><i class="fa fa-user"></i> <a href="{{route('blogs.category',$blog->category->slug)}}">{{$blog->category->name}}</a> </span>
                                        </div><!-- end post-meta -->

                                        <p>{!!html_entity_decode($blog->description)!!}</p>


                                    </div><!-- post-content -->
                                </article><!-- end blog wrap -->
                            </div><!-- boxes_img -->                            
                            <hr>
                            <p>{!!html_entity_decode($blog->description)!!}</p>
                        </div><!-- end property_wrapper -->

                    </div><!-- end content -->
                     <div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 last clearfix">    
                        <div class="widget clearfix">
                            <div class="search_widget">
                                <div class="title"><h3> {{__('users/blog.search_blog')}}</h3></div>
                                <form action="{{route('blogs.search')}}" method="get">
                                    <input type="text" name="title" class="form-control" placeholder="{{__('users/blog.search_blog')}}">     
                                </form><!-- end search form -->
                            </div><!-- end search_widget -->
                        </div><!-- end widget -->

                        <div class="widget clearfix">
                            <div class="title"><h3>{{__('users/blog.categorie')}}</h3></div>
                            <ul class="list">
                                @isset($categories)
                                    @foreach($categories as $category)
                                        <li><a title="" href="{{route('blogs.category',$category->slug)}}">{{$category->name}}</a></li>
                                    @endforeach
                                @endisset
                                
                            </ul>
                        </div><!-- end widget --> 

                        <!-- <div class="widget sidebar_agent clearfix">
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
                                                        <img style="height: 250px" src="{{asset('AnnonceDz/public/Blog/'.$blog->titre.'/'.$blog ->image)}}" alt="{{$blog->titre}}">
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
                        </div> -->

                        <!--FEATURED PROPERTIES -->
                      

                    </div><!-- end sidebar -->

                   
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->

@endsection

@section('script')
<script src="{{asset('users/js/jquery.flexslider.js')}}"></script>
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
        </script>
@endsection
