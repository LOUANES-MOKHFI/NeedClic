@extends('users.layouts.master')
@section('title')
	{{$user->name}}
@endsection
@section('style')
<style type="text/css">
    .red{
        color: red;
    }
    @media(min-width: 676px){
        .imgg{
            height: 220px;
        }
    }
</style>
@endsection
@section('content')
    @include('users.includes.modal.UnAuthReviews')

<div class="col-lg-12">
    <ul class="breadcrumb">
        <li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
        <li>{{$user->name}} </li>
    </ul>
</div>
        <section class="generalwrapper dm-shadow clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="agents_widget boxes">
                            <h3 class="" style="font-size:26px;font-weight: bold;">
                                {{$user->name}} <br>  
                                <large>
                                    @if($user->type_compte == 0)
                                            <span class="text-info">
                                                {{$user->category ? $user->category->name : "categorie n'exsite pas"}}                           
                                            </span>
                                    @elseif($user->type_compte == 1)
                                            <span class="text-warning">
                                                {{$user->category ? $user->category->name : "categorie n'exsite pas"}}                           
                                            </span>
                                    @elseif($user->type_compte == 2)
                                            <span class="text-danger"> 
                                                 {{$user->category ? $user->category->name : "categorie n'exsite pas"}}
                                            </span>
                                    @elseif($user->type_compte == 3)<span class="text-success">
                                        {{DetailUser($user->id) ? DetailUser($user->id)->service->name : "Service n'exsite pas"}}                           
                                    </span>
                                    @endif
                                </large>
                            </h3>
                            <div class="my-rating" data-rating="{{$user->avg_rating}}" disabled></div>
                            @if(Auth::check())
                                <div><h4>Votre évaluation: </h4><div class="my-rating-5 a" @if($usersReviews) data-rating="{{$usersReviews->rating}}" @else data-rating="0" @endif  data-compte_uuid="{{$user->uuid}}"  data-user_review_uuid="{{Auth::user()->uuid}}"></div></div>
                            @else
                                <div><h4>Votre évaluation: </h4><div class="my-rating-5 unAuth" data-toggle="modal" data-target="#UnAuthReviews" ></div></div>
                            @endif
                        </div>
                    </div>
                    <div id="right_sidebar" class="col-lg-3 col-md-3 col-xs-4 last clearfix">
                        <div class="widget">
                            <ul class="pro-info_widget">
                                <li class="nav-item">
                                    <a href="#" class="">
                                        <img class="img-responsive img-thumbnail imgg width-100-100" src="{{asset('AnnonceDz/public/User/'.$user->name.'/'.$user->image)}}" alt="">
                                    </a>
                                </li><!-- /.nav-item -->


                            </ul><!-- /.nav-style-primary -->
                            
                        </div>
                        <!-- agent details --> 
                    </div>
                    <div id="content" class="col-lg-9 col-md-9 col-xs-8 clearfix">

                        <div class="agent_boxes boxes clearfix">
                            <div class="agent_details clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="agents_widget">
                                        <div class="agencies_widget row">
                                            
                                            <div class="col-lg-12 clearfix">
                                                <div class="agent_meta clearfix">
                                                    <span><i class="fa fa-envelope"></i> <a href="mailto:{{$user->email}}">{{$user->email}}</a></span>
                                                    <span><i class="fa fa-map-marker"></i> {{$user->wilaya->name}}</span>
                                                    <span><i class="fa fa-map-marker"></i> {{$user->commune->name}}</span>
                                                    @if($user->type_compte == 3)
                                                    <span><i class="fa fa-map-marker"></i> {{$detail->adress}}</span>
                                                    @endif
                                                        
                                                    
                                                    <span><i class="fa fa-phone-square"></i> <a id="num" href="tel:{{$user->num_tlfn}}"><i class="spanNum" style="display:inline;"></i><i class="spanNum1" style="display:inline;padding-left:-10px;background-color: rgba(0,0,255,0.3);color: transparent;"></i>Appeler</a>  </span>

                                                    @if($user->type_compte == 2)
                                                    
                                                    <span><i class="fa fa-university"></i>{{$detail->diplome}}</span>
                                                    @elseif($user->type_compte == 3)
                                                    <span><i class="fa fa-twitter-square"></i> {{$detail->service->name}}</span>
                                                    @endif
                                                    @if($user->type_compte == 2)
                                                    {!! Html_entity_decode($detail->description) !!}
                                                    @endif
                                                   
                                                </div><!-- end agent_meta -->
                                            </div><!-- end col-lg-7 -->
                                            <div class="clearfix"></div>
                                            <hr>
                                        </div><!-- end agencies_widget -->
                                    </div><!-- agents_widget -->
                                </div><!-- end col-lg-7 -->
                            </div><!-- end agent_details -->
                        </div><!-- end agent_boxes --> 
                                          
                    </div><!-- end content --> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="clearfix">
                            
                            @if($user->type_compte == 2)
                            
                            <div class="clearfix row">
                            
                                @isset($user->albums)
                                    @foreach($user->albums as $key=> $album)
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                            <div class="boxes first" data-effect="slide-bottom">
                                                <div class="ImageWrapper big-ImageWrapper boxes_img">
                                                    <a href="{{route('users.albums.showAlbum',$album->uuid)}}" style="color:Dodgerblue">
                                                    <img class="img-responsive" src="{{asset('AnnonceDz/public/Albums/'.$album->id.'/'.$album->attachements[0]->file_name)}}" alt="{{$album->name}}">
                                                    </a>
                                                    <div class="Buttons StyleSc">
                                                       
                                                    <h2 class="title" >

                                                        <a href="{{route('users.albums.showAlbum',$album->uuid)}}" style="color:Dodgerblue"> {{$album->title}}</a>
                                                    </h2>
                                                    </div>
                                                </div>
                                               

                                            </div><!-- end boxes -->
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                            @else
                           <!-- <h3 class="big_title">{{__('users/annonce.annonce')}}</h3> -->

                            <div class="clearfix row">
                                @isset($user->annonces)
                                    @foreach($user->annonces as $key=> $annonce)
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                            <div class="boxes first" data-effect="slide-bottom">
                                                <div class="ImageWrapper big-ImageWrapper boxes_img">
                                                    <a href="{{route('annonces.show',$annonce->uuid)}}">
                                                    <img class="img-responsive" src="{{asset('AnnonceDz/public/Annonces/'.$annonce->titre.'/'.$annonce->attachements[0]->file_name)}}" alt="{{$annonce->titre}}">
                                                    </a>

                                                    <!-- <div class="box_type">{{$annonce->prix}}</div> -->

                                                </div>
                                                <h2 class="title">
                                                    @if(Auth::check())
                                                        @if($annonce->user->type_compte == 1)
                                                            
                                                            <a href="#" class="Like nav-link" data-uuid="{{$annonce->user->uuid}}" data-annonce_id="{{$annonce->id}}" data-user_uuid="{{Auth::user()->uuid}}" title="J'aime">
                                                            <i class="fa fa-heart ann{{$annonce->id}} @if(in_array($annonce->id, $usersLike) ) red @endif}} "
                                                                 style="font-size: 20px"></i>
                                                            </a>
                                                      

                                                        @endif
                                                    @endif
                                                    <a href="{{route('annonces.show',$annonce->uuid)}}"> {{$annonce->titre}}</a>
                                                </h2>

                                            </div><!-- end boxes -->
                                        </div>
                                    @endforeach
                                @endisset
                            
                            </div>
                            @endif    
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->

