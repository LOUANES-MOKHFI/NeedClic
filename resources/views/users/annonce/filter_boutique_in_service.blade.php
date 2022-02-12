@extends('users.layouts.master')
@section('title')
	@isset($service) {{$service->name}} @endisset
@endsection
@section('style')
<style type="text/css">
	.show-menu-arrow option{
		color: black;
	}
	 @media(max-width: 767px){
        .big-ImageWrapper img{
            height: 150px;
        }
    }
    @media(min-width: 767px){
        .big-ImageWrapper img{
            
        }
</style>
@endsection
@section('content')
    @include('users.includes.publicite.publicite')

<div class="col-lg-12 parallax" id="one-parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div style="float: left;">
		<ul class="breadcrumb">
        	<li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
        	<li>@isset($service) {{$service->name}} @endisset </li>
    	</ul>
	</div>
	<div style="float: right;">
		<a class="btn btn-bordered btn-info" style="background-color: black;margin: 3px" href="#" id="" data-toggle="modal" data-target="#filter" ><i class="fa fa-filter" ></i> FILTRER PLUS</a>
	</div>
    
</div>
<section class="generalwrapper dm-shadow clearfix parallax" id="one-parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
	<div class="container">
	    <div class="row">
	        <div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
	            <div class="clearfix">
	            	@if($users->count() == 0)
	            		<div class="col-md-12 boxes">
			        		<div class="alert alert-danger text-center" id="msg">
								Aucun Boutique existe dans cette categorie
							</div>
			        	</div>
	            	@endif
	            	@isset($users)
	            		@foreach($users as $key=> $user)
			                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
			                    <div class="boxes first" data-effect="slide-bottom">
			                        <div class="ImageWrapper big-ImageWrapper boxes_img">
			                        	<a href="{{route('boutique',$user->uuid)}}">
			                            <img class="img-responsive" src="{{asset('AnnonceDz/public/User/'.$user->id.'/'.$user->image)}}" alt="{{$user->name}}">
			                        	</a>
			                        </div>
			                        <h2 class="title">
			                            <a style="color: black;font-weight: bold" href="{{route('boutique',$user->uuid)}}"> {{$user->name}}</a>
			                            <small class="small_title">
			                            	<div class="my-rating" data-rating="{{$user->avg_rating}}" data-uuid="{{$user->uuid}}" data-id="{{$user->id}}"></div>
			                            </small>
			                            <a class="box-agent-icon" href="{{route('boutique',$user->uuid)}}"><img style="width: 35px;height: 35px" src="{{asset('AnnonceDz/public/User/'.$user->id.'/'.$user->img_couverture)}}" alt="{{$user->name}}"></a>
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
@endsection