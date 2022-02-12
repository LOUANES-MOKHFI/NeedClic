@extends('admin.layouts.admin')

@section('title')
{{__('admin/annonces.edit_annonce')}}
@endsection
@section('style')

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
                                <li class="breadcrumb-item"><a href="{{route('admin.albums')}}"> {{__('admin/annonces.all_annonces')}}  </a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/annonces.edit_annonce')}} - {{$annonce->titre}}
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
                                    <h4 class="card-title" id="basic-layout-form"> {{__('admin/annonces.edit_annonce')}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.annonces.update',$annonce->uuid)}}"
                                              method="POST"
                                              enctype='multipart/form-data'>
                                            @csrf
                                            <input type="hidden" name="id" value="{{$annonce->id}}">
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/annonces.titre')}}</label>
                                                            <input type="text" value="{{$annonce->titre}}" id="type"
                                                                   class="form-control" placeholder=" " name="titre">
                                                            @error("titre")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/annonces.category')}}</label>
                                                            <select class="form-control" name="category_id">
                                                                @isset($categories)
                                                                    @foreach($categories as $category)
                                                                        <option value="{{$category->id}}" @if($annonce->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>
                                                            @error("category_id")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group"><br><br>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <div class="radio info">
                                                                        <input type="radio" @if($annonce->is_negociable == 1) checked @endif value="1" name="radio-2" id="radio-10"><label for="radio-10">{{__('admin/annonces.negociable')}}</label>
                                                                    </div>
                                                                    <!-- /.radio -->
                                                                </li>
                                                                <li>
                                                                    <div class="radio pink">
                                                                        <input type="radio" @if($annonce->is_negociable == 0) checked @endif value="0" name="radio-2" id="radio-11"><label for="radio-11">{{__('admin/annonces.notNegociable')}}</label>
                                                                    </div>
                                                                    <!-- /.radio -->
                                                                </li>
                                                            </ul>
                                                            @error("status")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/annonces.prix')}}</label>
                                                            <input type="text" value="{{$annonce->prix}}" id="type"
                                                                   class="form-control" placeholder=" " name="prix">
                                                            @error("prix")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/annonces.description')}}</label>
                                                            <textarea class="form-control" name="description"
                                                            id="tinymce" cols="90" rows="10"> {{$annonce->description}}</textarea>
                                                            @error("description")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/annonces.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/annonces.save')}}
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
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/advlist/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/anchor/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/autolink/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/autoresize/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/autosave/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/bbcode/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/charmap/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/code/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/codesample/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/colorpicker/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/contextmenu/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/directionality/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/emoticons/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/example/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/example_dependency/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/fullpage/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/fullscreen/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/hr/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/image/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/imagetools/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/importcss/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/insertdatetime/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/layer/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/legacyoutput/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/link/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/lists/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/media/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/nonbreaking/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/noneditable/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/pagebreak/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/paste/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/preview/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/print/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/save/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/searchreplace/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/spellchecker/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/tabfocus/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/table/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/template/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/textcolor/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/textpattern/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/visualblocks/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/visualchars/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/plugins/wordcount/plugin.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/tinymce/themes/modern/theme.min.js')}}"></script>
    <!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->

    <script src="{{asset('admin/assets/scripts/tinymce.init.min.js')}}"></script>

@endsection
