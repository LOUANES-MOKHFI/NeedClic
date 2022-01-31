@extends('admin.layouts.admin')
@section('title')
Tout les albums
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">Tout les albums</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/annonces.titre')}}</th>
                                    <th>{{__('admin/annonces.status')}}</th>
                                    <th>{{__('admin/annonces.added_by')}}</th>
                                    <th>{{__('admin/annonces.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/annonces.titre')}}</th>
                                    <th>{{__('admin/annonces.status')}}</th>
                                    <th>{{__('admin/annonces.added_by')}}</th>
                                    <th>{{__('admin/annonces.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($albums)
                                @foreach($albums as $key=>$album)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        
                                        <td>{{$album ->title}}</td>

                                        <td>@if($album ->is_active==1) 
                                            <span class="text-success">{{__('admin/annonces.active')}} </span>@else 
                                            <span class="text-warning">{{__('admin/annonces.notActive')}}</span> @endif</td>
                                        <td>{{$album->user ? $album ->user->name : 'utilisateur supprimée'}}</td>



                                        <td>
                                            <a href="{{route('admin.albums.show',$album -> uuid)}}" class="btn btn-bordered btn-info waves-effect waves-light"
                                                title="{{__('admin/annonces.show')}}"><i class="fa fa-eye"></i>
                                            </a>
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
                                            
                                            @can('edit_annonce')
                                            <a href="{{route('admin.albums.delete',$album -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/annonces.delete')}}">
                                            <i class="fa fa-trash"></i>
                                            </a>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1"
                                    onclick="history.back();">
                                <i class="ft-x"></i> {{__('admin/annonces.back')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
