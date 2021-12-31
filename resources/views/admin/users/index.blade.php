@extends('admin.layouts.admin')

@section('title')
{{__('admin/members.all_members')}}
@endsection
@section('content')

    <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-6 col-lg-6">
                            <h4 class="box-title"> {{__('admin/members.all_members')}}</h4>
                        </div>
                       
                    </div>
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{__('admin/members.name')}}</th>
                                <th>{{__('admin/members.email')}} </th>
                                <th>{{__('admin/members.phone')}} </th>
                                <th>{{__('admin/members.type')}} </th>
                                <th>{{__('admin/members.actions')}}</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>{{__('admin/members.name')}}</th>
                                <th>{{__('admin/members.email')}} </th>
                                <th>{{__('admin/members.phone')}} </th>
                                <th>{{__('admin/members.type')}} </th>
                                <th>{{__('admin/members.actions')}}</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @isset($users)
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user ->name}}</td>
                                        <td>{{$user ->email}}</td>
                                        <td>{{$user->num_tlfn}}</td>
                                        <td>@if($user->type_compte == 0)
                                                <span class="text-info">
                                                    Particulier
                                                </span>
                                            @elseif($user->type_compte == 1)
                                                <span class="text-warning">
                                                    Artisant créateur
                                                </span>
                                            @elseif($user->type_compte == 2)
                                                <span class="text-danger">
                                                {{$user->category ? $user->category->name : 'categorie supprimée'}}
                                                </span>
                                            @elseif($user->type_compte == 3)
                                                <span class="text-success">
                                                    Boutique
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.users.show',$user -> uuid)}}"
                                                class="btn btn-info btn-bordered waves-effect waves-light"title="{{__('admin/members.show')}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.users.delete',$user -> uuid)}}"
                                                class="btn btn-danger btn-bordered waves-effect waves-light"title="{{__('admin/members.delete')}}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @if($user ->is_active == 0)
                                                <a href="{{route('admin.users.changeStatus',$user -> uuid)}}" class="btn btn-bordered btn-success waves-effect waves-light"
                                                title="">
                                                {{__('admin/members.activer')}}
                                            </a>
                                            @else
                                                <a href="{{route('admin.users.changeStatus',$user -> uuid)}}" class="btn 
                                                    btn-bordered btn-warning waves-effect waves-light" title="" style="font-size: 13px">
                                                {{__('admin/members.desactiver')}}
                                                </a>
                                            @endif
                                            @if($user ->in_home == 0)
                                                <a href="{{route('admin.users.AddToHome',$user -> uuid)}}" class="btn btn-bordered btn-primary waves-effect waves-light"
                                                title="">
                                                {{__('admin/members.add_to_home')}}
                                            </a>
                                            @else
                                                <a href="{{route('admin.users.AddToHome',$user -> uuid)}}" class="btn 
                                                    btn-bordered btn-violet waves-effect waves-light" title="" style="font-size: 13px">
                                                {{__('admin/members.delete_from_home')}}
                                                </a>
                                            @endif
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
@include('admin.includes.modals.members.showMember')

    <script type="text/javascript">
        $(document).on('click', '#showMember', function () {

        var uuid;
        uuid = $(this).attr('data-id');
        fetchMember(uuid);

    })

    function fetchMember(uuid){
            $.ajax({
                type: "GET",
                url:"/admin/members/show/"+uuid,
                success:function(response){
                    if(response.status == 500){
                        alert(response.msg);
                    }else{
                        member = response.member;
                        $('#name').html(member.name);
                        $('#cabinet').html(response.cabinet.name);
                        $('#role').html(response.role.name);
                        $('#email').html(member.email);
                        $('#adress').html(member.adress);
                        $('#phone').html(member.phone);
                        $('#date_nais').html(member.date_nais);
                    }
                }
            });
        }

    </script>
@endsection