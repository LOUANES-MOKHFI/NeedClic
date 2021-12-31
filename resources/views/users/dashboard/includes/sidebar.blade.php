<div class="main-menu">
	<header class="header">
		<a href="{{route('admin.index')}}" class="logo"><i class="ico mdi mdi-cube-outline"></i>NeedClic</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="{{asset('AnnonceDz/public/User/'.Auth::user()->name.'/'.Auth::user()->image)}}" alt=""><span class="status online"></span></a>
			<h5 class="name" ><a href="{{route('users.profil')}}" style="font-size: 15px">{{Auth::user()->name}}</a></h5>
			<h5 class="position">
				@if(Auth::user()->type_compte == 0)
                    <span class="text-info">
                        Particulier
                    </span>
                @elseif(Auth::user()->type_compte == 1)
                    <span class="text-warning">
                        Artisanat
                    </span>
                @elseif(Auth::user()->type_compte == 2)
                    <span class="text-danger">
                    	<td>{{Auth::user()->category ? Auth::user()->category->name : '/'}}</td>
                    </span>
                @elseif(Auth::user()->type_compte == 3)
                    <span class="text-success">
                        Boutique
                    </span>
                @endif
			</h5>
			<!-- /.name -->
			
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
					<a class="waves-effect" href="{{route('users.dashboard')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>{{__('admin/navBar.dashboard')}}</span></a>
				</li>
				
				<!-- @if(Auth::user()->type_compte != 2)
				<li>
					<a class="waves-effect" href="{{route('users.annonces')}}"><i class="menu-icon fa fa-bullhorn"></i><span>{{__('admin/navBar.annonces')}}</span></a>
				</li>
				@endif -->
				<li>
					<a class="waves-effect" href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="menu-icon ico-item mdi mdi-logout"></i><span>Deconnecter</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		            @csrf
		        </form>
				</li>

        
			    

			</ul>
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
