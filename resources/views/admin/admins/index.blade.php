@extends('admin.layouts.admin')

@section('title')
{{__('admin/admins.all_admins')}}
@endsection
@section('content')

    <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title"> {{__('admin/admins.all_admins')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.admins.create')}}" class="box-title btn btn-primary"><i class="fa fa-plus-circle"></i> {{__('admin/admins.add_admin')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{__('admin/admins.name')}}</th>
                                <th>{{__('admin/admins.email')}} </th>
                                <th>{{__('admin/admins.role')}} </th>
                                <th>{{__('admin/admins.actions')}}</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>{{__('admin/admins.name')}}</th>
                                <th>{{__('admin/admins.email')}} </th>
                                <th>{{__('admin/admins.role')}} </th>
                                <th>{{__('admin/admins.actions')}}</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @isset($admins)
                                @foreach($admins as$key => $admin)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$admin ->name}}</td>
                                        <td>{{$admin ->email}}</td>
                                        <td>{{$admin->role ? $admin->role->name : '/'}}</td>
                                        <td>
                                            <a href="{{route('admin.admins.edit',$admin -> uuid)}}"
                                                    class="btn btn-warning btn-bordered waves-effect waves-light"title="{{__('admin/admins.edit')}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.admins.delete',$admin -> uuid)}}"
                                                class="btn btn-danger btn-bordered waves-effect waves-light"title="{{__('admin/admins.delete')}}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                    </div>

                </div>
                <!-- /.box-content -->
            </div>

        </div>
@endsection
@section('script')

    
@endsection