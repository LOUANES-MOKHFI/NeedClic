
<style>

.notifications .fa {
    color:#cecece;
    line-height:60px;
    font-size:22px;
}
.notifications .num {
    position:absolute;
    top:10px;
    right:-10px;
    width:20px;
    height:20px;
    border-radius:50%;
    background:#ff2c74;
    color:#fff;
    line-height:25px;
    font-family:sans-serif;
    text-align:center;
}

</style>
<div class="fixed-navbar">
	<!-- /.pull-left -->
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <h1 class="page-title">{{__('admin/header.home')}}</h1>
    </div>
	<div class="pull-right">


        <a href="#" data-target="#lang" class="ico-item mdi js__toggle_open"><i class="fa fa-language" aria-hidden="true"></i> {{App::getLocale()}}</a>
       
       

        </audio>
        <a href="{{route('logout')}}" class="ico-item mdi mdi-logout" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->


<!-- <div id="lang" class="notice-popup" >

    <ul class="notice-list">
         @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li >
            <a style="height: 50px" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}
            </a>
        </li>
          @endforeach
    </ul>

</div> -->


<!-- /#notification-popup -->

<!-- <div id="message-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">{{__('admin/header.recent_message')}}<a href="#" class="pull-right text-danger">{{__('admin/header.new_message')}}</a></h2>
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="/admin/assets/images/avatar-sm-1.jpg" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">10 min</span>
				</a>
			</li>
			
			
		</ul>
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
</div> -->
