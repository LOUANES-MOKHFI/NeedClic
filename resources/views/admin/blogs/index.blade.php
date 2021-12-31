@extends('admin.layouts.admin')
@section('title')
{{__('admin/blogs.all_blogs')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/blogs.all_blogs')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.blogs.create')}}" class="box-title btn btn-primary float-right">
                                <i class="fa fa-plus-circle"></i> {{__('admin/blogs.add_blog')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/blogs.titre')}}</th>
                                    <th>{{__('admin/blogs.category')}}</th>
                                    <th>{{__('admin/blogs.status')}}</th>
                                    <th>{{__('admin/blogs.added_by')}}</th>
                                    <th>{{__('admin/blogs.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/blogs.titre')}}</th>
                                    <th>{{__('admin/blogs.category')}}</th>
                                    <th>{{__('admin/blogs.status')}}</th>
                                    <th>{{__('admin/blogs.added_by')}}</th>
                                    <th>{{__('admin/blogs.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($blogs)
                                @foreach($blogs as $key=>$blog)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$blog ->titre}}</td>
                                        <td>{{$blog->category ? $blog->category->name : 'categorie supprimée'}}</td>

                                        <td>{{$blog ->status==0 ? 'Non Active' : 'Active'}}</td>
                                        <td>{{$blog ->admin->name}}</td>


                                        <td>
                                            <a href="{{route('admin.blogs.show',$blog -> uuid)}}" class="btn btn-bordered btn-primary waves-effect waves-light"
                                                title="Afficher"><i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.blogs.edit',$blog -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
                                                title="{{__('admin/blogs.edit')}}"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.blogs.delete',$blog -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/blogs.delete')}}">
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
                                <i class="ft-x"></i> {{__('admin/blogs.back')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