@endsection

@section('script')
<script src="{{asset('users/js/jquery.star-rating-svg.js')}}"></script>
<script type="text/javascript">
    $(document).on('click', '.unAuth', function () {

         $('.UnAuthReviews').css('display','block');
        
    })
</script>
<script type="text/javascript">
    $( document ).ready(function() {
        //console.log( "ready!" );
        var num = $("#num").attr('href');
       // console.log(num);
        //console.log(num.substring(4, 8));
        newNum = num.substring(4, 8);
        newNum1 = num.substring(8, 18);
        //$('.spanNum').html(newNum);
        //$('.spanNum1').html(newNum1);
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.Like', function () {

        var compte_uuid;
        var annonce_id;
        compte_uuid = $(this).attr('data-uuid');
        
        annonce_id = $(this).attr('data-annonce_id');
       
        var user_uuid = $(this).attr('data-user_uuid');
       
        $('.ann'+annonce_id).css('color','red');
        //alert(uuid);
        Like(compte_uuid,user_uuid,annonce_id);
    })

    function Like(compte_uuid,user_uuid,annonce_id){
        $.ajax({
            type: "GET",
            url:"/compte-like/"+compte_uuid+"/"+user_uuid+"/"+annonce_id,
            success:function(response){
                status = response.status;
                if(status == 200){
                    //alert('Success');
                    $('.ann'+annonce_id).css('color','red');
                }else{
                    if(status == 201){
                        //alert('Success');
                        $('.ann'+annonce_id).css('color','#F6700E');
                    }
                }
            }
        });
    }
</script>
@endsection
