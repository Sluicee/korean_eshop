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
        
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="/css/app.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
<body>
    @include('inc.admin.header')
    @include('inc.admin.nav')
    @include('inc.messages')
    @yield('content')
    @include('inc.admin.footer')

    <script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/slick.min.js"></script>
	<script src="/js/nouislider.min.js"></script>
	<script src="/js/jquery.zoom.min.js"></script>
	<script src="/js/app.js"></script>
	<script>
		let pages = document.querySelectorAll('.edit_category');
        let editButton = document.querySelectorAll('.edit_btn');
        let cancelButton = document.querySelectorAll('.cancel_btn');
        
        // for (var i = 0; i < editButton.length; i++) {
        //     editButton[i].addEventListener("click", function () {
        //         pages.forEach(function(field) {
        //             field.classList.toggle('cat_new_name_disabled');
        //         });
        //     });
        // }

        // for (var i = 0; i < cancelButton.length; i++) {
        //     cancelButton[i].addEventListener("click", function () {
        //         pages.forEach(function(field) {
        //             field.classList.toggle('cat_new_name_disabled');
        //         });
        //     });
        // }

        $('.edit_btn').click(function() {
			var element = $(this).parent('tr')
			console.log(element);
            $('.edit_category').toggleClass('cat_new_name_disabled');
        })

		$('.cancel_btn').click(function() {
			console.log($(this).parents()[1]);
            $('.edit_category').toggleClass('cat_new_name_disabled');
            document.getElementById('cat_edit_form').reset();
        })

        // const cat_new_name = document.querySelector('.cat_new_name');
        // const endInput = document.getElementById('new_cat_name');

        // cat_new_name.oninput = function() {
        //     endInput.value = cat_new_name.value;
        // };
	</script>
	
</body>
</html>