@extends('admin.layouts.admin')
@section('title')
{{$blog->titre}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                	@isset($blog)
						<div class="row small-spacing">
							
							@foreach($blog->attachements as $attachement)
								<div class="col-md-3 col-xs-6">
									
										<div class="box-content bordered primary margin-bottom-20">
						                    <div class="profile-avatar">
						                        <img src="{{asset('AnnonceDz/public/Blog/'.$blog->titre.'/'.$attachement->file_name)}}" alt="" style="height: 150px;width: 150px">
						                    </div>
						                    <a href="{{route('admin.blogs.deleteImage',$attachement->id)}}" title="supprimer" class="text-danger" style="font-size: 20px">
						                        	<i class="fa fa-trash"></i>
						                        </a>
						                </div>
								</div>
							@endforeach
								
							
				            <!-- /.col-md-3 col-xs-12 -->
				            <div class="col-md-12 col-xs-12">
				                <div class="row">
				                    <div class="col-xs-12">
				                        <div class="box-content card">
				                            <h4 class="box-title"><i class="fa fa-user ico"></i>{{$blog->titre}}</h4>
				                            <!-- /.box-title -->
				                            <!-- /.dropdown js__dropdown -->
				                            <div class="card-content">
				                                <div class="row">
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.titre')}}:</label></div>
				                                            <div class="col-xs-7">{{$blog->titre}}</div>
				                                        </div>
				                                    </div>
				                                   
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.category')}}:</label></div>
				                                            <div class="col-xs-7">{{$blog->category->name}}</div>
				                                        </div>
				                                    </div>

				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.status')}}:</label></div>
				                                            <div class="col-xs-7">
				                                            	@if($blog ->status==1) 
						                                            <span class="text-success">{{__('admin/annonces.active')}} </span>
						                                        @else 
						                                            <span class="text-warning">{{__('admin/annonces.notActive')}}</span>
						                                        @endif
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="col-md-12">
				                                        <div class="row">
				                                            <div class="col-xs-12"><label>{{__('admin/annonces.description')}}:</label></div>
				                                            <div class="col-xs-12">
				                                            	{!! html_entity_decode($blog->description)!!}
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <hr>
				                                <div class="row">
				                                    <div class="col-md-12">
				                                    	<form action="{{route('users.blogs.storeAttachements')}}" 
				                                    	method="POST"
                                              			enctype='multipart/form-data'>
				                                    		@csrf
					                                        <div class="row">
					                                        	<input type="hidden" name="blog_id" value="{{$blog->id}}">
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
