@extends('admin.layouts.admin')
@section('title')
{{__('admin/publicite.all_publicite')}}
@endsection
@section('content')

<div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title">{{__('admin/publicite.all_publicite')}}</h4>
                        </div>
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <a href="{{route('admin.publicite.create')}}" class="box-title btn btn-primary float-right">
                                <i class="fa fa-plus-circle"></i> {{__('admin/publicite.add_publicite')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin/publicite.image')}}</th>
                                    <th>{{__('admin/publicite.title')}}</th>
                                    <th>{{__('admin/publicite.description')}}</th>
                                    <th>Emplacement</th>
                                    <th>{{__('admin/publicite.actions')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                    <th>{{__('admin/publicite.image')}}</th>
                                    <th>{{__('admin/publicite.title')}}</th>
                                    <th>{{__('admin/publicite.description')}}</th>
                                    <th>Emplacement</th>
                                    <th>{{__('admin/publicite.actions')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @isset($publicites)
                                @foreach($publicites as $key=>$publicite)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img style="height: 80px;width:200px" src="{{asset('AnnonceDz/public/Publicite/'.$publicite->id.'/'.$publicite ->image)}}"></td>
                                        <td>{{$publicite ->title}}</td>
                                        <td>{{$publicite ->description ? $publicite ->description : '/'}}</td>
                                        <td> @if($publicite->in_home == 1) Haut d'accueill
                                            @elseif($publicite->in_home == 5) bas d'accueil
                                            @elseif($publicite->in_home == 2)Tout les categories
                                            @elseif($publicite->in_home == 3)Annonces
                                            @elseif($publicite->in_home == 4)Comptes @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-bordered btn-success" data-toggle="modal" data-uuid="{{$publicite->uuid}}" data-target="#AddTo" href="#">&nbsp;&nbsp;
                                                Ajouter Au
                                            </a>
                                            

                                           
                                            <a href="{{route('admin.publicite.edit',$publicite -> uuid)}}" class="btn btn-bordered btn-warning waves-effect waves-light"
                                                title="{{__('admin/publicite.edit')}}"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.publicite.delete',$publicite -> uuid)}}" class="btn btn-bordered btn-danger waves-effect waves-light"title="{{__('admin/publicite.delete')}}">
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
                                <i class="ft-x"></i> {{__('admin/publicite.back')}}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box-content -->
            </div>

        </div>

@endsection
@section('script')
    @include('admin.includes.modals.AddTo')

    <script type="text/javascript">
     $('#AddTo').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var uuid = button.data('uuid')
            var modal = $(this)
            modal.find('.modal-body #uuid').val(uuid);
        })
</script>
@endsection