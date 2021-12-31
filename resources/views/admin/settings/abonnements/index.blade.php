@extends('admin.layouts.admin')
@section('title')
{{__('admin/abonnements.all_abonnements')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/abonnements.all_abonnements')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.settings.abonnements.create')}}" class="box-title btn btn-primary float-right">
                                <i class="fa fa-plus-circle"></i> {{__('admin/abonnements.add_abonnement')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/abonnements.type_compte')}}</th>
                                    <th>{{__('admin/abonnements.duree')}}</th>
                                    <th>{{__('admin/abonnements.montant')}}</th>
                                    <th>{{__('admin/abonnements.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                    <th>{{__('admin/abonnements.type_compte')}}</th>
                                    <th>{{__('admin/abonnements.duree')}}</th>
                                    <th>{{__('admin/abonnements.montant')}}</th>
                                    <th>{{__('admin/abonnements.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($abonnements)
                                @foreach($abonnements as $key=>$abonnement)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$abonnement ->type_compte}}</td>
                                        <td>{{$abonnement ->duree}}</td>
                                        <td>{{$abonnement ->montant}}</td>

                                        <td>
                                            <a href="{{route('admin.settings.abonnements.edit',$abonnement -> id)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
                                                title="{{__('admin/abonnements.edit')}}"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.settings.abonnements.delete',$abonnement -> id)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/abonnements.delete')}}">
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
                                <i class="ft-x"></i> {{__('admin/abonnements.back')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
