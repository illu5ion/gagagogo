<!DOCTYPE html>
<html>
<head>
	<title>{{ Config::get('site.application_name') }} {{ Config::get('site.title_seperator', '::') }} {{ trans('installer.installer') }} </title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap -->
	<link href="{{ URL::to('assets/home/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
	
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	<link rel="shortcut icon" href="{{ URL::to('assets/public/uploads/favicon.ico') }}" type="image/x-icon"/>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="{{ URL::to('assets/home/js/tweaks/html5shiv.js') }}"></script>
		<script src="{{ URL::to('assets/home/js/tweaks/respond.min.js') }}"></script>
	<![endif]-->
</head>

<body>
	
<div class="container">
	<div class="row">
		<div class="col-xs-12">

			@yield('content')
			
		</div>
	</div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::to('assets/home/js/bootstrap.min.js') }}"></script>

</body>
</html>
