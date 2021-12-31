@extends('users.dashboard.layouts.master')
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
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('users.annonces.create')}}" class="box-title btn btn-primary float-right">
                                <i class="fa fa-plus-circle"></i> {{__('admin/annonces.add_annonce')}}</a>
                        </div>
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
                                    <th width="5">vues</th>
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
                                    <th width="5">vues</th>
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
                                        <td>{{$annonce ->category->name}}</td>
                                        <td>@if($annonce ->status==0) {{__('admin/annonces.active')}} @else {{__('admin/annonces.notActive')}} @endif</td>
                                        <td>{{$annonce ->prix}}</td>
                                        <td width="5">{{$annonce ->count_viewed}}</td>

                                        <td>@if($annonce ->is_negociable==1) {{__('admin/annonces.negociable')}} @else {{__('admin/annonces.notNegociable')}} @endif</td>
                                        <td>{{$annonce ->user->name}}</td>


                                        <td>
                                            <a href="{{route('users.annonces.show',$annonce -> uuid)}}" class="btn btn-bordered btn-info waves-effect waves-light"
                                                title="{{__('admin/annonces.show')}}"><i class="fa fa-eye"></i>
                                            </a>

                                            <a href="{{route('users.annonces.edit',$annonce -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
                                                title="{{__('admin/annonces.edit')}}"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('users.annonces.delete',$annonce -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/annonces.delete')}}">
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
                                <i class="ft-x"></i> {{__('admin/annonces.back')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
