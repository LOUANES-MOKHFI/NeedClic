@extends('admin.layouts.admin')
@section('title')
{{__('admin/services.all_services')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/services.all_services')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.settings.services.create')}}" class="box-title btn btn-primary float-right">
                                <i class="fa fa-plus-circle"></i> {{__('admin/services.add_service')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/services.image')}}</th>
                                    <th>{{__('admin/services.name')}}</th>
                                    <th>{{__('admin/services.description')}}</th>
                                    <th>{{__('admin/services.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                    <th>{{__('admin/services.image')}}</th>
                                    <th>{{__('admin/services.name')}}</th>
                                    <th>{{__('admin/services.description')}}</th>
                                    <th>{{__('admin/services.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($services)
                                @foreach($services as $key=>$service)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img style="height: 80px" src="{{asset('AnnonceDz/public/Service/'.$service->name.'/'.$service ->image)}}"></td>
                                        <td>{{$service ->name}}</td>
                                        <td>{{$service ->description ? $service ->description : '/'}}</td>

                                        <td>
                                            <a href="{{route('admin.settings.services.edit',$service -> id)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
                                                title="{{__('admin/services.edit')}}"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.settings.services.delete',$service -> id)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/services.delete')}}">
                                            <i class="fa fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1"
                                    onclick="history.back();">
                                <i class="ft-x"></i> {{__('admin/services.back')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
