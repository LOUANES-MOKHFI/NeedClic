<section class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-xs-12" >
                    <div class="top_bar_info">
                        <p><i class="fa fa-phone"></i>{{Setting()->phone}}</p>
                        <p><i class="fa fa-envelope"></i>{{Setting()->email}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12 @if(app()-> getLocale() === 'ar') pull-left @else pull-right @endif top-asad-right pl0">
                    <div class="top_bar_social">
                        @if(!empty(Setting()->facebook))<a class="fac" href="{{Setting()->facebook}}"><i class="fa fa-facebook"></i></a>@endif
                        @if(!empty(Setting()->twitter))<a class="fac" href="{{Setting()->twitter}}"><i class="fa fa-twitter"></i></a>@endif
                        @if(!empty(Setting()->email))<a class="fac" href="{{Setting()->email}}"><i class="fa fa-google-plus"></i></a>@endif
                        @if(!empty(Setting()->linkedin))<a class="fac" href="{{Setting()->linkedin}}"><i class="fa fa-linkedin"></i></a>@endif
                       
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-12 @if(app()-> getLocale() === 'ar') pull-left @else pull-right @endif top-asad-right ">
                    <div class="langue-currency-menu ">
                        <div class="dropdown">
                            <i class="icofont icofont-world"></i>
                            <button class="btn-dropdown dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true">
                                {{App::getLocale()}} 
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li><a id="{{ $localeCode }}" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a></li>
                                @endforeach
                            </ul>
                        </div> <!-- End .dropdown -->
                    </div>
                </div>

            </div>
        </div>
    </section>