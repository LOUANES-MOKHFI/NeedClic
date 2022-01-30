@extends('users.layouts.master')
@section('title')
	@isset($service) {{$service->name}} @endisset
	@isset($type) {{$type}} @endisset
	

@endsection
@section('style')
<style type="text/css">
	.show-menu-arrow option{
		color: black;
	}
</style>
@endsection
@section('content')
<section id="one-parallax" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('/users/img/breadcrumb.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="overlay1 dm-shadow">
        <div class="container">
            <div class="post-wrapper-top-shadow">
                <span class="s1"></span>
            </div>
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
                    <li>{{__('users/annonce.all_annonces')}}</li>
                </ul>
                <h2>@isset($service) {{$service->name}} @endisset
					@isset($type) {{$type}} @endisset

                </h2>
            </div>
        </div>
    </div>
</section>
<section class="generalwrapper dm-shadow clearfix">
	<div class="container">
	    <div class="row">
	        <div id="content" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix">
	            <div class="clearfix">
	            	@isset($annonces)
	            		@foreach($annonces as $key=> $annonce)
			                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
			                    <div class="boxes first" data-effect="slide-bottom">
			                        <div class="ImageWrapper big-ImageWrapper boxes_img">
			                            <img class="img-responsive" src="{{asset('AnnonceDz/public/Annonces/'.$annonce->id.'/'.$annonce->attachements[0]->file_name)}}" alt="{{$annonce->titre}}">
			                            <div class="ImageOverlayH"></div>
			                            <div class="Buttons StyleSc">
			                                <span class="WhiteSquare">
			                                    <a class="fancybox" href="{{asset('AnnonceDz/public/Annonces/'.$annonce->id.'/'.$annonce->attachements[0]->file_name)}}"><i class="fa fa-search"></i></a>
			                                </span>
			                                <span class="WhiteSquare">
			                                    <a href="{{route('annonces.show',$annonce->uuid)}}"><i class="fa fa-link"></i></a>
			                                </span>

			                            </div>
			                            <div class="Shortcuts">
			                                <button class="Shortcuts-share has_tooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="Share this listing"></button>
			                                <button class="Shortcuts-fav has_tooltip" data-toggle="tooltip" data-placement="bottom" data-riginal-title="Save to favorites"></button>
			                                <button class="Shortcuts-hide has_tooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="Hide property"></button>
			                            </div>

			                            <div class="box_type">{{$annonce->prix}} DA</div>
			                            {{-- <span class="status_type orange"><span class="text">Sale</span></span> --}}

			                        </div>
			                        <h2 class="title">
			                            <a href="{{route('annonces.show',$annonce->uuid)}}"> {{$annonce->titre}}</a>
			                            <small class="small_title">{{$annonce->user->wilaya->name}}</small>
			                            <a class="box-agent-icon" href="{{route('boutique',$annonce->user->uuid)}}"><img src="{{asset('User/'.$annonce->user->name.'/'.$annonce->user->image)}}" alt="{{$annonce->user->name}}"></a>
			                        </h2>

			                        <div class="boxed_mini_details1 clearfix">
			                            <span class="garage first"><strong>Garage</strong><i class="icofont icofont-car-alt-4"></i> 1</span>
			                            <span class="bedrooms"><strong>Beds</strong><i class="icofont icofont-bed"></i> 4</span>
			                            <span class="status"><strong>Baths</strong><i class="icofont icofont-bathtub"></i>2</span>
			                            <span class="sqft last"><strong>Area</strong><i class="icofont icofont-loop"></i> 325</span>
			                        </div>
			                    </div><!-- end boxes -->
			                </div>
			            @endforeach
			        @endisset

	            </div>

	            <div class="pagination_wrapper clearfix">
	                <!-- Pagination Normal -->
	                <ul class="pagination">
	                    {{$annonces->links()}}
	                </ul>
	            </div>

	        </div><!-- end content -->

	        <div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 last clearfix">
	            <div class="widget clearfix">
	                <div class="preperty_search ">
	                    <div class="title">
	                         <h3>{{__('users/annonce.advenced_search')}}</h3>
	                        @if(session()->has('error'))
								<div class="alert alert-danger text-center" id="msg">
									{{ session()->get('error') }}
								</div>
							@endif
	                    </div>
	                    
	                    <div class="search-section serach-widget clearfix boxes">
	                        <form id="advanced_search" action="{{route('annonces.filtre')}}" class="clearfix row" name="advanced_search" method="get">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="type">{{__('users/annonce.type_annonce')}}</label>
                                    <select id="type" class="show-menu-arrow selectpicker" name="type">
                                    	<option value="" > -- {{__('users/annonce.type_annonce')}} -- </option>
                                        <option value="3">{{__('users/auth.boutique')}}</option>
                                        <option value="2">{{__('users/auth.proffessionnelle')}}</option>
                                        <option value="1">{{__('users/auth.artisanat')}}</option>
                                        <option value="0">{{__('users/auth.particulier')}}</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="categories">{{__('users/annonce.categorie')}}</label>
                                    <select id="categories" class="show-menu-arrow selectpicker" name="Category">
                                    	<option value="" > -- {{__('users/annonce.categorie')}} -- </option>
                                        @isset($categories)
                                    	@foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <label for="location">{{__('users/annonce.wilaya')}}</label>
                                    <select id="wilaya_id" name="wilaya" class="show-menu-arrow form-control">
                                    	<option value="" > -- {{__('users/annonce.wilaya')}} -- </option>
                                    	@isset($wilayas)
                                    	@foreach($wilayas as $wilaya)
                                        	<option value="{{$wilaya->id}}">{{$wilaya->name}}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 commune" style="display: none">
                                   <label for="location">{{__('users/annonce.commune')}}</label>
                                    <select id="commune_id" class="show-menu-arrow form-control" name="commune">
                                    	<option value="" >-- {{__('users/annonce.commune')}} --</option>
                                    </select>
                                </div>

                               
                                <div class="clearfix"></div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-inverse btn-block"><i class="icofont icofont-home-search"></i> {{__('users/annonce.search')}}</button>
                                </div>
                            </form>
	                    </div><!-- end search module -->
	                </div>
	            </div>
	            <!--Loan calculator  -->
	            
	           
	            <div class="widget sidebar_agent clearfix">
	                <div class="title">
	                    <h3>{{__('users/annonce.new_annonce')}}</h3>
	                </div>                           
	                <div class=" slider_box">
	                    <div id="myCarousel12" class="carousel slide" data-ride="carousel">
	                        <div class="carousel-inner" role="listbox">
	                        	@isset($newsAnnonces)
	                        		@foreach($newsAnnonces as $key=> $annonce)
			                            <div class="item @if($key==0) active @endif">
			                                <div class="singleTeam text-center">
			                                    <div class="teamImg">
			                                        <img style="height: 250px" src="{{asset('Annonces/'.$annonce->id.'/'.$annonce->attachements[0]->file_name)}}" alt="{{$annonce->titre}}">
			                                    </div>
			                                    <div class="teamDet">
			                                        <h3>{{$annonce->titre}}</h3>
			                                        <p>{{$annonce->category->name}}</p>
			                                    </div>
			                                </div>
			                            </div>
	                            	@endforeach
	                            @endisset

	                        </div> <!-- End .carousel-inner -->
	                    </div>
	                    <!-- Left and right controls -->
	                    <a class="carousel_control left" href="#myCarousel12" role="button" data-slide="prev">
	                        <i class="fa fa-angle-left"></i>
	                        <span class="sr-only">Previous</span>
	                    </a>
	                    <a class="carousel_control right" href="#myCarousel12" role="button" data-slide="next">
	                        <i class="fa fa-angle-right"></i>
	                        <span class="sr-only">Next</span>
	                    </a>
	                </div> <!-- End .slider_box -->
	            </div>
	            
	        </div><!-- end sidebar -->

	    </div><!-- end row -->
            </div><!-- end container -->
        </section>

@endsection


@section('script')
<script src="{{asset('admin/assets/scripts/jquery.min.js')}}"></script>

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