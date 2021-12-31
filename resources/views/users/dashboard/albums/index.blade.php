@extends('users.dashboard.layouts.master')
@section('title')
{{__('admin/albums.all_albums')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/albums.all_albums')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('users.albums.create')}}" class="box-title btn btn-primary float-right">
                                <i class="fa fa-plus-circle"></i> {{__('admin/albums.add_album')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/albums.titre')}}</th>
                                    <th>{{__('admin/albums.status')}}</th>
                                    <th>{{__('admin/albums.added_by')}}</th>
                                    <th>{{__('admin/albums.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/albums.titre')}}</th>
                                    <th>{{__('admin/albums.status')}}</th>
                                    <th>{{__('admin/albums.added_by')}}</th>
                                    <th>{{__('admin/albums.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($albums)
                                @foreach($albums as $key=>$album)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        
                                        <td>{{$album ->title}}</td>
                                        <td>@if($album ->status==0) {{__('admin/albums.active')}} @else {{__('admin/albums.notActive')}} @endif</td>
                                        <td>{{$album ->user->name}}</td>


                                        <td>
                                            <a href="{{route('users.albums.show',$album -> uuid)}}" class="btn btn-bordered btn-info waves-effect waves-light"
                                                title="{{__('admin/albums.show')}}"><i class="fa fa-eye"></i>
                                            </a>

                                            <a href="{{route('users.albums.edit',$album -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
                                                title="{{__('admin/albums.edit')}}"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('users.albums.delete',$album -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/albums.delete')}}">
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
                                <i class="ft-x"></i> {{__('admin/albums.back')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
