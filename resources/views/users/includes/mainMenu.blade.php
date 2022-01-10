<div class="main_menu fixed_menu parallax" id="menu" style="background-image: url('/users/img/01_parallax.jpeg');"
    data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="container">
            <div class="wrapper">
                <div class="header-logo">
                    <a href="{{route('home')}}"><img src="{{asset('AnnonceDz/public/Logo/'.Setting()->logo.'/'.Setting()->logo)}}" alt="NeedClic" class="img-responsive" style="height: 90px;width: 100px"></a>
                </div> <!-- End .header-logo -->
                <div class="btn-cnt-mn">
                
                   <!--  <a href="#" class="dropdown-item btn-sumbit-menu" data-toggle="modal" data-target="#search" data-original-title="Rechercher un annonce" style="background-color: DodgerBlue;">
                        <i class="fa fa-search"></i>
                    </a> -->

                    <div class="dropdown profile-menu-settings" style="">

                        <button class="btn-dropdown dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true">
                            <img src="/users/img/home/login-icone.png" alt="NeedClic" class="user-avatar-md rounded-circle" width="35" height="35" style="color: DodgerBlue" >
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu3" style="background-color: DodgerBlue;">      
                            @guest                            
                                <li class="">
                                    <a href="{{ route('login') }}" class="nav-link">
                                         {{__('users/menu.login')}}
                                    </a>
                                </li>  
                                @if (Route::has('register'))                               
                                    <li class="">
                                        <a onclick="document.getElementById('type_register').style.display='block'" href="#" class="nav-link">
                                            {{__('users/menu.register')}}
                                        </a>
                                    </li>  
                                @endif
                            @else       
                            @if(Auth::user()->type_compte == 4)                
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{route('users.dashboard')}}" class="nav-link">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            @endif

                            <li class="">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{__('users/menu.logout')}}
                              </a>
                            </li>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                              </form>
                            @endguest
                            
                        </ul>
                    </div> <!-- End .dropdown -->    
                    <!-- <div class="langue-currency-menu profile-menu-settings1">
                        <div class="dropdown btn btn-info" style="background-color: DodgerBlue;">
                            
                            <button class="btn-dropdown dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" >
                                
                                {{App::getLocale()}} 
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="background-color: DodgerBlue;">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li><a id="{{ $localeCode }}" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a></li>
                                @endforeach
                            </ul>
                        </div> 
                    </div> -->
                
                    <!-- Menu ______________ -->
                </div>
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> <!-- End .navbar-header -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="">
                                <a href="{{route('home')}}">{{__('users/menu.home')}}</a>
                            </li>
                            {{-- <li class="">
                                <a href="{{route('annonces')}}">{{__('users/menu.annonces')}}</a>
                            </li> --}}

                            <li class="">
                                <a href="{{route('blogs')}}">{{__('users/menu.blogs')}}</a>
                            </li>
                            <li class="">
                                <a href="{{route('about')}}">{{__('users/menu.about')}}</a>
                            </li>

                            <li class="">
                                <a href="{{route('contact')}}">{{__('users/menu.contact')}}</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav> <!-- End .navbar -->
                <!-- End Menu __________ -->
            </div>  <!-- End .wrapper -->
        </div> <!-- End .container -->
    </div>