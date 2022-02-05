@extends('users.layouts.master')
@section('title')
    {{__('users/auth.register')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/dropify/css/dropify.min.css')}}">

@endsection
@section('content')
    <section id="one-parallax" class="post-wrapper-top dm-shadow clearfix parallax" style="background-image: url('/users/img/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <div class="overlay1 dm-shadow">
            <div class="container">
                <div class="post-wrapper-top-shadow">
                    <span class="s1"></span>
                </div>
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}">{{__('users/annonce.home')}}</a></li>
                        <li>{{__('users/auth.proffessionnelle')}}</li>
                    </ul>
                    <h2>{{__('users/auth.proffessionnelle')}}</h2>
                </div>
            </div>
        </div>
    </section>
     <section class="generalwrapper dm-shadow clearfix">
            <div class="container">
                <div class="row">
                    
                    <div id="content" class="col-md-12 col-md-offset clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12">   
                            <div class="widget clearfix">
                                <div class="title">
                                    <h3>{{__('users/auth.proffessionnelle')}}</h3>
                                </div>
                                <form  method="POST" action="{{ route('register') }}" enctype='multipart/form-data'>
                                    @csrf
                                    <input type="hidden" name="type_compte" value="2">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="{{__('users/auth.name')}}">
                                        </div>
                                        @error('name')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{__('users/auth.email')}}">
                                        </div>
                                        @error('email')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <select name="type_compte_proff" class="form-control form-control-lg" id="type_compte_proff">
                                                <option value="" disabled="">-- {{__('users/auth.type')}} --</option>
                                                <option value="Ingénieure">{{__('users/home.ingenieur')}}</option>
                                                <option value="Artisant">{{__('users/home.artisant')}}</option>
                                            </select>
                                        </div>
                                        @error('type_compte_proff')
                                            <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-copyright"></i></span>
                                            <select name="category_id" class="form-control form-control-lg" required id="category_id">
                                            <option value="" >-- {{__('users/auth.category')}} --</option>
                                                @if(count(CategoriesProff()) > 0)
                                                    @foreach(CategoriesProff() as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="diplome" type="text" class="form-control @error('diplome') is-invalid @enderror" name="diplome" value="{{ old('diplome') }}" autocomplete="diplome" autofocus placeholder="{{__('users/auth.diplome')}}">
                                        </div>
                                        @error('diplome')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="niveaux" type="text" class="form-control @error('niveaux') is-invalid @enderror" name="niveaux" value="{{ old('niveaux') }}" autocomplete="niveaux" autofocus placeholder="{{__('users/auth.niveaux')}}">
                                        </div>
                                        @error('niveaux')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input id="num_tlfn" type="text" min="0" class="form-control @error('num_tlfn') is-invalid @enderror" name="num_tlfn" value="{{ old('num_tlfn') }}" autocomplete="num_tlfn" placeholder="{{__('users/auth.phone')}}">
                                        </div>
                                        @error('num_tlfn')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <select name="wilaya_id" required class="form-control form-control-lg" id="wilaya_id">
                                            <option value="">-- {{__('users/auth.wilaya')}} --</option>
                                                @if(count(Wilayas()) > 0)
                                                    @foreach(Wilayas() as $wilaya)
                                                        <option value="{{$wilaya->id}}">{{$wilaya->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @error('wilaya_id')
                                            <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <select name="commune_id" class="form-control form-control-lg @error('commune_id') is-invalid @enderror" id="commune_id">
                                            <option value="" disabled>-- {{__('users/auth.commune')}} --</option>
                                         
                                        </select>
                                        </div>
                                        @error('commune_id')
                                            <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="{{__('users/auth.password')}}">
                                        </div>
                                        @error('password')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="{{__('users/auth.confirmepassword')}}">
                                            
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <ul class="list-inline">
                                            @if(count(AbonnementProff()) > 0)
                                            @foreach(AbonnementProff() as $abonnement)
                                            <li>
                                                <div class="radio info">
                                                    <input type="radio" value="{{$abonnement->id}}" name="abonnement_id" id="radio-10"><label for="radio-10">{{$abonnement->duree.'-'.$abonnement->montant}}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div> -->
                                    @error("abonnement_id")
                                        <span class="text-danger"> {{$message}}  </span>
                                        @enderror
                                    
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">S{{__('users/auth.register')}}</button>
                                        <p>{{__('users/auth.avez_vous_compte')}} 
                                        <a class=" btn-link" href="{{ route('login') }}">
                                            {{__('users/auth.login')}}
                                        </a>
                                    </p>
                                    </div>
                                    
                                </form>
                            </div>
                        </div><!-- end login -->
                    </div><!-- end content -->
 
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->
 

@endsection

@section('script')
<script src="{{asset('admin/assets/plugin/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('admin/assets/scripts/fileUpload.demo.min.js')}}"></script>
<script type="text/javascript">
    $('#wilaya_id').on('change',function(e){
        var wilaya_id = e.target.value;
        $('#commune_id').empty();
        //ajax
        $.ajax({
            type: "GET",
            url: "/users/get-commune/"+wilaya_id,
            success:function(communes){
                if(communes.length != 0){
                    communes.forEach(element =>
                    {
                        $('#commune_id').append('<option value="' +element.id+'">'+ element.name+'</option>');
                    });
                }
            }
            });
        });
</script>
@endsection
