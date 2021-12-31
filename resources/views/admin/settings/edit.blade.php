@extends('admin.layouts.admin')

@section('title')
{{__('admin/settings.settings')}}
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{__('admin/settings.settings')}} </a>
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
                                    <h4 class="card-title" id="basic-layout-form"> {{__('admin/settings.settings')}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.settings.update',$setting->id)}}"
                                              method="POST"
                                              enctype='multipart/form-data'>
                                            @csrf
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label for="projectinput1">{{__('admin/settings.logo')}}</label>
                                                            <div class="col-md-8">
                                                                <input type="file" value="{{old('logo')}}" id="type"
                                                                   class="form-control" placeholder=" " name="logo">
                                                                @error("logo")
                                                                <span class="text-danger"> {{$message}}  </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <img src="{{asset('AnnonceDz/public/Logo/'.$setting->logo.'/'.$setting->logo)}}" style="height: 120px;width: 200px">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.email')}}</label>
                                                            <input type="email" value="{{$setting->email}}" id="type"
                                                                   class="form-control" placeholder=" " name="email">
                                                            @error("email")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.phone')}}</label>
                                                            <input type="text" value="{{$setting->phone}}" id="type"
                                                                   class="form-control" placeholder=" " name="phone">
                                                            @error("phone")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.facebook')}}</label>
                                                            <input type="text" value="{{$setting->facebook}}" id="type"
                                                                   class="form-control" placeholder=" " name="facebook">
                                                            @error("facebook")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.instagram')}}</label>
                                                            <input type="text" value="{{$setting->instagram}}" id="type"
                                                                   class="form-control" placeholder=" " name="instagram">
                                                            @error("instagram")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.linkedin')}}</label>
                                                            <input type="text" value="{{$setting->linkedin}}" id="type"
                                                                   class="form-control" placeholder=" " name="linkedin">
                                                            @error("linkedin")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.twitter')}}</label>
                                                            <input type="text" value="{{$setting->twitter}}" id="type"
                                                                   class="form-control" placeholder=" " name="twitter">
                                                            @error("twitter")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.youtube')}}</label>
                                                            <input type="text" value="{{$setting->youtube}}" id="type"
                                                                   class="form-control" placeholder=" " name="youtube">
                                                            @error("youtube")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.adress')}}</label>
                                                            <input type="text" value="{{$setting->adress}}" id="type"
                                                                   class="form-control" placeholder=" " name="adress">
                                                            @error("adress")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.droit_auteur')}}</label>
                                                            <input type="text" value="{{$setting->droit_auteur}}" id="type"
                                                                   class="form-control" placeholder=" " name="droit_auteur">
                                                            @error("droit_auteur")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.slogon')}}</label>
                                                            <input type="text" value="{{$setting->slogon}}" id="type"
                                                                   class="form-control" placeholder=" " name="slogon">
                                                            @error("slogon")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/settings.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/settings.save')}}
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
