@extends('admin.layouts.admin')
@section('title')
{{__('admin/roles.all_roles')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/roles.all_roles')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.settings.roles.create')}}" class="box-title btn btn-primary float-right">
                                <i class="fa fa-plus-circle"></i> {{__('admin/roles.addrole')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/roles.name')}}</th>
                                    <th width="400">{{__('admin/roles.permissions')}} </th>
                                    <th>{{__('admin/roles.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                    <th>{{__('admin/roles.name')}}</th>
                                    <th width="400">{{__('admin/roles.permissions')}} </th>
                                    <th>{{__('admin/roles.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($roles)
                                @foreach($roles as $key=>$role)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$role -> name}}</td>
                                        <td>
                                        @foreach($role->permissions as $permission)
                                            {{$permission}},
                                        @endforeach
                                        </td>

                                        <td>
                                            <a href="{{route('admin.settings.roles.edit',$role -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
                                                title="{{__('admin/roles.edit')}}"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.settings.roles.delete',$role -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/roles.delete')}}">
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
                                <i class="ft-x"></i> {{__('admin/cabinets.back')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
