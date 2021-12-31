@extends('admin.layouts.admin')
@section('title')
{{__('admin/members.show_user')}}
@endsection
@section('style')
 <link href="{{asset('users/css/star-rating-svg.css')}}" rel="stylesheet">

	<style type="text/css">
		.type{
			font-size: 21px;
			font-weight: bold
		}
	</style>
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                	@isset($user)
						<div class="row small-spacing">
				            <!-- /.col-md-3 col-xs-12 -->
				            <div class="col-md-12 col-xs-12">
				                <div class="row">
				                    <div class="col-xs-12">
				                        <div class="box-content card">
				                            <h4 class="box-title"><i class="fa fa-user ico"></i>{{$user->name}}</h4>
				                            <!-- /.box-title -->
				                            <!-- /.dropdown js__dropdown -->
				                            <div class="card-content">
				                            		<div class="row">
				                            			<div class="col-md-6">
				                            				<label>{{__('admin/annonces.image_profile')}}</label><br>
				                            				<img src="{{asset('AnnonceDz/public/User/'.$user->name.'/'.$user->image)}}" style="height: 100px;width: 200px;">
				                            			</div>
				                            			<div class="col-md-6">
				                            				<label>{{__('admin/annonces.image_couverture')}}</label><br>
				                            				<img src="{{asset('AnnonceDz/public/User/'.$user->name.'/'.$user->img_couverture)}}" style="height: 100px;width: 200px;">
				                            			</div>
				                            			<div class="col-md-12">
				                            				<div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/members.type')}}:</label></div>
					                                            <div class="col-xs-7">
					                                            	@if($user->type_compte == 0)
						                                                <span class="text-info type">
						                                                    Particulier
						                                                </span>
						                                            @elseif($user->type_compte == 1)
						                                                <span class="text-warning type">
						                                                    Artisant créateur
						                                                </span>
						                                            @elseif($user->type_compte == 2)
						                                                <span class="text-danger type">
						                                                     @if(DetailUser($user->id))
						                                                        {{$user->category->name.' '.DetailUser($user->id)->type_compte_proff}}
						                                                    @endif
						                                                </span>
						                                            @elseif($user->type_compte == 3)
						                                                <span class="text-success type">
						                                                    Boutique
						                                                </span>
						                                            @endif
					                                            </div>
					                                        </div>
				                            			</div>
				                            		</div>
				                            		<hr>
				                                	<div class="row">
					                                    <div class="col-md-6">
					                                        <div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/members.name')}}:</label></div>
					                                            <div class="col-xs-7">{{$user->name}}</div>
					                                        </div>
					                                    </div>
					                                   
					                                    <div class="col-md-6">
					                                        <div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/members.email')}}:</label></div>
					                                            <div class="col-xs-7">{{$user->email}}</div>
					                                        </div>
					                                    </div>
				                                    </div>
				                                    <hr>
				                                    <div class="row">
					                                    <div class="col-md-6">
					                                        <div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/members.wilaya')}}:</label></div>
					                                            <div class="col-xs-7">{{$user->wilaya->name}}</div>
					                                        </div>
					                                    </div>
					                                    <div class="col-md-6">
					                                        <div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/members.commune')}}:</label></div>
					                                            <div class="col-xs-7">{{$user->commune->name}}</div>
					                                        </div>
					                                    </div>
					                                </div>
				                                    <hr>
				                                    <div class="row">
					                                    <div class="col-md-6">
					                                        <div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/members.phone')}}:</label></div>
					                                            <div class="col-xs-7">{{$user->num_tlfn}}</div>
					                                        </div>
					                                    </div>
				                                	</div>
				                                    @isset($detail)
													 	@if($user->type_compte == 2)
						                                <hr>
						                                <div class="row">
						                                	 <div class="col-md-6">
						                                        <div class="row">
						                                            <div class="col-xs-5"><label>{{__('admin/members.diplome')}}:</label></div>
						                                            <div class="col-xs-7">{{$detail->diplome}}</div>
						                                        </div>
						                                    </div>
						                                    <div class="col-md-12">
						                                        <div class="row">
						                                            <div class="col-xs-12"><label>{{__('admin/annonces.description')}}:</label></div>
						                                            <div class="col-xs-12">
						                                            	{!! html_entity_decode($detail->description) !!}</div>
						                                        </div>
						                                    </div>
						                                </div>
					                                    @elseif($user->type_compte == 3)
					                                    <hr>
					                                    <div class="row">
						                                    <div class="col-md-6">
						                                        <div class="row">
						                                            <div class="col-xs-5"><label>{{__('admin/members.adress')}}:</label></div>
						                                            <div class="col-xs-7">{{$detail->adress}}</div>
						                                        </div>
						                                    </div>
						                                    <div class="col-md-6">
						                                        <div class="row">
						                                            <div class="col-xs-5"><label>{{__('admin/members.service')}}:</label></div>
						                                            <div class="col-xs-7">{{$detail->service->name}}</div>
						                                        </div>
						                                    </div>
					                                    </div>
					                                    @endif
					                                    @endisset
					                                    <hr>
				                                   <div class="row">
				                                    <div class="col-md-4">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/members.status')}}:</label></div>
				                                            <div class="col-xs-7">
				                                            	@if($user ->is_active==1) 
						                                            <span class="text-success">{{__('admin/members.active')}} </span>
						                                        @else 
						                                            <span class="text-warning">{{__('admin/members.notActive')}}</span>
						                                        @endif
				                                            </div>
				                                        </div>
				                                    </div>
				                                    
				                                    <div class="col-md-4">
				                                    	@if($user ->is_active == 0)
			                                                <a href="{{route('admin.users.changeStatus',$user -> uuid)}}" class="btn btn-bordered btn-success waves-effect waves-light"
			                                                title="">
			                                                {{__('admin/members.activer')}}
			                                            </a>
			                                            @else
			                                                <a href="{{route('admin.users.changeStatus',$user -> uuid)}}" class="btn 
			                                                    btn-bordered btn-warning waves-effect waves-light" title="">
			                                                {{__('admin/members.desactiver')}}
			                                                </a>
			                                            @endif
				                                    </div>
				                                    <div class="col-md-4">
				                                    	<div class="my-rating" data-rating="{{$user->avg_rating}}" ></div>
				                                    </div>
				                                    <div class="col-md-6">
				                                    	@if($user ->in_home == 0)
			                                                <a href="{{route('admin.users.AddToHome',$user -> uuid)}}" class="btn btn-bordered btn-primary waves-effect waves-light"
			                                                title="">
			                                                {{__('admin/members.add_to_home')}}
			                                            </a>
			                                            @else
			                                                <a href="{{route('admin.users.AddToHome',$user -> uuid)}}" class="btn 
			                                                    btn-bordered btn-violet waves-effect waves-light" title="" style="font-size: 13px">
			                                                {{__('admin/members.delete_from_home')}}
			                                                </a>
			                                            @endif
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                    </div>                  
				                </div>
				                @if($user->type_compte == 2)

                       			<div class="">
                                    @isset($user->user_attachements)
                                        @foreach($user->user_attachements as $attachement)
                                            <div class="col-md-3 col-xs-6">
                                                
                                                    <div class="box-content bordered primary margin-bottom-20">
                                                        <div class="profile-avatar">
                                                            <img src="{{asset('AnnonceDz/public/Profil/'.$user->name.'/'.$attachement->file_name)}}" alt="" style="height: 150px;width: 150px">
                                                        </div>
                                                        <a href="{{route('users.profil.deleteImage',$attachement->id)}}" title="{{__('admin/annonces.delete')}}" class="text-danger" style="font-size: 20px">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                    </div>
                                            </div>
                                        @endforeach
                                            
                                        @endisset
                                    
                                </div>
			                    @else
			                    @include('admin.includes.profil.annonces')
			                        
			                    @endif
							</div>
						</div>
						@endisset
                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1"
                                onclick="history.back();">
                            <i class="ft-x"></i> {{__('admin/members.back')}}
                        </button>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
@section('script')
<script src="{{asset('users/js/jquery.star-rating-svg.js')}}"></script>
<script type="text/javascript">
	$(".my-rating").starRating({
        starSize: 25,
    });
</script>
@endsection
