@extends('admin.layouts.admin')
@section('title')
Images
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
                                <li class="breadcrumb-item"><a href=""> Images</a>
                                </li>
                                <li class="breadcrumb-item active">Edit image - {{$compte->name}}
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
                                    <h4 class="card-title" id="basic-layout-form">Edit image</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.settings.images.update',$compte-> id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input name="id" value="{{$compte-> id}}" type="hidden">
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">nom de compte</label>
                                                            <input type="text" id="category"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$compte -> name}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/services.image')}}</label>
                                                            <input type="file" value="{{old('image')}}" id="type"
                                                                   class="form-control" placeholder=" " name="image">
                                                            @error("image")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/categories.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/categories.save')}}
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
