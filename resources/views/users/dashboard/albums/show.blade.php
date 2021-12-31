@extends('users.dashboard.layouts.master')
@section('title')
	{{$album->title}}
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
                	@isset($album)
						<div class="row small-spacing">
							@isset($album->attachements)
							@foreach($album->attachements as $attachement)
								<div class="col-md-3 col-xs-6">
									
										<div class="box-content bordered primary margin-bottom-20">
						                    <div class="profile-avatar">
						                        <img src="{{asset('AnnonceDz/public/Albums/'.$album->id.'/'.$attachement->file_name)}}" alt="" style="height: 150px;width: 150px">
						                    </div>
						                    <a href="{{route('users.albums.deleteImage',$attachement->id)}}" title="{{__('users/albums.delete')}}" class="text-danger" style="font-size: 20px">
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
				                            <h4 class="box-title"><i class="fa fa-user ico"></i>{{$album->titre}}</h4>
				                            <!-- /.box-title -->
				                            <!-- /.dropdown js__dropdown -->
				                            <div class="card-content">
				                                <div class="row">
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('users/albums.titre')}}:</label></div>
				                                            <div class="col-xs-7">{{$album->title}}</div>
				                                        </div>
				                                    </div>
				                                </div>
				                                <hr>
				                                <div class="row">
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('users/albums.status')}}:</label></div>
				                                            <div class="col-xs-7">
				                                            	@if($album ->status==1) 
						                                            <span class="text-success">{{__('users/albums.active')}} </span>
						                                        @else 
						                                            <span class="text-warning">{{__('users/albums.notActive')}}</span>
						                                        @endif
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="row">
				                                	<a href="{{route('users.albums.edit',$album -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
		                                                title="{{__('users/albums.edit')}}"><i class="fa fa-edit"></i>
		                                            </a>
		                                            <a href="{{route('users.albums.delete',$album -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('users/albums.delete')}}">
		                                            <i class="fa fa-trash"></i>
		                                            </a>
				                                </div>
				                                <hr>
				                                <div class="row">
				                                    <div class="col-md-12">
				                                    	<form action="{{route('users.albums.storeAttachements')}}" 
				                                    	method="POST"
                                              			enctype='multipart/form-data'>
				                                    		@csrf
					                                        <div class="row">
					                                        	<input type="hidden" name="user_id" value="{{$album->user_id}}">
					                                        	<input type="hidden" name="album_id" value="{{$album->id}}">
					                                            <div class="col-xs-3"><label>{{__('users/albums.addImage')}}:</label></div>
					                                            <div class="col-xs-7">
					                                            	<input type="file" id="input-file-now" class="form-control" name="attachments[]" accept=".jpg, .png, image/jpeg, image/png" multiple />
		                                                            @error("attachments")
		                                                                <span class="text-danger"> {{$message}}  </span>
		                                                            @enderror
					                                            </div>
					                                            <div class="col-xs-2">
					                                            	<button type="submit" class="btn btn-info">
												                        <i class="ft-x"></i> {{__('users/albums.save')}}
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
                            <i class="ft-x"></i> {{__('users/albums.back')}}
                        </button>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
