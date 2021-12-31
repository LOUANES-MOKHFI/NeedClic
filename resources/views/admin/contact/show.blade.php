@extends('admin.layouts.admin')
@section('title')
{{__('admin/contact.message')}}
@endsection
@section('style')
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
                	@isset($msg)
						<div class="row small-spacing">
				            <!-- /.col-md-3 col-xs-12 -->
				            <div class="col-md-12 col-xs-12">
				                <div class="row">
				                    <div class="col-xs-12">
				                        <div class="box-content card">
				                            <h4 class="box-title"><i class="fa fa-user ico"></i>{{$msg->name}}</h4>
				                            <!-- /.box-title -->
				                            <!-- /.dropdown js__dropdown -->
				                            <div class="card-content">
				                                	<div class="row">
					                                    <div class="col-md-6">
					                                        <div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/contact.name')}}:</label></div>
					                                            <div class="col-xs-7">{{$msg->name}}</div>
					                                        </div>
					                                    </div>
					                                   
					                                    <div class="col-md-6">
					                                        <div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/contact.email')}}:</label></div>
					                                            <div class="col-xs-7">{{$msg->email}}</div>
					                                        </div>
					                                    </div>
				                                    </div>
				                                    <hr>
				                                    <div class="row">
					                                    <div class="col-md-6">
					                                        <div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/contact.subject')}}:</label></div>
					                                            <div class="col-xs-7">{{$msg->subject}}</div>
					                                        </div>
					                                    </div>
					                                    
					                                </div>
					                                <hr>
					                                <div class="row">
					                                    <div class="col-md-12">
					                                        <div class="row">
					                                            <div class="col-xs-5"><label>{{__('admin/contact.message')}}:</label></div>
					                                            <div class="col-xs-7">{{$msg->comments}}</div>
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
                            <i class="ft-x"></i> {{__('admin/members.back')}}
                        </button>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
