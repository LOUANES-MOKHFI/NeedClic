@extends('admin.layouts.admin')
@section('title')
{{__('admin/annonces.all_annonces')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/annonces.all_annonces')}}</h4>
                        </div>
                        @can('edit_annonce')
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.annonces.create')}}" class="box-title btn btn-primary float-right">
                                <i class="fa fa-plus-circle"></i> {{__('admin/annonces.add_annonce')}}</a>
                        </div>
                        @endcan
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/annonces.titre')}}</th>
                                    <th>{{__('admin/annonces.category')}}</th>
                                    <th>{{__('admin/annonces.status')}}</th>
                                    <th>{{__('admin/annonces.prix')}}</th>
                                    <th>{{__('admin/annonces.negociable')}}</th>
                                    <th>{{__('admin/annonces.added_by')}}</th>
                                    <th>{{__('admin/annonces.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/annonces.titre')}}</th>
                                    <th>{{__('admin/annonces.category')}}</th>
                                    <th>{{__('admin/annonces.status')}}</th>
                                    <th>{{__('admin/annonces.prix')}}</th>
                                    <th>{{__('admin/annonces.negociable')}}</th>
                                    <th>{{__('admin/annonces.added_by')}}</th>
                                    <th>{{__('admin/annonces.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($annonces)
                                @foreach($annonces as $key=>$annonce)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        
                                        <td>{{$annonce ->titre}}</td>

                                        <td>{{$annonce->category ? $annonce ->category->name : '/'}}</td>
                                        <td>@if($annonce ->status==1) 
                                            <span class="text-success">{{__('admin/annonces.active')}} </span>@else 
                                            <span class="text-warning">{{__('admin/annonces.notActive')}}</span> @endif</td>
                                        <td>{{$annonce ->prix}}</td>
                                        <td>@if($annonce ->is_negociable==0) {{__('admin/annonces.negociable')}} @else {{__('admin/annonces.notNegociable')}} @endif</td>
                                        <td>{{$annonce->user ? $annonce ->user->name : 'utilisateur supprimée'}}</td>



                                        <td>
                                            <a href="{{route('admin.annonces.show',$annonce -> uuid)}}" class="btn btn-bordered btn-info waves-effect waves-light"
                                                title="{{__('admin/annonces.show')}}"><i class="fa fa-eye"></i>
                                            </a>
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
                                            
                                            @can('edit_annonce')
                                            <a href="{{route('admin.annonces.edit',$annonce -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
                                                title="{{__('admin/annonces.edit')}}"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.annonces.delete',$annonce -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/annonces.delete')}}">
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
