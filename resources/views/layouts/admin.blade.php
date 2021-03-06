<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>@yield('title-block')</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="/css/font-awesome.min.css">

        <!-- Rich Text Editor -->
        <link rel="stylesheet" href="/css/trumbowyg.min.css">

		<!-- Data Tables -->
        <link rel="stylesheet" type="text/css" href="/css/datatables.min.css"/>
        
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="/css/app.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/bootstrap.bundle.min.js"></script>
		<script src="/js/slick.min.js"></script>
		<script src="/js/nouislider.min.js"></script>
		<script src="/js/jquery.zoom.min.js"></script>
		<script src="/js/trumbowyg.min.js"></script>
		<script src="/js/datatables.min.js"></script>
    </head>
<body>
    @include('inc.admin.header')
    @include('inc.admin.nav')
    @include('inc.messages')
    @yield('content')
    @include('inc.admin.footer')
	
    
	<script src="/js/app.js"></script>
	<script>
		$.trumbowyg.svgPath = '/css/icons.svg';
		$('.richtextarea').trumbowyg();
		$('.dataTable').DataTable();
		$('.tooltip_bs').tooltip({ boundary: 'window' })
	</script>
	@include('inc.scripts')
</body>
</html>