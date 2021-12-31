@extends('admin.layouts.admin')

@section('title')
Paramètres générals
@endsection

@section('style')

@endsection


@section('content')


		<!-- /.row -->

		<div class="row small-spacing">
			<div class="box-content">
				<div class="col-md-12">
					<h4><i class="menu-icon fa fa-gear"></i><span> {{__('admin/settings.settings')}}</span></h4>
				</div>
			</div>
			@can('roles')
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="box-content bg-info text-white">
                    <a href="{{route('admin.settings.edit',1)}}" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-gears "></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.settings')}}</p>
                        </div>
                    </a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
                    <a href="{{route('admin.settings.roles')}}" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-gears "></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.roles')}}</p>
                            <h2 class="counter">{{$roles->count()}}</h2>
                        </div>
                    </a>
				</div>
			</div>

			@endcan

			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
                    <a href="{{route('admin.settings.abonnements')}}" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-gears"></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.abonnements')}}</p>
                            <h2 class="counter"></h2>
                        </div>
                    </a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
                    <a href="{{route('admin.settings.categories_annonces')}}" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-gears"></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.categories_annonces')}}</p>
                            <h2 class="counter"></h2>
                        </div>
                    </a>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
                    <a href="{{route('admin.settings.categories_blogs')}}" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-gears"></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.categories_blogs')}}</p>
                            <h2 class="counter"></h2>
                        </div>
                    </a>
				</div>
			</div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="box-content bg-violet text-white">
                    <a href="{{route('admin.settings.services')}}" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-gears"></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.services')}}</p>
                            <h2 class="counter"></h2>
                        </div>
                    </a>
                </div>
            </div>
			
		<!-- .row -->


@endsection


@section('script')

@endsection
