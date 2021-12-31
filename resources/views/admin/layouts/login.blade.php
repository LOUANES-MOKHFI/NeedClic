<!DOCTYPE html>
<html class="js" lang="en" data-textdirection="{{app()-> getLocale() === 'ar' ? 'rtl' :'ltr'}}" dir="{{app()-> getLocale() === 'ar' ? 'rtl' :'ltr'}}">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="NeedClic">
	<meta name="author" content="NeedClic">
	<meta name="title" content="NeedClic">

    <title>@yield('title')</title>

	<link rel="stylesheet" href="{{asset('/admin/assets/styles/light/style.css')}}">


	<link rel="stylesheet" href="{{asset('admin/assets/plugin/waves/waves.min.css')}}">

	<link rel="stylesheet" type="text/css" href="#" id="test">
<script type="text/javascript">
	function dark() {

		$("#test").attr("href", "/admin/assets/styles/dark/style-dark.css");
}
	function light() {
			$("#test").attr("href", "");
	}

</script>





    @yield('style')

</head>
<body>

	<div id="single-wrapper">

	@yield('content')
	</div>
	<!-- /.main-content -->


	<script src="{{asset('admin/assets/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('admin/assets/plugin/waves/waves.min.js')}}"></script>

	<script src="{{asset('admin/assets/scripts/main.min.js')}}"></script>

	@yield('script')
</body>
</html>
