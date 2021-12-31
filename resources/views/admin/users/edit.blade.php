@extends('admin.layouts.admin')

@section('title')
{{__('admin/members.edit_member')}}
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Accueil </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.members')}}"> {{__('admin/members.all_members')}}  </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/members.edit_member')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="box-content">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">  {{__('admin/members.edit_member')}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.members.update',$member->uuid)}}"
                                              method="POST"
                                              enctype='multipart/form-data'>
                                            @csrf
                                            <input type="hidden" name="id" value="{{$member->id}}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>{{__('admin/members.member_information')}} </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{__('admin/members.name')}}</label>
                                                            <input type="text" value="{{$member->name}}" id="name"
                                                                   class="form-control" placeholder=" " name="name">
                                                            @error("name")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/members.email')}}</label>
                                                            <input type="email" id="abbr" class="form-control" placeholder="  "
                                                                   value="{{$member->email}}" name="email">

                                                            @error("email")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">{{__('admin/members.phone')}}</label>
                                                                    <input type="text" id="phone" class="form-control" placeholder="  "
                                                                           value="{{$member->phone}}" name="phone">

                                                                    @error("phone")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">{{__('admin/members.adress')}}</label>
                                                                    <input type="text" id="abbr" class="form-control" placeholder="  "
                                                                           value="{{$member->adress}}" name="adress">

                                                                    @error("adress")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">{{__('admin/members.date_nais')}}</label>
                                                                    <input type="date" id="abbr" class="form-control" placeholder="  "
                                                                           value="{{$member->date_nais}}" name="date_nais">

                                                                    @error("date_nais")
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{__('admin/members.cabinet_name')}}</label>
                                                            <select name="cabinet_id" class="form-control">
                                                                <option>{{__('admin/members.cabinet_name')}}</option>
                                                                @isset($cabinets)    
                                                                    @foreach($cabinets as $key=>$cabinet)
                                                                        <option value="{{$cabinet->id}}" @if($member->cabinet_id == $cabinet->id) selected @endif>{{$cabinet->name}}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>

                                                            @error("cabinet_id")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{__('admin/members.role')}}</label>
                                                            <select name="role_id" class="form-control">
                                                                <option>{{__('admin/members.role')}}</option>
                                                                @isset($roles)    
                                                                    @foreach($roles as $key=>$role)
                                                                        <option value="{{$role->id}}" @if($member->role_id == $role->id) selected @endif>{{$role->name}}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>

                                                            @error("role_id")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                        <label for="projectinput1"> {{__('admin/members.password')}}</label>
                                                        <input type="password" id="abbr" class="form-control" placeholder="  "
                                                                   value="" name="password">

                                                            @error("password")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                        <label for="projectinput1">{{__('admin/members.confirmpassword')}}</label>
                                                        <input name="password_confirmation" type="password"
                                                                   class="form-control" placeholder="  ">
                                                        </div>
                                                    </div>
                                                </div>
                                                       
                                            </div>


                                            <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/members.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/members.save')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection
