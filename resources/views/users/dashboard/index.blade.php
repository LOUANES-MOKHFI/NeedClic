@extends('users.dashboard.layouts.master')

@section('title')
    tableau de bord
@endsection

@section('style')
<link href="{{asset('users/css/star-rating-svg.css')}}" rel="stylesheet">
@endsection


@section('content')
		@isset($user)
		<div class="row small-spacing">
            <!-- /.col-md-3 col-xs-12 -->
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box-content card">
                            <h4 class="box-title"><i class="fa fa-user ico"></i>{{$user->name}}</h4>
                            <!-- /.box-title -->
                            <div class="dropdown js__drop_down">
                                <a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('users.profil')}}">{{__('admin/members.edit_profil')}}</a></li>
                                </ul>
                                <!-- /.sub-menu -->
                            </div>
                            <!-- /.dropdown js__dropdown -->
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="col-md-12">
                                            <label>{{__('admin/annonces.image_couverture')}}</label><br>
                                            <img src="{{asset('AnnonceDz/public/User/'.$user->name.'/'.$user->img_couverture)}}" style="height: 200px;width: 400px;">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="col-md-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-5"><label>{{__('admin/members.name')}}:</label></div>
                                                <div class="col-xs-7">{{$user->name}}</div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-5"><label>{{__('admin/members.email')}}:</label></div>
                                                <div class="col-xs-7">{{$user->email}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-5"><label>{{__('admin/members.phone')}}:</label></div>
                                                <div class="col-xs-7">{{$user->num_tlfn}}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-5"><label>{{__('admin/members.wilaya')}}:</label></div>
                                                <div class="col-xs-7">{{$user->wilaya->name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-5"><label>{{__('admin/members.commune')}}:</label></div>
                                                <div class="col-xs-7">{{$user->commune->name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-5"><label>{{__('admin/members.like')}}:</label></div>
                                                <div class="col-xs-7">{{$user->count_like}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="my-rating" data-rating="{{$user->avg_rating}}" disabled></div>
                                        </div>
                                        @if(Auth::user()->type_compte == 2)
                                        <div class="col-md-12">
                                            <a class="btn btn-warning btn-bordered" href="{{route('users.profil.editDescription')}}">Ajouter une description</a>
                                        </div>
                                        @endif
                                    </div>

                                    @if(Auth::user()->type_compte == 2)
                                    <div class="col-md-12 col-xs-12">
                                        <br>
                                        @isset($detail->description)
                                        <div class="col-md-12 col-xs-12"><label>{{__('admin/annonces.description')}}:</label></div>
                                        <div class="col-md-12 col-xs-12">
                                            {!! html_entity_decode($detail->description) !!}
                                        </div>
                                        @endisset
                                    </div>
                                    @endif

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->type_compte == 2)
                    @include('users.dashboard.includes.profil.album')
                      
                    @else
                    @include('users.dashboard.includes.profil.annonces')
                        
                    @endif
                  

                </div>
                
            </div>
		</div>
		@endisset
		<!-- /.row -->



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
<!-- Form Wizard -->
    <script src="{{asset('admin/assets/plugin/form-wizard/prettify.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/form-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/assets/scripts/form.wizard.init.min.js')}}"></script>
<script src="{{asset('admin/assets/scripts/jquery.min.js')}}"></script>

<script src="{{asset('users/js/jquery.star-rating-svg.js')}}"></script>
<script type="text/javascript">
    $(".my-rating").starRating({
        starSize: 25,
    });
</script>
@endsection

