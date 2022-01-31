<div class="main-menu">
	<header class="header">
		<a href="{{route('admin.index')}}" class="logo"><i class="ico mdi mdi-cube-outline"></i>NeedClic</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="/admin/assets/images/avatar-sm-5.jpg" alt=""><span class="status online"></span></a>
			<h5 class="name" ><a href="#" style="font-size: 15px">{{auth('admins')->user()->name}}</a></h5>
			<h5 class="position">{{auth('admins')->user()->role->name}}</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="{{route('admin.profil.edit')}}"><i class="fa fa-user"></i>{{__('admin/navBar.profile')}}</a></div>
					<div class="control-item"><a href="{{route('admin.settings')}}" style="font-size: 13px"><i class="fa fa-gear"></i> {{__('admin/navBar.settings')}}</a></div>
					<div class="control-item"><a href="{{route('admin.logout')}}"><i class="fa fa-sign-out"></i>{{__('admin/navBar.logout')}}</a></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Navigation</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href="{{route('admin.index')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>{{__('admin/navBar.dashboard')}}</span></a>
				</li>
				@can('blogs')
				<li>
					<a class="waves-effect" href="{{route('admin.blogs')}}"><i class="menu-icon fa fa-file-pdf-o"></i><span>{{__('admin/navBar.blogs')}}</span></a>
				</li>
				@endcan
				@can('annonces')
				<li>
					<a class="waves-effect" href="{{route('admin.annonces')}}"><i class="menu-icon fa fa-bullhorn"></i><span>{{__('admin/navBar.annonces')}}</span></a>
				</li>
			    @endcan
			    @can('annonces')
				<li>
					<a class="waves-effect" href="{{route('admin.albums')}}"><i class="menu-icon fa fa-bullhorn"></i><span>Les Albums</span></a>
				</li>
			    @endcan
			    @can('users')
				<li>
					<a class="waves-effect" href="{{route('admin.users')}}"><i class="menu-icon fa fa-users"></i><span>{{__('admin/navBar.users')}}</span></a>
				</li>
			    @endcan
			    @can('admins')
				<li>
					<a class="waves-effect" href="{{route('admin.admins')}}"><i class="menu-icon fa fa-users"></i><span>{{__('admin/navBar.admins')}}</span></a>
				</li>
			    @endcan
			    @can('contact')
				<li>
					<a class="waves-effect" href="{{route('admin.contact')}}"><i class="menu-icon fa fa-envelope"></i><span>{{__('admin/navBar.messages')}}</span></a>
				</li>
			    @endcan
			    @can('publicite')
				<li>
					<a class="waves-effect" href="{{route('admin.publicite')}}"><i class="menu-icon fa fa-envelope"></i><span>{{__('admin/navBar.publicite')}}</span></a>
				</li>
			    @endcan
			    @can('settings')
				<li>
					<a class="waves-effect" href="{{route('admin.settings')}}"><i class="menu-icon fa fa-gear"></i><span>{{__('admin/navBar.settings')}}</span></a>
				</li>
			    @endcan
			    

			</ul>
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
