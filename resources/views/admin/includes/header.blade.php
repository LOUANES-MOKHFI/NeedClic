
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
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">{{__('admin/header.home')}}</h1>
		<a href="#" class="ico-item mdi" onclick="dark()" ><i class="fa fa-moon-o" aria-hidden="true"></i></a>
		<a href="#" class="ico-item mdi" onclick="light()"><i class="fa fa-sun-o" aria-hidden="true"></i></a>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">


        <a href="#" data-target="#lang" class="ico-item mdi js__toggle_open"><i class="fa fa-language" aria-hidden="true"></i> {{App::getLocale()}}</a>

        <a href="#" class="ico-item notifications js__toggle_open ico-mdi-email" data-target="#unreadMessage" >
	        <i class="fa fa-envelope notice-alarm" ></i>
	        <span class="num notif_user" data-count="{{Count(unreadMessage())}}">{{Count(unreadMessage())}}</span>
    	</a>

    	<a href="#" class="ico-item notifications js__toggle_open ico-item-notif" data-target="#unActiveUser" >
	        <i class="fa fa-user-plus notice-alarm" ></i>
	        <span class="num notif_user" data-count="{{Count(unActiveUser())}}">{{Count(unActiveUser())}}</span>
    	</a>

    	<a href="#" class="ico-item notifications js__toggle_open ico-item-notif" data-target="#unActiveAnnonce" >
	        <i class="fa fa-bullhorn notice-alarm" ></i>
	        <span class="num notif_user" data-count="{{Count(unActiveAnnonce())}}">{{Count(unActiveAnnonce())}}</span>
    	</a>
    	<a href="#" class="ico-item notifications js__toggle_open ico-item-notif" data-target="#unActiveAlbum" >
	        <i class="fa fa-file-text notice-alarm" ></i>
	        <span class="num notif_user" data-count="{{Count(unActiveAlbum())}}">{{Count(unActiveAlbum())}}</span>
    	</a>
       
        <a href="{{route('admin.logout')}}" class="ico-item mdi mdi-logout"></a>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->


<div id="lang" class="notice-popup" >
    <ul class="notice-list">
         @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li >
            <a style="height: 50px" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}
            </a>
        </li>
          @endforeach
    </ul>
</div>

<!-- /#notification-popup -->

<div id="unreadMessage" class="notice-popup" >
	<h2 class="popup-title">{{__('admin/header.recent_message')}}<a href="#" class="pull-right text-danger">{{__('admin/header.new_message')}}</a></h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			@if(count(unreadMessage())>0)
			@foreach(unreadMessage() as $key=>$msg)
			<li>
				<a href="{{route('admin.contact.show',$msg->id)}}">
					<span class="avatar"><img src="/admin/assets/images/avatar-sm-1.jpg" alt=""></span>
					<span class="name">{{$msg->name}}</span>
					<span class="desc">{{Str::limit($msg->comments,30)}}</span>
					<span class="time">{{date_format($msg->created_at,'Y-M-d')}}<br>{{date_format($msg->created_at,'h:m')}} </span>
				</a>
			</li>
			@endforeach
			@endif
			
			
		</ul>
		<!-- /.notice-list -->
		<a href="{{route('admin.contact')}}" class="notice-read-more">{{__('admin/header.see_all_message')}} <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
<div id="unActiveUser" class="notice-popup" >
	<h2 class="popup-title">{{__('admin/header.new_user')}}<a href="#" class="pull-right text-danger">{{__('admin/header.new_user')}}</a></h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			@if(count(unActiveUser())>0)
			@foreach(unActiveUser() as $key=>$user)
			<li>
				<a href="{{route('admin.users.show',$user -> uuid)}}">
					<span class="avatar"><img src="/admin/assets/images/avatar-sm-1.jpg" alt=""></span>
					<span class="name">{{$user->name}} - {{$user->wilaya->name}}</span>
					<span class="desc">{{$user->email}}</span>
					@if($user->type_compte == 0)
                        <span class="text-info">
                            Particulier
                        </span>
                    @elseif($user->type_compte == 1)
                        <span class="text-warning">
                            Artisanat
                        </span>
                    @elseif($user->type_compte == 2)
                        <span class="text-danger">
                            Proffessionnelle 
                        </span>
                    @elseif($user->type_compte == 3)
                        <span class="text-success">
                            Boutique
                        </span>
                    @endif
					
					<span class="time">{{date_format($user->created_at,'Y-M-d')}}<br>{{date_format($user->created_at,'h:m')}} </span>
				</a>
			</li>
			@endforeach
			@endif
			
			
		</ul>
		<!-- /.notice-list -->
		<a href="{{route('admin.users')}}" class="notice-read-more">{{__('admin/header.see_all_users')}} <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>

<div id="unActiveAnnonce" class="notice-popup" >
	<h2 class="popup-title">{{__('admin/header.new_annonce')}}
		<a href="#" class="pull-right text-danger">{{__('admin/header.new_annonce')}}
	</a></h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			@if(count(unActiveAnnonce())>0)
			@foreach(unActiveAnnonce() as $key=>$annonce)
			<li>
				<a href="{{route('admin.annonces.show',$annonce -> uuid)}}">
					<span class="avatar"><img src="/admin/assets/images/avatar-sm-1.jpg" alt=""></span>
					<span class="name">{{$annonce->titre}} - {{$annonce->user->name}}</span>
					<span class="desc">{{$annonce->category->name}}</span>
					
					<span class="time">{{date_format($annonce->created_at,'Y-M-d')}}<br>{{date_format($annonce->created_at,'h:m')}} </span>
				</a>
			</li>
			@endforeach
			@endif
			
			
		</ul>
		<!-- /.notice-list -->
		<a href="{{route('admin.annonces')}}" class="notice-read-more">{{__('admin/header.see_all_annonce')}} <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>

<div id="unActiveAlbum" class="notice-popup" >
	<h2 class="popup-title">Nouveaux albums
		<a href="#" class="pull-right text-danger">Nouveaux albums
	</a></h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			@if(count(unActiveAlbum())>0)
			@foreach(unActiveAlbum() as $key=>$album)
			<li>
				<a href="{{route('admin.albums.show',$album -> uuid)}}">
					<span class="avatar"><img src="/admin/assets/images/avatar-sm-1.jpg" alt=""></span>
					<span class="name">{{$album->title}} - {{$album->user ? $album ->user->name : 'utilisateur supprimée'}}</span>
					
					<span class="time">{{date_format($album->created_at,'Y-M-d')}}<br>{{date_format($album->created_at,'h:m')}} </span>
				</a>
			</li>
			@endforeach
			@endif
			
			
		</ul>
		<!-- /.notice-list -->
		<a href="{{route('admin.annonces')}}" class="notice-read-more">{{__('admin/header.see_all_annonce')}} <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
<!-- /#notification-popup -->