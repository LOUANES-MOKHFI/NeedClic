@extends('users.layouts.master')
@section('title')
	{{__('users/annonce.all_annonces')}}
@endsection
@section('style')
<style type="text/css">
	.show-menu-arrow option{
		color: black;
	}
	.red{
		color: red;
	}
</style>
@endsection
@section('content')
    @include('users.includes.publicite.publicite')
    @include('users.includes.filter.filter_boutique')
    @include('users.includes.filter.filter_particulier')
    @include('users.includes.filter.filter_artisanat')
    @include('users.includes.modal.UnAuthLike')
    
<div class="col-lg-12 parallax"  id="one-parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
	<div style="float: left;">
		<ul class="breadcrumb">
        	<li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
        	<li>{{__('users/annonce.all_annonces')}}</li>
    	</ul>
	</div>
	<div style="float: right;">
		@isset($service)
			<a class="btn btn-bordered btn-info" style="background-color: DodgerBlue;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter_boutique" ><i class="fa fa-filter" ></i> FILTRER PLUS</a>
		@endisset

		@isset($category)
			@if($category->category_compte == 1)
				<a class="btn btn-bordered btn-info" style="background-color: DodgerBlue;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter_particulier" ><i class="fa fa-filter" ></i> FILTRER PLUS</a>
			@elseif($category->category_compte == 3)
				<a class="btn btn-bordered btn-info" style="background-color: DodgerBlue;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter_artisanat" ><i class="fa fa-filter" ></i> FILTRER PLUS</a>
			
			@elseif($category->category_compte == 2)
				<a class="btn btn-bordered btn-info" style="background-color: DodgerBlue;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter_artisant" ><i class="fa fa-filter" ></i> FILTRER PLUS</a>
			@elseif($category->category_compte == 4)
				<a class="btn btn-bordered btn-info" style="background-color: DodgerBlue;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter_ing" ><i class="fa fa-filter" ></i> FILTRER PLUS</a>
			@endif
			
		@endisset
		
	</div>
    
</div>
<section class="generalwrapper dm-shadow clearfix parallax"  id="one-parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
	<div class="container">
	    <div class="row">
	        <div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
	        	 <div class="title">
	                       	@isset($annonces)
	                        @if($annonces->count()==0)
								<div class="alert alert-danger text-center" id="msg">
									@isset($service)
									Aucune annonce n'existe dans cette catégorie
									@endisset
									@isset($type)
									Aucun annonce existe dans ce type
									@endisset
									@isset($category)
									Aucune annonce n'existe dans cette catégorie
									@endisset
								</div>
							@endif
							@endisset
	                    </div>
	            <div class="clearfix">

	            	@isset($annonces)
	            		@foreach($annonces as $key=> $annonce)
			                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
			                    <div class="boxes first" data-effect="slide-bottom">
			                        <div class="ImageWrapper big-ImageWrapper boxes_img">
			                        	<a href="{{route('annonces.show',$annonce->uuid)}}">
			                            <img class="img-responsive" src="{{asset('AnnonceDz/public/Annonces/'.$annonce->id.'/'.$annonce->attachements[0]->file_name)}}" alt="{{$annonce->titre}}">
			                        	</a>
			                           

			                            <!-- <div class="box_type">{{$annonce->prix}} DA</div> -->
			                            <!-- <span class="status_type orange"><span class="text">
			                            	
			                            </span></span> -->
			                        </div>
			                        <h2 class="title">
			                        	@if($annonce->user->type_compte == 1)
				                        	@if(Auth::check())
	                                   			<a  href="#" class="Like nav-link" data-uuid="{{$annonce->user->uuid}}" data-annonce_id="{{$annonce->id}}" data-user_uuid="{{Auth::user()->uuid}}" title="J'aime">
			                                      	<i class="fa fa-heart ann{{$annonce->id}} @if(in_array($annonce->id, $usersLike) ) red @endif}} "
			                                      	 style="font-size: 20px"></i>
			                                 	</a>
			                                @else
			                                	<a  href="#" data-toggle="modal" data-target="#unAuthLike" class="unAuth" title="J'aime">
			                                      	<i class="fa fa-heart "
			                                      	 style="font-size: 20px"></i>
			                                 	</a>
	                                   		@endif
                                   		@endif
			                            <a style="color: DodgerBlue;font-weight: bold" href="{{route('annonces.show',$annonce->uuid)}}"> {{$annonce->titre}}</a>
			                            <!-- <small class="small_title">{{$annonce->user->wilaya->name}}</small> -->
			                            <a class="box-agent-icon" href="{{route('boutique',$annonce->user->uuid)}}"><img src="{{asset('AnnonceDz/public/User/'.$annonce->user->id.'/'.$annonce->user->image)}}" style="width: 35px;height: 35px" alt="{{$annonce->user->name}}"></a>
			                        </h2>
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
<script type="text/javascript">
	$(document).on('click', '.unAuth', function () {

         $('.UnAuthLike').css('display','block');
        
    })
</script>
<script type="text/javascript">
	$(document).on('click', '.Like', function () {

        var compte_uuid;
        var annonce_id;
        compte_uuid = $(this).attr('data-uuid');
        
        annonce_id = $(this).attr('data-annonce_id');
        
        var user_uuid = $(this).attr('data-user_uuid');
       
        $('.ann'+annonce_id).css('color','red');
        //alert(uuid);
        Like(compte_uuid,user_uuid,annonce_id);
    })

    function Like(compte_uuid,user_uuid,annonce_id){
        $.ajax({
            type: "GET",
            url:"/compte-like/"+compte_uuid+"/"+user_uuid+"/"+annonce_id,
            success:function(response){
                status = response.status;
                if(status == 200){
                	//alert('Success');
                	$('.ann'+annonce_id).css('color','red');
                }else{
                	if(status == 201){
	                	//alert('Success');
	                	$('.ann'+annonce_id).css('color','#F6700E');
	                }
	            }
            }
        });
    }
</script>
@endsection