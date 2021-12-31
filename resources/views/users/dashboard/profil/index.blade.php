@extends('users.dashboard.layouts.master')

@section('title')
    Profile
@endsection

@section('style')
	<link rel="stylesheet" href="{{asset('admin/assets/plugin/form-wizard/prettify.css')}}">

@endsection


@section('content')

		<div class="row small-spacing">
			<div class="col-md-12 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">{{__('admin/members.edit_profil')}}</h4>					
						<div id="tabsleft" class="tabbable tabs-left">
							<ul>
								<li><a href="#tabsleft-tab1" data-toggle="tab">Information personnel</a></li>
							
								<li><a href="#tabsleft-tab2" data-toggle="tab">Mot de passe</a></li>

							</ul>
							<div class="tab-content">
								<div class="tab-pane" id="tabsleft-tab1">
									<form action="{{route('users.profil.updateInfo',$user->uuid)}}"
                                            method="POST" enctype='multipart/form-data'>
                                            @csrf
                                            <input type="hidden" name="type_compte" value="{{$user->type_compte}}">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="namefield">{{__('admin/members.name')}}</label>
													<div class="controls">
														<input type="text" id="name" name="name" value="{{$user->name}}" class="required form-control">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="emailfield">{{__('admin/members.email')}}</label>
													<div class="controls">
														<input type="email" id="email" value="{{$user->email}}" name="email" class="required email form-control">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="namefield">{{__('admin/members.phone')}}</label>
													<div class="controls">
														<input type="text" id="phone" value="{{$user->num_tlfn}}" name="num_tlfn" class="required form-control">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="emailfield">{{__('admin/members.wilaya')}}</label>
													<div class="controls">
														<select name="wilaya_id" class="form-control form-control-lg" id="wilaya_id" >
				                                            <option value="" disabled="">-- Wilaya --</option>
				                                                @if(count(Wilayas()) > 0)
				                                                    @foreach(Wilayas() as $wilaya)
				                                                        <option value="{{$wilaya->id}}" @if($user->wilaya_id == $wilaya->id) selected @endif>{{$wilaya->name}}</option>
				                                                    @endforeach
				                                                @endif
				                                            </select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="emailfield">{{__('admin/members.wilaya')}}</label>
													<div class="controls">
														<select name="commune_id" class="form-control form-control-lg" id="commune_id" >
				                                            <option value="{{$user->commune_id}}"> {{$user->commune->name}}</option>
				                                        </select>
													</div>
												</div>
											</div>
											@if($user->type_compte == 2)
											<div class="col-md-12">
												<div class="form-group">
													<label for="emailfield">{{__('admin/members.diplome')}}</label>
													<div class="controls">
														<input type="text" id="adress" value="{{$detail->diplome}}" name="diplome" class="required  form-control">
													</div>
													@error('diplome')
		                                                <span class="text-danger"> {{$message}}  </span>
		                                            @enderror
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                                                    <label for="projectinput1">{{__('admin/annonces.description')}}</label>
                                                    <textarea class="form-control" name="description" id="tinymce" cols="90" rows="10"> {{$user->description}}</textarea>
                                                    @error("description")
                                                    <span class="text-danger"> {{$message}}  </span>
                                                    @enderror
                                                </div>
											</div>
											@elseif($user->type_compte == 3)
											<div class="col-md-6">
												<div class="form-group">
													<label for="emailfield">{{__('admin/members.adress')}}</label>
													<div class="controls">
														<input type="text" id="adress" value="{{$detail->adress}}"name="adress" class="  form-control">
													</div>
													@error('adress')
		                                                <span class="text-danger"> {{$message}}  </span>
		                                            @enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="emailfield">Service</label>
													<select name="service_id" class="form-control form-control-lg" id="service_id" >
		                                            <option value="" disabled="">-- Service --</option>
		                                                @if(count(Services()) > 0)
		                                                    @foreach(Services() as $service)
		                                                        <option value="{{$service->id}}" @if($service->id == $detail->service_id) selected @endif>{{$service->name}}</option>
		                                                    @endforeach
		                                                @endif
		                                            </select>
		                                            @error('service_id')
		                                                <span class="text-danger"> {{$message}}  </span>
		                                            @enderror
												</div>
											</div>
											@endif
											<div class="col-md-6">
												<div class="form-group">
                                                    <span style="color: red;font-size: 13px">* {{__('admin/annonces.file')}} pdf,jpeg,jpg,png</span> <br>
                                                    <label for="projectinput1">Photo de profile</label>
                                                    <input type="file" id="input-file-now" class="dropify" name="attachement" accept=".pdf,.jpg, .png, image/jpeg, image/png"  />
                                                    @error("attachement")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                    @enderror
                                                </div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
                                                    <span style="color: red;font-size: 13px">* {{__('admin/annonces.file')}} jpeg,jpg,png</span> <br>
                                                    <label for="projectinput1">Photo de couverture</label>
                                                    <input type="file" id="input-file-now" class="dropify" name="img_couverture" accept=".jpg, .png, image/jpeg, image/png"  />
                                                    @error("img_couverture")
                                                        <span class="text-danger"> {{$message}}  </span>
                                                    @enderror
                                                </div>
											</div>
											
										</div>
										
									
										<div class="row">
											<div class="form-actions">
	                                            <button type="button" class="btn btn-warning mr-1"
	                                                        onclick="history.back();">
	                                                    <i class="ft-x"></i> {{__('admin/members.back')}}
	                                            </button>
	                                            <button type="submit" class="btn btn-primary">
	                                                <i class="la la-check-square-o"></i> {{__('admin/members.save')}}
	                                            </button>
	                                        </div>
										</div>
									</form>
								</div>
								
								<div class="tab-pane" id="tabsleft-tab2">
									<form class="form" action="{{route('users.profil.updatePassword',$user->uuid)}}"method="POST" enctype='multipart/form-data'>
                                     @csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="urlfield">{{__('admin/members.password')}}</label>
													<div class="controls">
														<input type="password" id="password" name="password" class="required form-control">
														@error("password")
                                                            <span class="text-danger"> {{$message}}  </span>
                                                        @enderror
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="urlfield">{{__('admin/members.confirmpassword')}}</label>
													<div class="controls">
														<input name="password_confirmation" type="password" class="required url form-control">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-actions">
	                                            <button type="button" class="btn btn-warning mr-1"
	                                                        onclick="history.back();">
	                                                    <i class="ft-x"></i> {{__('admin/members.back')}}
	                                            </button>
	                                            <button type="submit" class="btn btn-primary">
	                                                <i class="la la-check-square-o"></i> {{__('admin/members.save')}}
	                                            </button>
	                                        </div>
										</div>
									</form>	
								</div>

							</div>
						</div>
					
				</div>
				<!-- /.box-content -->
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
<!-- Form Wizard -->
    <script src="{{asset('admin/assets/plugin/form-wizard/prettify.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/form-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/assets/scripts/form.wizard.init.min.js')}}"></script>
<script src="{{asset('admin/assets/scripts/jquery.min.js')}}"></script>

<script type="text/javascript">
    $('#wilaya_id').on('change',function(e){
        var wilaya_id = e.target.value;
        $('#commune_id').empty();
        //ajax
        $.ajax({
            type: "GET",
            url: "/users/get-commune/"+wilaya_id,
            success:function(communes){
                if(communes.length != 0){
                    communes.forEach(element =>
                    {
                        $('#commune_id').append('<option value="' +element.id+'">'+ element.name+'</option>');
                    });
                }
            }
            });
        });
</script>
@endsection