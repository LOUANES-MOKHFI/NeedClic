<!DOCTYPE html>
<html class="js" lang="fr" data-textdirection="{{app()-> getLocale() === 'ar' ? 'rtl' :'ltr'}}" dir="{{app()-> getLocale() === 'ar' ? 'rtl' :'ltr'}}">
<head>
 	<meta http-equiv="Content-Type" content="text/css; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="NeedClic, On entend par cette appellation des liaisons plus rapides, plus simple.
En effet, NeedClic facilitera tout contact entre les particuliers et les artisant, proffessionneles, les architectes, les ingénieures, les designers ainsi que le proprietqires des magasins " matière de construction ", électricité, plombier, électroménager et meuble ...
Notre contribution sociale se résumera dans la gratuité des boutiques des créateurs d'oeuvres d'art en vue de la commercialisation de leur créations ainsi qu'une sorte de recyclage d'objets de mason par le biais des boutiques gratuites pour les particuliers voulant vendre leurs objet de maison.">
	<meta name="author" content="NeedClic">
	<link rel="shortcut icon" href="{{asset('AnnonceDz/public/Logo/'.Setting()->logo.'/'.Setting()->logo)}}" type="image/x-icon"> 


    <title>@yield('title')</title>

	<link rel="stylesheet" href="{{asset('/admin/assets/styles/light/style.min.css')}}">

	<link rel="stylesheet" href="{{asset('admin/assets/fonts/material-design/css/materialdesignicons.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/plugin/waves/waves.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/plugin/sweet-alert/sweetalert.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/plugin/chart/morris/morris.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('admin/assets/plugin/fullcalendar/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/plugin/fullcalendar/fullcalendar.print.css')}}" media='print'> -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/select2/css/select2.min.css')}}">
<!-- Remodal -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/modal/remodal/remodal.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/plugin/modal/remodal/remodal-default-theme.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/notify/css/notifIt.css')}}">


	<link rel="stylesheet" type="text/css" href="#" id="test">
	<script type="text/javascript">
		function dark() {

			$("#test").attr("href", "/admin/assets/styles/dark/style-dark.css");
	}
		function light() {
				$("#test").attr("href", "");
		}
	</script>
	@if(app()-> getLocale() === 'ar')
   		<link rel="stylesheet" href="{{asset('/admin/assets/rtl/style-rtl.min.css')}}">
    @endif




   	<link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/media/css/dataTables.bootstrap.min.css')}}">
   	<link rel="stylesheet" href="{{asset('admin/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugin/tinymce/skins/lightgray/skin.min.css')}}">
	<!-- Must include this script FIRST -->
	<script src="{{asset('admin/assets/plugin/tinymce/tinymce.min.js')}}"></script>
    @yield('style')


</head>
<body>
@include('admin.includes.sidebar')

<!-- /.main-menu -->
@include('admin.includes.header')
<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
        @include('admin.includes.alerts.notify')
		@yield('content')
        <form action="post"></form>
        @include('admin.includes.footer')

	</div>

	<!-- /.main-content -->
</div>
<script src="{{asset('admin/assets/scripts/jquery.min.js')}}"></script>
    <!-- pusher -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


	<script src="{{asset('admin/assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/waves/waves.min.js')}}"></script>

		<!-- Morris Chart -->
	<script src="{{asset('admin/assets/plugin/chart/morris/morris.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/chart/morris/raphael-min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/chart.morris.init.min.js')}}"></script>

	<!-- Flot Chart -->
	<script src="{{asset('admin/assets/plugin/chart/plot/jquery.flot.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/chart/plot/jquery.flot.tooltip.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/chart/plot/jquery.flot.categories.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/chart/plot/jquery.flot.pie.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/chart/plot/jquery.flot.stack.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/chart.flot.init.min.js')}}"></script>

		<!-- Sparkline Chart -->
	<script src="{{asset('admin/assets/plugin/chart/sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/chart.sparkline.init.min.js')}}"></script>

		<!-- FullCalendar -->
	<script src="{{asset('admin/assets/plugin/moment/moment.js')}}"></script>
	<!--<script src="{{asset('admin/assets/plugin/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/fullcalendar.init.js')}}"></script> -->
	<script src="{{asset('admin/assets/scripts/main.min.js')}}"></script>

	<!-- Data Tables -->
	<script src="{{asset('admin/assets/plugin/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>

	<script src="{{asset('admin/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>

	<script src="{{asset('admin/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js')}}"></script>

	<script src="{{asset('admin/assets/scripts/datatables.demo.min.js')}}"></script>
    <!-- Select2 -->
	<script src="{{asset('admin/assets/plugin/select2/js/select2.min.js')}}"></script>


	<script src="{{asset('admin/assets/plugin/modal/remodal/remodal.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('admin/assets/scripts/fileUpload.demo.min.js')}}"></script>

    <script src="{{asset('admin/assets/plugin/notify/js/notifIt.js')}}"></script>
    <script src="{{asset('admin/assets/plugin/notify/js/notifit-custom.js')}}"></script>

	@yield('script')

</body>
</html>
