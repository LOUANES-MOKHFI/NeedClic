@extends('admin.layouts.admin')
@section('title')
{{__('admin/categories.edit_category')}}
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
                                <li class="breadcrumb-item"><a href=""> {{__('admin/categories.all_categories')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/categories.edit_category')}} - {{$category->name}}
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
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/categories.edit_category')}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.settings.categories_annonces.update',$category -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input name="id" value="{{$category -> id}}" type="hidden">
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/categories.category')}}</label>
                                                            <input type="text" id="category"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$category->name}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Categorie de compte</label>
                                                            <select class="form-control" name="category_compte">
                                                                <option value="1" @if($category->category_compte == 1) selected @endif >Particulier</option>
                                                                <option value="3" @if($category->category_compte == CAT_ARTISANAT) selected @endif >Artiant traditionnel</option>
                                                                <option value="2" @if($category->category_compte == CAT_ART) selected @endif >Artisant</option>
                                                                <option value="4" @if($category->category_compte == CAT_ING) selected @endif >Ingénieur</option>
                                                            </select>
                                                            @error("category_compte")
                                                                <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="form-group">
                                                            <img style="height: 150px;width: 150px" src="{{asset('AnnonceDz/public/Category/'.$category->id.'/'.$category->image)}}">
                                                         </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/annonces.image')}}</label>
                                                            <input type="file" value="{{old('image')}}" id="name"
                                                                   class="form-control" placeholder=" " name="image" accept=".pdf,.jpg, .png, image/jpeg, image/png">
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
