@extends('admin.layouts.admin')

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
									<form action="{{route('admin.profil.updateProfil',$member->uuid)}}"
                                            method="POST" enctype='multipart/form-data'>
                                            @csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="namefield">{{__('admin/members.name')}}</label>
													<div class="controls">
														<input type="text" id="name" name="name" value="{{$member->name}}" class="required form-control">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="emailfield">{{__('admin/members.email')}}</label>
													<div class="controls">
														<input type="email" id="email" value="{{$member->email}}" name="email" class="required email form-control">
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
								<div class="tab-pane" id="tabsleft-tab2">
									<form class="form" action="{{route('admin.profil.updateProfilPassword',$member->uuid)}}"method="POST" enctype='multipart/form-data'>
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
@endsection
@section('script')

<!-- Form Wizard -->
    <script src="{{asset('admin/assets/plugin/form-wizard/prettify.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/form-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/assets/scripts/form.wizard.init.min.js')}}"></script>

@endsection