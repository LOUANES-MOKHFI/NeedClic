@extends('users.layouts.master')
@section('title')
	{{$annonce->titre}}
@endsection
@section('style')

@endsection
@section('content')
    @include('users.includes.publicite.publicite')

<div class="col-lg-12">
    

    <div style="float: left;">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
            <li><a href="{{route('annonces')}}">{{__('users/annonce.all_annonces')}}</a></li>
            <li>{{$annonce->titre}}</li>
        </ul>
        <h2>{{$annonce->titre}}</h2>
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
                            	
                            	@foreach($attachements as $key=>$image)
                                <li><img class="img-thumbnail" style="height: 400px" src="{{asset('AnnonceDz/public/Annonces/'.$annonce->titre.'/'.$image->file_name)}}" alt="{{$annonce->titre}}"></li>
                                @endforeach
                               
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider clearfix">
                            <ul class="slides">
                            	@isset($attachements)
                            	@foreach($attachements as $key=>$image)
                                <li><img class="img-thumbnail" src="{{asset('AnnonceDz/public/Annonces/'.$annonce->titre.'/'.$image->file_name)}}" alt="{{$annonce->titre}}"></li>

                                @endforeach
                                @endisset
                            </ul>
                        </div> 
                    </div><!-- boxes_img -->
                    <hr>
                    <div class="row">
                        <div class="col-lg-7">

                            <div class="listing-detail-section" id="listing-detail-section-description">
                                <h2 class="page-header">{{__('users/annonce.description')}}</h2>        
                                <p>{!! Html_entity_decode($annonce->description)!!}</p>
                            </div><!-- /.listing-detail-section -->
                        </div><!-- /.col-* -->
                        <div class="col-lg-5">
                            <div class="overview">
                                <div class="listing-detail-section" id="listing-detail-section-attributes">
                                    <h2 class="page-header">{{__('users/annonce.details')}}</h2>

                                    <div class="listing-detail-attributes">
                                        <ul>
                                            <li class="listing_property_year_built">
                                                <strong class="key">
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
                                                </strong>
                                            </li>
                                            <li class="listing_property_agent">
                                                <strong class="key">Annonce</strong>
                                                <span class="value">
                                                    {{$annonce->titre}}
                                                </span>
                                            </li>
                                        	<li class="listing_property_agent">
                                                <strong class="key">{{__('users/annonce.type')}}</strong>
                                                <span class="value">
                                                	@if($annonce->user->type_compte == 0)
                                                	<a href="{{route('boutique',$annonce->user->uuid)}}">
									                    <span class="text-info">
									                        {{$annonce->user->category ? $annonce->user->category->name : '/'}}
									                    </span>
									                </a>
									                @elseif($annonce->user->type_compte == 1)
									                <a href="{{route('boutique',$annonce->user->uuid)}}">
									                    <span class="text-warning">
									                        {{$annonce->user->category ? $annonce->user->category->name : '/'}}
									                    </span>
									                </a>
									                @elseif($annonce->user->type_compte == 2)
									                <a href="{{route('boutique',$annonce->user->uuid)}}">
									                    <span class="text-danger">
									                       {{$annonce->user->category ? $annonce->user->category->name : '/'}}  
									                    </span>
									                </a>
									                @elseif($annonce->user->type_compte == 3)
									                <a href="{{route('boutique',$annonce->user->uuid)}}">
									                    <span class="text-success">
                                                            {{DetailUser($annonce->user->id) ? DetailUser($annonce->user->id)->service->name : "/"}} 
									                    </span>
									                </a>
									                @endif
                                                </span>
                                            </li>
                                            <li class="price">
                                                <strong class="key">Nom de la boutique</strong>
                                                <span class="value"><a href="{{route('boutique',$annonce->user->uuid)}}">{{$annonce->user->name}}</a></span>
                                            </li>
                                            <li class="price">
                                                <strong class="key">{{__('users/annonce.prix')}}</strong>
                                                <span class="value"><span class="big-price">{{$annonce->prix}} DA</span></span>
                                            </li>
                                            @if($annonce->user->type_compte == 2)
                                            <li class="listing_property_type">
                                                <strong class="key">Type de Compte</strong>
                                                <span class="value">{{$annonce->detail->type_compte_proff}}</span>
                                            </li>
                                            @endif
                                            <li class="listing_property_reference">
                                                <strong class="key">{{__('users/annonce.negociable')}}</strong>
                                                <span class="value">
                                                	@if($annonce->is_negociable == 0)
									                    <span class="text-danger">
									                        {{__('users/annonce.notNegociable')}}
									                    </span>
									                @elseif($annonce->user->type_compte == 3)
									                    <span class="text-success">
									                        {{__('users/annonce.negociable')}}
									                    </span>
									                @endif
                                                </span>
                                            </li>
                                            <li class="listing_property_year_built">
                                                <strong class="key">{{__('users/annonce.categorie')}}</strong>
                                                @if($annonce->user->type_compte == 3)
                                                    <a href="#"><span class="value">
                                                    @if(DetailUser($annonce->user_id)->count()>0)
                                                        {{DetailUser($annonce->user_id)->service->name}}
                                                    @endif</span></a>
                                                @else
                                                    <a href="#"><span class="value">{{$annonce->category->name}}</span></a>
                                                @endif
                                            </li>
                                            <li class="listing_property_year_built">
                                                <strong class="key">{{__('users/annonce.wilaya')}}</strong>
                                               	<span class="value">{{$annonce->user->wilaya->name}}</span>
                                            </li>
                                            <li class="listing_property_year_built">
                                                <strong class="key">{{__('users/annonce.commune')}}</strong>
                                                <span class="value">{{$annonce->user->commune->name}}</span>
                                            </li>
                                            <li class="listing_property_year_built">
                                                <strong class="key">{{__('users/annonce.phone')}}</strong>
                                                <span class="value">
                                                    <span> <a id="num" href="tel:{{$annonce->user->num_tlfn}}"><i class="spanNum" style="display:inline;"></i><i class="spanNum1" style="display:inline;padding-left:-10px;background-color: rgba(0,0,255,0.3);color: transparent;"></i>Appeler</a>  </span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div><!-- /.listing-detail-attributes -->
                                </div><!-- /.listing-detail-section -->
                            </div><!-- /.overview -->
                        </div><!-- /.col-* -->

                        
                    </div>
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
<script type="text/javascript">
    $( document ).ready(function() {
        //console.log( "ready!" );
        var num = $("#num").attr('href');
       // console.log(num);
        //console.log(num.substring(4, 8));
        newNum = num.substring(4, 8);
        newNum1 = num.substring(8, 18);
        //$('.spanNum').html(newNum);
        //$('.spanNum1').html(newNum1);
    });
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
