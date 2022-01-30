<!DOCTYPE html>
<html class="js" lang="fr" data-textdirection="{{app()-> getLocale() === 'ar' ? 'rtl' :'ltr'}}" >
<head>
 	<meta http-equiv="Content-Type" content="text/css; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="NeedClic, On entend par cette appellation des liaisons plus rapides, plus simple.
En effet, NeedClic facilitera tout contact entre les particuliers et les artisant, proffessionneles, les architectes, les ingénieures, les designers ainsi que le proprietqires des magasins " matière de construction ", électricité, plombier, électroménager et meuble ...
Notre contribution sociale se résumera dans la gratuité des boutiques des créateurs d'oeuvres d'art en vue de la commercialisation de leur créations ainsi qu'une sorte de recyclage d'objets de mason par le biais des boutiques gratuites pour les particuliers voulant vendre leurs objet de maison.">
	<meta name="author" content="NeedClic">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NeedClic | @yield('title')</title>
    <!-- Bootstrap core CSS -->
        <link href="{{asset('users/css/normalize.css')}}" rel="stylesheet">
        <link href="{{asset('users/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('users/css/animate.css')}}" rel="stylesheet">
        <!-- Ico font CSS -->
        <link href="{{asset('users/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('users/fonts/icofont/css/icofont.css')}}" rel="stylesheet">
        <link href="{{asset('users/fonts/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!-- Style CSS -->
        @if(app()->getLocale() === 'ar')
        	<style type="text/css">

        		.col-lg-4{
        			float: right
        		}

        	</style>
       		<link href="{{asset('users/css/rtl/style.css')}}" rel="stylesheet">
   		@else
       		<link href="{{asset('users/css/ltr/style.css')}}" rel="stylesheet">
   		@endif
        <link href="{{asset('users/css/star-rating-svg.css')}}" rel="stylesheet">

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>          
        <![endif]-->
        <!-- Favicons -->
        <link rel="shortcut icon" href="{{asset('AnnonceDz/public/Logo/'.Setting()->logo.'/'.Setting()->logo)}}" type="image/x-icon"> 


	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

   	<style type="text/css">
       .flex-control-paging li a {display: none;}
       .boxes .title {
            font-size: 13px;
            font-weight: bold;
            font-family: 'Lato', Arial, Helvetica, sans-serif;
            margin-top: 15px;
            margin-bottom: 5px;
            text-transform: uppercase;
            padding-bottom: 10px;
        }
        @media(max-width: 767px){
            .main_menu {
                padding-bottom: 100px;
                background-color: #FFF;
            }
        }
    
        .parallax{
            background-image: url('/users/img/menu2.png');

        }
   


    </style>
    @yield('style')


</head>
<body>
	{{-- <div id="preloader"><div class="clear-loading loading-effect-3"><div><span></span></div></div><h1>Loading</h1></div> --}}
    <div id="top"></div>
    @include('users.includes.mainMenu')
    @yield('content')
    @include('users.includes.footer')

    @include('users.includes.register.registerType')
    @include('users.includes.search.searchModal')
  

    <!-- <a class="showit scrollToTop" href="#" id="backToTop" style="background-color: DodgerBlue;"><i class="fa fa-angle-up"></i></a> -->
    <!-- <a class="showit" href="#" id="" data-toggle="modal" data-target="#filter"  style="background-color: DodgerBlue;height: 50px;width: 50px"><i class="fa fa-filter" style="font-size: 25px"></i></a> -->
    


	<script src="{{asset('users/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('users/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('users/js/bootstrap.js')}}"></script>
    <script src="{{asset('users/js/jquery.parallax.js')}}"></script>
    <script src="{{asset('users/js/jquery.fitvids.js')}}"></script>
    <script src="{{asset('users/js/jquery.unveilEffects.js')}}"></script>
    
    <script src="{{asset('users/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('users/js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('users/js/nicescroll.js')}}"></script>
    <script src="{{asset('users/js/main.js')}}"></script>
    <script src="{{asset('users/js/jquery.star-rating-svg.js')}}"></script>

    <!-- FlexSlider JavaScript
    ================================================== -->
     <script src="{{asset('users/js/jquery.flexslider.js')}}"></script>
     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
     
    <script>
           
            
        </script>
<script src="{{asset('users/js/jquery.star-rating-svg.js')}}"></script>
        
    <script type="text/javascript">
     $('#search').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var modal = $(this)
        });
     
     $(".my-rating-5").starRating({
        starSize: 19,

        callback: function(currentRating, $el){

            var compte_uuid;
            var user_review_uuid; 
            compte_uuid = $('.a').attr('data-compte_uuid');
            user_review_uuid = $('.a').attr('data-user_review_uuid');
           $.ajax({
            type: "get",
            data:{
                'compte_uuid': compte_uuid,
                'user_review_uuid': user_review_uuid,
                'rating' : currentRating,
            },
            url:"/account-rating",
            success:function(response){
                
            }
        });
        }
    });
$(".my-rating").starRating({
        starSize: 19,
        readOnly: true,

        callback: function(currentRating, $el){

        }
    });
function getRating() {
        id = $('.my-rating').attr('data-id');
        $.ajax({
            type: "GET",
            url:"/get-rating/"+id,
            success:function(response){
                console.log(response.rating);
                var sum = 0;
                var rating = response.rating;
                var totalUser = rating.length;
                for(i=0;i<rating.length;i++){
                    sum += parseFloat(rating[i]['rating']);
                }
                var avg = sum/rating.length;
                var totalRate = parseFloat(avg.toFixed(1));
                $(".my-rating").attr('data-rating',totalRate);
            }
        });

        };
       // setTimeout(getRating, 500);
    </script>
<script type="text/javascript">
   
</script>
<script type="text/javascript">
     $('.wilaya_id').on('change',function(e){
        var wilaya_id = e.target.value;
        
        $('.commune_id').empty();

        //ajax
        $.ajax({
            type: "GET",
            url: "/users/get-commune/"+wilaya_id,
            success:function(communes){

                if(communes.length != 0){

                    communes.forEach(element =>
                    {
                        $('.commune_id').append('<option value="' +element.id+'">'+ element.name+'</option>');
                    });
                }
            }
            });
        });

     $('#type').on('change',function(e){
        var type = e.target.value;
       
        $('#category_id').empty();
        //ajax
        $.ajax({
            type: "GET",
            url: "/users/get-category/"+type,
            success:function(categories){
                if(categories.length != 0){
                    categories.forEach(element =>
                    {
                        $('#category_id').append('<option value="' +element.id+'">'+ element.name+'</option>');
                    });
                }
            }
            });
        });

   

    $('#type').on('change',function(e){
        var type = e.target.value;

        if(type == 0){
            $('#category').css('display','none');
            $('#service').css('display','block');
        }else{
            $('#service').css('display','none');
            $('#category').css('display','block');
        
        }       
    });
</script>

	@yield('script')

</body>
</html>
