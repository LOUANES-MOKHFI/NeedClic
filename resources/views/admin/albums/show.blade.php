@extends('admin.layouts.admin')
@section('title')
Afficher l'album
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
						                    <a href="{{route('admin.albums.deleteImage',$attachement->id)}}" title="{{__('admin/annonces.delete')}}" class="text-danger" style="font-size: 20px">
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
				                            <h4 class="box-title"><i class="fa fa-user ico"></i>{{$album->title}}</h4>
				                            <!-- /.box-title -->
				                            <!-- /.dropdown js__dropdown -->
				                            <div class="card-content">
				                                <div class="row">
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>Titre :</label></div>
				                                            <div class="col-xs-7">{{$album->title}}</div>
				                                        </div>
				                                    </div>
				                                   
				                                    
				                                   
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>Status :</label></div>
				                                            <div class="col-xs-7">
				                                            	@if($album ->is_active==1) 
						                                            <span class="text-success">{{__('admin/annonces.active')}} </span>
						                                        @else 
						                                            <span class="text-warning">{{__('admin/annonces.notActive')}}</span>
						                                        @endif
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="col-md-6">
				                                    	<a href="{{route('admin.albums.delete',$album -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light" >
				                                        {{__('admin/annonces.delete')}}
				                                        </a>
				                                    </div>
				                                    
				                                    <div class="col-md-6">
				                                    	@if($album ->is_active == 0)
			                                                <a href="{{route('admin.albums.approuver',$album -> uuid)}}" class="btn btn-bordered btn-success waves-effect waves-light"
			                                                title="">
			                                                {{__('admin/annonces.activer')}}
			                                            </a>
			                                            @else
			                                                <a href="{{route('admin.albums.approuver',$album -> uuid)}}" class="btn 
			                                                    btn-bordered btn-warning waves-effect waves-light" title="">
			                                                {{__('admin/annonces.desactiver')}}
			                                                </a>
			                                            @endif
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
