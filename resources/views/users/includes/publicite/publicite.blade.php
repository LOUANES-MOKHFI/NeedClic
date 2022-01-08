
<section id="one-parallax" class="parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="mapandslider">
            <div class="overlay1 dm-shadow" style="padding-top: 5px; padding-bottom: 5px;">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="" class="clearfix">
                                <div class="flexslider">
                                    <ul class="slides">
                                        @isset($pubs)
                                        @foreach($pubs as $key => $pub)
                                        <li>
                                            <img style="height: 160px" src="{{asset('AnnonceDz/public/Publicite/'.$pub->title.'/'.$pub->image)}}" alt="">
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul><!-- end slides -->
                                </div><!-- end flexslider -->
                            </div><!-- end property-slider -->
                        </div><!-- end col-lg-8 -->

                    </div><!-- end row -->
                </div><!-- end dm_container -->
            </div>
        </div>
    </section><!-- end mapandslider -->