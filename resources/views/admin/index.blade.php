@extends('admin.layouts.admin')

@section('title')
    Accueil
@endsection

@section('style')

@endsection


@section('content')

		<!-- /.row -->

		<div class="row small-spacing">
			<div class="box-content">
				<div class="col-md-12">
					<br>
				</div>
			</div>
			@can('admins')
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="box-content bg-info text-white">
                    <a href="#" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-institution"></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.boutiques')}}</p>
                            <h2 class="counter">{{$boutiques->count()}}</h2>
                        </div>
                    </a>
                </div>
            </div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-violet text-white">
                    <a href="#" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-users "></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.proffessionnelles')}}</p>
                            <h2 class="counter">{{$proffs->count()}}</h2>
                        </div>
                    </a>
				</div>
			</div>

			

			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
                    <a href="#" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-users"></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.artisanats')}}</p>
                            <h2 class="counter">{{$artisanats->count()}}</h2>
                        </div>
                    </a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
                    <a href="#" style="color:white">
                        <div class="statistics-box with-icon">
                            <i class="ico small fa fa-users"></i>
                            <p class="text text-white"  style="font-size:18px">{{__('admin/settings.particuliers')}}</p>
                            <h2 class="counter">{{$particuliers->count()}}</h2>
                        </div>
                    </a>
				</div>
			</div>
			
			

            
			@endcan
		<!-- .row -->



@endsection
@section('script')


@endsection

