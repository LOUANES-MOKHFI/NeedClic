@extends('users.dashboard.layouts.master')
@section('title')
{{__('admin/annonces.show_annonce')}}
@endsection
@section('style')
	<style type="text/css">
		label{
			font-weight: bold;
			color: black;
		}
	</style>
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                	@isset($annonce)
						<div class="row small-spacing">
							@isset($annonce->attachements)
							@foreach($annonce->attachements as $attachement)
								<div class="col-md-3 col-xs-6">
									
										<div class="box-content bordered primary margin-bottom-20">
						                    <div class="profile-avatar">
						                        <img src="{{asset('AnnonceDz/public/Annonces/'.$annonce->id.'/'.$attachement->file_name)}}" alt="" style="height: 150px;width: 150px">
						                    </div>
						                    <a href="{{route('users.annonces.deleteImage',$attachement->id)}}" title="{{__('admin/annonces.delete')}}" class="text-danger" style="font-size: 20px">
						                        	<i class="fa fa-trash"></i>
						                        </a>
						                </div>
								</div>
							@endforeach
								
							@endisset
				            <!-- /.col-md-3 col-xs-12 -->
				            <div class="col-md-12 col-xs-12">
				                <div class="row">
				                    <div class="col-xs-12">
				                        <div class="box-content card">
				                            <h4 class="box-title"><i class="fa fa-user ico"></i>{{$annonce->titre}}</h4>
				                            <!-- /.box-title -->
				                            <!-- /.dropdown js__dropdown -->
				                            <div class="card-content">
				                                <div class="row">
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.titre')}}:</label></div>
				                                            <div class="col-xs-7">{{$annonce->titre}}</div>
				                                        </div>
				                                    </div>
				                                    @if(Auth::user()->type_compte == 0)
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.category')}}:</label></div>
				                                            <div class="col-xs-7">{{$annonce->category->name}}</div>
				                                        </div>
				                                    </div>
				                                   @endif
				                                </div>
				                                <hr>
				                                <div class="row">
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.prix')}}:</label></div>
				                                            <div class="col-xs-7">{{$annonce->prix}} DA</div>
				                                        </div>
				                                    </div>
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.status')}}:</label></div>
				                                            <div class="col-xs-7">
				                                            	@if($annonce ->status==1) 
						                                            <span class="text-success">{{__('admin/annonces.active')}} </span>
						                                        @else 
						                                            <span class="text-warning">{{__('admin/annonces.notActive')}}</span>
						                                        @endif
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                                <hr>
				                                <div class="row">
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.negociable')}}:</label></div>
				                                            <div class="col-xs-7">
				                                            	@if($annonce ->is_negociable==0) {{__('admin/annonces.negociable')}} @else {{__('admin/annonces.notNegociable')}} @endif
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                                <hr>
				                                <div class="row">
				                                    <div class="col-md-12">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.description')}}:</label></div>
				                                            <div class="col-xs-12">
				                                            	{!! html_entity_decode($annonce->description) !!}
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="row">
				                                	<a href="{{route('users.annonces.edit',$annonce -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
		                                                title="{{__('admin/annonces.edit')}}"><i class="fa fa-edit"></i>
		                                            </a>
		                                            <a href="{{route('users.annonces.delete',$annonce -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/annonces.delete')}}">
		                                            <i class="fa fa-trash"></i>
		                                            </a>
				                                </div>
				                                <hr>
				                                <div class="row">
				                                    <div class="col-md-12">
				                                    	<form action="{{route('users.annonces.storeAttachements')}}" 
				                                    	method="POST"
                                              			enctype='multipart/form-data'>
				                                    		@csrf
					                                        <div class="row">
					                                        	<input type="hidden" name="user_id" value="{{$annonce->user_id}}">
					                                        	<input type="hidden" name="annonce_id" value="{{$annonce->id}}">
					                                            <div class="col-xs-3"><label>{{__('admin/annonces.addImage')}}:</label></div>
					                                            <div class="col-xs-7">
					                                            	<input type="file" id="input-file-now" class="form-control" name="attachments[]" accept=".jpg, .png, image/jpeg, image/png" multiple />
		                                                            @error("attachments")
		                                                                <span class="text-danger"> {{$message}}  </span>
		                                                            @enderror
					                                            </div>
					                                            <div class="col-xs-2">
					                                            	<button type="submit" class="btn btn-info">
												                        <i class="ft-x"></i> {{__('admin/annonces.save')}}
												                    </button>
					                                            </div>
					                                        </div>
					                                    </form>
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                    </div>                  
				                </div>
				                
				            </div>
						</div>
						@endisset
                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1"
                                onclick="history.back();">
                            <i class="ft-x"></i> {{__('admin/annonces.back')}}
                        </button>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
