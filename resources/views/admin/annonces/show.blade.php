@extends('admin.layouts.admin')
@section('title')
{{__('admin/annonces.show_annonce')}}
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
						                    <a href="{{route('admin.annonces.deleteImage',$attachement->id)}}" title="{{__('admin/annonces.delete')}}" class="text-danger" style="font-size: 20px">
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
				                                   
				                                    <div class="col-md-6">
				                                        <div class="row">
                                        	@if($annonce->user->type_compte == 3)
                                        	<div class="col-xs-5">
                            				<label>Service:</label>
                            				</div>
                                 			<div class="col-xs-7"> {{$annonce->service ? $annonce ->service->name : '/'}}
                                 			</div>

                                            @else
                                            	<div class="col-xs-5">
                                            		<label>{{__('admin/annonces.category')}}:</label>
                                            	</div>
				                                 <div class="col-xs-7"> {{$annonce->category ? $annonce ->category->name : '/'}}
				                                 </div>
                                               
                                            @endif
				                                            
				                                        </div>
				                                    </div>
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.prix')}}:</label></div>
				                                            <div class="col-xs-7">{{$annonce->prix}}</div>
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
				                                    <div class="col-md-6">
				                                        <div class="row">
				                                            <div class="col-xs-5"><label>{{__('admin/annonces.negociable')}}:</label></div>
				                                            <div class="col-xs-7">
				                                            	@if($annonce ->is_negociable==0) {{__('admin/annonces.negociable')}} @else {{__('admin/annonces.notNegociable')}} @endif
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="col-md-12">
				                                    	<h5>Information de compte:</h5><br>
				                                    	<p style="font-size:17px">{{$annonce->user ? $annonce ->user->name : 'utilisateur supprimée'}}</p><br>
				                                    	<p style="font-size:17px">{{$annonce->user ? $annonce ->user->email : 'utilisateur supprimée'}}</p><br>
				                                    </div>
				                                    <div class="col-md-6">
				                                    	@if($annonce ->status == 0)
			                                                <a href="{{route('admin.annonces.approuver',$annonce -> uuid)}}" class="btn btn-bordered btn-success waves-effect waves-light"
			                                                title="">
			                                                {{__('admin/annonces.activer')}}
			                                            </a>
			                                            @else
			                                                <a href="{{route('admin.annonces.approuver',$annonce -> uuid)}}" class="btn 
			                                                    btn-bordered btn-warning waves-effect waves-light" title="">
			                                                {{__('admin/annonces.desactiver')}}
			                                                </a>
			                                            @endif
				                                    </div>
				                                    <div class="col-md-6">
				                                    	<a href="{{route('admin.annonces.delete',$annonce -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light">
			                                            	{{__('admin/annonces.delete')}}
			                                            </a>
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
