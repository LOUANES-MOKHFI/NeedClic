@extends('admin.layouts.admin')

@section('title')
{{__('admin/contact.all_contact')}}
@endsection
@section('content')

    <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title"> {{__('admin/contact.all_contact')}}</h4>
                        </div>
                       
                    </div>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{__('admin/contact.name')}}</th>
                                <th>{{__('admin/contact.email')}} </th>
                                <th>{{__('admin/contact.subject')}} </th>
                                <th>{{__('admin/contact.status')}} </th>
                                <th>{{__('admin/contact.actions')}}</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>{{__('admin/contact.name')}}</th>
                                <th>{{__('admin/contact.email')}} </th>
                                <th>{{__('admin/contact.subject')}} </th>
                                <th>{{__('admin/contact.status')}} </th>
                                <th>{{__('admin/contact.actions')}}</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @isset($messages)
                                @foreach($messages as$key => $msg)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$msg ->name}}</td>
                                        <td>{{$msg ->email}}</td>
                                        <td>{{$msg->subject}}</td>
                                        <td>
                                            @if($msg->viewed == 1)
                                            <span class="btn btn-bordered btn-success">Lu</span>
                                            @else
                                                 <span class="btn btn-bordered btn-danger">Non Lu</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.contact.show',$msg->id)}}"
                                                class="btn btn-info btn-bordered waves-effect waves-light"title="{{__('admin/contact.show')}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.contact.delete',$msg->id)}}"
                                                class="btn btn-danger btn-bordered waves-effect waves-light"title="{{__('admin/contact.delete')}}">
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