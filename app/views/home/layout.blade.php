<!DOCTYPE html>
<html>
<head>
	<title>{{ Config::get('site.application_name') }} {{ Config::get('site.title_seperator', '::') }} @yield('title')</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{ Config::get('site.application_name') }} {{ Config::get('site.title_seperator', '::') }} @yield('title')">
	<meta name="keywords" content="{{ Config::get('site.keywords') }}">

	<!-- Pace -->
	<script src="{{ URL::to('assets/home/js/pace/pace.js') }}"></script>
	<link href="{{ URL::to('assets/home/js/pace/theme.css') }}" rel="stylesheet" />

	<!-- Bootstrap -->
	<link href="{{ URL::to('assets/home/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">

	<!-- Font Awesome -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<!-- Bxslider -->
	<link href="{{ URL::to('assets/home/css/jquery.bxslider.css') }}" rel="stylesheet" media="screen">

	<!-- Alertify -->
	<link href="{{ URL::to('assets/home/css/alertify.core.css') }}" rel="stylesheet" media="screen">
	<link href="{{ URL::to('assets/home/css/alertify.default.css') }}" rel="stylesheet" media="screen">

	<!-- App -->
	@if(!Session::has('theme'))
		@if($settings->color_type == '')
			<link href="{{ URL::to('assets/home/css/style_default.min.css') }}" rel="stylesheet" media="screen">
		@else
			<link href="{{ URL::to('assets/home/css/style_' . $settings->color_type . '.min.css') }}" rel="stylesheet" media="screen">
		@endif
	@else
		<link href="{{ URL::to('assets/home/css/style_' . Session::get('theme') . '.min.css') }}" rel="stylesheet" media="screen">
	@endif


	<!-- We prefer 940px grid, just like other websites -->
	<style>
	@media (min-width: 1200px) {
		.container {
			width: 970px;
		}
	}
	#notification-trasher {
		cursor: pointer;
	}
	.nextgag {
		display: block;
		padding-right: 12px;
		position: absolute;
		right: 18px;
		top: 14px;
		-webkit-transition: all .15s ease;
	   -moz-transition: all .15s ease;
	    -ms-transition: all .15s ease;
	     -o-transition: all .15s ease;
	        transition: all .15s ease;
	}

	.nextgag .next {
		padding: 0 8px 0 12px;
		font-weight: 800;
		line-height: 34px;
		max-height: 34px;
		display: block;
		background-color: #ff3c1f;
		color: #fff;
		border-radius: 3px 0 0 3px;
	}

	.nextgag:hover, .nextgag a:hover, .nextgag:focus, .nextgag a:focus {
		text-decoration: none;
		right: 12px;
	}

	.nextgag .right-indicator {
		position: absolute;
		top: 0;
		right: 0;
		display: block;
		width: 0;
		height: 0;
		border-top: 17px dashed transparent;
		border-bottom: 17px dashed transparent;
		border-left: 12px solid #ff3c1f;
	}
	</style>

	@foreach(PluginManager::getActivatedPluginNames() as $plugin)
		{{ $plugin->getProvidedCss() }}
	@endforeach

	<!-- Facebook Meta Tags -->
	@if((bool) $__env->yieldContent('facebook-share-image') === true)
		<meta property="og:image" content="{{ $__env->yieldContent('facebook-share-image') }}"/>
	@else
		<meta property="og:image" content="{{ URL::to('assets/public/uploads/logo.png') }}"/>
	@endif
	<meta property="og:title" content="{{{ Config::get('site.application_name') }}} - @yield('title')"/>
	<meta property="og:description" content="{{{ Config::get('site.application_name') }}} - @yield('title')"/>
	<meta property="og:url" content="{{ Request::url() }}"/>
	<meta property="og:site_name" content="{{ Config::get('site.application_name') }}"/>
	<meta property="og:type" content="article"/>
	<meta property="fb:app_id" content="appid"/>

	<link rel="shortcut icon" href="{{ URL::to('assets/public/uploads/favicon.ico') }}" type="image/x-icon"/>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="{{ URL::to('assets/home/js/tweaks/html5shiv.js') }}"></script>
		<script src="{{ URL::to('assets/home/js/tweaks/respond.min.js') }}"></script>
    <![endif]-->

    {{-- Demo GA code --}}
	@if(App::environment() === 'demo')
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-27671208-3', 'anilunal.com');
		  ga('send', 'pageview');
		</script>
	@else
	<script type="text/javascript">
    	{{ $settings->google_analytics_code }}
    </script>
    @endif
</head>

	<body>
	<div id="fb-root"></div>

		@include('home.partials.header')

		@yield('content')

		@include('home.partials.footer')

		@if( !Auth::check () )
			@include('home.partials.loggedOut.modals')
		@else
			@include('home.partials.loggedIn.modals')
		@endif

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script type="text/javascript" src="{{ URL::to('assets/home/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::to('assets/home/js/jquery.bxslider.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::to('assets/home/js/alertify.min.js') }}"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script>
		<script type="text/javascript" src="{{ URL::to('assets/home/js/fitvids.js') }}"></script>

		<!-- Throttle -->
		<script type="text/javascript" src="{{ URL::to('assets/home/js/jquery-throttle.js') }}"></script>

		<!-- Inf scroll -->
		<script type="text/javascript" src="{{ URL::to('assets/home/js/scrollPagination.js') }}"></script>

		<script type="text/javascript">
		var urls = {
			infinite: "{{ URL::to('infinite') }}",
			signin: "{{ URL::to('login') }}",
			signup: "{{ URL::to('register') }}",
			notifications: "{{ URL::to('notifications') }}",
			notifications_trash: "{{ URL::to('notifications/trash') }}",
			upload: {
				image: "{{ URL::to('profile/upload/image') }}",
				media: "{{ URL::to('profile/upload/media') }}"
			}
		};

		var trans = {
			loading_new_gags: "{{ trans('app.loading_new_gags') }}",
			new_notification: "{{ trans('app.notification_new_notification') }}"
		};

		var user = {
			authentication_type: "{{ (bool) Auth::check() === true ? 'loggedIn' : 'loggedOut' }}",
			theme_selected: "{{ Session::get('theme', 'default') }}"
		};

		var order = {
			type: "{{ $orderType }}"
		};
		</script>

		<script type="text/javascript" src="{{ URL::to('assets/home/js/app.min.js') }}"></script>

		@foreach(PluginManager::getActivatedPluginNames() as $plugin)
			{{ $plugin->getProvidedJs() }}
		@endforeach

		<!-- FB SDK -->
		<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>

		<!-- Twitter SDK -->
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

		<script type="text/javascript">
			triggerLogin = "{{ Session::get('triggerLoginModal') }}" === '' ? false : true;

			if(triggerLogin === true)
			{
				$('#loginModal').modal();
			}
		</script>

	</body>
</html>
