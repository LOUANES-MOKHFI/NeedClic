@extends('admin.layouts.admin')

@section('title')
{{__('admin/abonnements.add_abonnement')}}
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
                                <li class="breadcrumb-item"><a href="{{route('admin.settings.abonnements')}}"> {{__('admin/abonnements.all_abonnements')}}  </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/abonnements.add_abonnement')}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{__('admin/abonnements.add_abonnement')}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.settings.abonnements.store')}}"
                                              method="POST"
                                              enctype='multipart/form-data'>
                                            @csrf
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/abonnements.type_compte')}}</label>
                                                            <select class="form-control" name="type_compte">
                                                                <option value="Boutique">Boutique</option>
                                                                <option value="Proffessionnelle">Proffessionnelle</option>
                                                            </select>
                                                            @error("type_compte")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/abonnements.duree')}}</label>
                                                            <input type="text" value="{{old('duree')}}" id="type"
                                                                   class="form-control" placeholder=" " name="duree">
                                                            @error("duree")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/abonnements.montant')}}</label>
                                                            <input type="text" value="{{old('montant')}}" id="type"
                                                                   class="form-control" placeholder=" 2000 DA" name="montant">
                                                            @error("montant")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/abonnements.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/abonnements.save')}}
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
