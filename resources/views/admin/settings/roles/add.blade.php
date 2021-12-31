@extends('admin.layouts.admin')

@section('title')
{{__('admin/roles.addrole')}}
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Accueil </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.settings.roles')}}"> {{__('admin/roles.all_roles')}}  </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/roles.addrole')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body small-spacing">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="box-content">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> {{__('admin/roles.addrole')}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.settings.roles.store')}}"
                                              method="POST"
                                              enctype='multipart/form-data'>
                                            @csrf
                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i>{{__('admin/roles.roles_information')}}</h4>


                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">{{__('admin/roles.name')}}</label>
                                                                    <input type="text" value="{{old('name')}}" id="name"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           name="name">
                                                                    @error("name")
                                                                    <span class="text-danger"> {{$message}}  </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @foreach(Config('global.permissions') as $name=> $value)
                                                            <div class="form-group col-sm-4">
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" class="chk-box" name="permissions[]" value="{{$name}}">{{$value}}
                                                                </label>
                                                            </div>
                                                            @endforeach
                                                            @error('permissions.0')
                                                               <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>

                                            </div>


                                            <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/roles.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/roles.save')}}
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
