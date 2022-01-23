@extends('admin.layouts.admin')
@section('title')
Images
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">Images</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Comptes</th>
                                    <th>Image</th>
                                    <th>{{__('admin/categories.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Comptes</th>
                                    <th>Image</th>
                                    <th>{{__('admin/categories.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($comptes)
                                @foreach($comptes as $key=>$compte)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img style="height: 80px" src="{{asset('AnnonceDz/public/Compte/'.$compte->id.'/'.$compte ->image)}}"></td>
                                        <td>{{$compte -> name}}</td>
                                        <td>
                                            <a href="{{route('admin.settings.images.edit',$compte -> id)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
                                                title="{{__('admin/categories.edit')}}"><i class="fa fa-edit"></i>
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
                                <i class="ft-x"></i> {{__('admin/categories.back')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
