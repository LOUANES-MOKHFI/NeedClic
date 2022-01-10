@extends('users.layouts.master')
@section('title')
	{{__('users/annonce.all_annonces')}}
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

<div class="col-lg-12">
    <div style="float: left;">
		<ul class="breadcrumb">
        	<li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
        	<li>{{__('users/annonce.all_annonces')}}</li>
    	</ul>
	</div>
	
    
</div>
<section class="generalwrapper dm-shadow clearfix">
	<div class="container">
	    <div class="row">
	        <div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
	        	 <div class="title">
	                       @isset($annonces)
	                        @if($annonces->count()==0)
								<div class="alert alert-danger text-center" id="msg">
									@isset($service)
									Aucun annonce existe dans ce service
									@endisset
									@isset($type)
									Aucun annonce existe dans ce type
									@endisset
									@isset($category)
									Aucun annonce existe dans cette categorie
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
			                            <img class="img-responsive" src="{{asset('AnnonceDz/public/Annonces/'.$annonce->titre.'/'.$annonce->attachements[0]->file_name)}}" alt="{{$annonce->titre}}">
			                        	</a>
			                            
			                           

			                            <!-- <div class="box_type">{{$annonce->prix}} DA</div> -->
			                            <!-- <span class="status_type orange"><span class="text">
			                            	
			                            </span></span> -->
			                        </div>
			                        <h2 class="title">
			                        	@if(Auth::check())
			                        	@if($annonce->user->type_compte == 1)
			                        		
                                   			<a  href="#" class="Like nav-link" data-uuid="{{$annonce->user->uuid}}" data-annonce_id="{{$annonce->id}}" data-user_uuid="{{Auth::user()->uuid}}" title="J'aime">
		                                      	<i class="fa fa-heart ann{{$annonce->id}} @if(in_array($annonce->id, $usersLike) ) red @endif}} "
		                                      	 style="font-size: 20px"></i>
		                                 	</a>
		                              

                                   		@endif
                                   		@endif

			                            <a style="color: DodgerBlue;font-weight: bold" href="{{route('annonces.show',$annonce->uuid)}}"> {{$annonce->titre}}</a>
			                            <!-- <small class="small_title">{{$annonce->user->wilaya->name}}</small> -->
			                            <a class="box-agent-icon" href="{{route('boutique',$annonce->user->uuid)}}"><img style="width: 35px;height: 35px" src="{{asset('AnnonceDz/public/User/'.$annonce->user->name.'/'.$annonce->user->image)}}" alt="{{$annonce->user->name}}"></a>
			                        </h2>
			                    </div><!-- end boxes -->
			                </div>
			            @endforeach
			        @endisset

	            </div>

	        </div><!-- end content -->

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