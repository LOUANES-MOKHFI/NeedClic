<style type="text/css">
    #footer a.social.fa-twitter   { background:#41b7d8!important; color:#fff!important; }
#footer a.social.fa-facebook  { background:#3b5997!important; color:#fff!important; }
#footer a.social.fa-google-plus   { background:#d64937!important; color:#fff!important; }
#footer a.social.fa-linkedin  { background:#0073b2!important; color:#fff!important; }
#footer a.social.fa-instagram     { background:#cb2027!important; color:#fff!important; }
#footer a.social.fa-vimeo-square  { background:#388fc5!important; color:#fff!important; }
#footer a.social.fa-youtube-square{ background:#A40F09!important; color:#fff!important; }
#footer a.social.fa-flickr    { background:#ff0084!important; color:#fff!important; }
#footer a.social.fa-pinterest     { background:#cb2027!important; color:#fff!important; }
#footer a.social.fa-skype     { background:#00aff0!important; color:#fff!important; }
#footer a.social.fa-rss       { background:#e0812a!important; color:#fff!important; }
#footer a.social.default      { background:#37353A!important; color:#fff!important; }
#footer a.social.rounded        { width:38px; height:38px; line-height:38px; }
</style>
<footer id="footer" class="parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="container">
            <div class="row">
                <!-- col #1 -->
                <div class="logo_footer col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <img alt="" src="{{asset('AnnonceDz/public/Logo/'.Setting()->logo.'/'.Setting()->logo)}}" class="footer-logo" style="height: 120px;width: 200px"> 
                    <p class="block" style="color:black;">
                        {{Setting()->slogon}}
                    </p>
                </div>
                <!-- /col #1 -->
                <!-- col #2 -->
                <!-- <div class="spaced col-md-3 col-sm-4 hidden-xs">
                    <h4>{{__('users/footer.last_blog')}}</h4>
                    <ul class="list-unstyled">
                        @if(!empty(LastBlog()))
                        @foreach(LastBlog() as $key => $blog)
                        <li>
                            <a class="block" href="{{route('blogs.show',$blog->uuid)}}">{{$blog->titre}}</a><br>
                            <small>{{date_format($blog->created_at,'M Y, d')}}</small>
                        </li>
                        @endforeach
                        @endif
                        
                    </ul>
                </div> -->
                <!-- /col #2 -->

                <!-- col #3 -->
                
                <!-- /col #3 -->
                <!-- col #4 -->
                <div class="spaced col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h4 style="color:black;">{{__('users/footer.about')}}</h4>
                    <p style="color:black;">
                        {{Setting()->about}}
                    </p>
                    <p class="block"><!-- social -->
                        @if(!empty(Setting()->facebook))<a href="{{Setting()->facebook}}" class="social fa fa-facebook"></a>@endif
                        @if(!empty(Setting()->twitter))<a href="{{Setting()->twitter}}" class="social fa fa-twitter"></a>@endif
                        @if(!empty(Setting()->email))<a href="{{Setting()->email}}" class="social fa fa-google-plus"></a>@endif
                        @if(!empty(Setting()->linkedin))<a href="{{Setting()->linkedin}}" class="social fa fa-linkedin"></a>@endif
                        @if(!empty(Setting()->instagram))<a href="{{Setting()->instagram}}" class="social fa fa-instagram"></a>@endif
                        @if(!empty(Setting()->phone))<a href="tel:{{Setting()->phone}}" class="social fa fa-phone"></a>@endif
                    </p><!-- /social -->
                </div>
                <!-- <div class="spaced col-md-3 col-sm-4 hidden-xs">
                    <h4>{{__('users/footer.last_annonce')}}</h4>
                    <ul class="list-unstyled">
                        @if(!empty(LastAnnonces()))
                        @foreach(LastAnnonces() as $key => $annonce)
                        <li>
                            <a class="block" href="{{route('annonces.show',$annonce->uuid)}}">{{$annonce->titre}}</a><br>
                            <small>{{date_format($annonce->created_at,'M Y, d')}}</small>
                        </li>
                        @endforeach
                        @endif
                        
                    </ul>
                </div> -->
                <!-- /col #4 -->
            </div>
        </div>
        <hr>
        <div class="copyright">
            <div class="container text-center fsize12">
                 • Copyright &copy; {{ date('Y')}} {{Setting()->droit_auteur}} • &nbsp;
            </div>
        </div>
    </footer>