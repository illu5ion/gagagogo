<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{{ Config::get('site.application_name') }} {{ Config::get('site.title_seperator', '::') }} @yield('title')</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{ Config::get('site.application_name') }} Admin CP">
	<meta name="author" content="Aristona">

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<link href="{{ URL::asset('assets/admin/css/bootstrap-cerulean.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/bootstrap-responsive.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/charisma-app.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/jquery-ui-1.8.21.custom.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/fullcalendar.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/fullcalendar.print.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/chosen.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/uniform.default.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/colorbox.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/jquery.cleditor.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/jquery.noty.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/noty_theme_default.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/elfinder.min.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/elfinder.theme.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/jquery.iphone.toggle.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/opa-icons.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/uploadify.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/admin/css/jquery.Jcrop.css') }}" rel="stylesheet" media="screen">

	<style type="text/css">
	body {
		padding-bottom: 40px;
	}
	.sidebar-nav {
		padding: 9px 0;
	}
	</style>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="{{ URL::to('assets/admin/img/favicon.ico') }}">

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
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="{{ URL::to('admin') }}">
					<img alt="Logo" src="{{ URL::to('assets/admin/img/logo20.png') }}" />
					<span>{{ Config::get('site.application_name') }}</span>
				</a>

				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> {{ Auth::user()->username }}</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to('profile') }}">{{ trans('admin.profile_settings') }}</a></li>
						<li class="divider"></li>
						<li><a href="{{ URL::to('logout') }}">{{ trans('admin.logout') }}</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->

				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-globe"></i><span class="hidden-phone"> {{ trans('admin.change_language') }}</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to('language/english') }}">{{ trans('admin.english') }}</a></li>
						<li><a href="{{ URL::to('language/turkish') }}">{{ trans('admin.turkish') }}</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->

				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="{{ URL::to('/') }}">{{ trans('admin.back_to_home') }}</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">

			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">

						<li class="nav-header hidden-tablet">Menu</li>

						<li>
							<a class="ajax-link" href="{{ URL::to('admin') }}">
								<i class="icon-home"></i>
								<span class="hidden-tablet"> {{ trans('admin.dashboard') }}</span>
							</a>
						</li>
						<li>
							<a class="ajax-link" href="{{ URL::to('admin/gag') }}">
								<i class="icon-pencil"></i>
								<span class="hidden-tablet"> {{ trans('admin.gag') }} {{ trans('admin.management') }}</span>
							</a>
						</li>
						<li>
							<a class="ajax-link" href="{{ URL::to('admin/category') }}">
								<i class="icon-folder-open"></i>
								<span class="hidden-tablet"> {{ trans('admin.category') }} {{ trans('admin.management') }}</span>
							</a>
						</li>
						<li>
							<a class="ajax-link" href="{{ URL::to('admin/contact') }}">
								<i class="icon-envelope"></i>
								<span class="hidden-tablet"> {{ trans('admin.contact') }} {{ trans('admin.management') }}</span>
							</a>
						</li>
						<li>
							<a class="ajax-link" href="{{ URL::to('admin/page') }}">
								<i class="icon-briefcase"></i>
								<span class="hidden-tablet"> {{ trans('admin.page') }} {{ trans('admin.management') }}</span>
							</a>
						</li>
						<li>
							<a class="ajax-link" href="{{ URL::to('admin/user') }}">
								<i class="icon-user"></i>
								<span class="hidden-tablet"> {{ trans('admin.user') }} {{ trans('admin.management') }}</span>
							</a>
						</li>
						<li>
							<a class="ajax-link" href="{{ URL::to('admin/comment') }}">
								<i class="icon-comment"></i>
								<span class="hidden-tablet"> {{ trans('admin.comment') }} {{ trans('admin.management') }}</span>
							</a>
						</li>
						<li>
							<a class="ajax-link" href="{{ URL::to('admin/widget') }}">
								<i class="icon-tasks"></i>
								<span class="hidden-tablet"> {{ trans('admin.widget') }} {{ trans('admin.management') }}</span>
							</a>
						</li>
						<li>
							<a class="ajax-link" href="{{ URL::to('admin/setting/') }}">
								<i class="icon-cog"></i>
								<span class="hidden-tablet"> {{ trans('admin.settings') }}</span>
							</a>
						</li>

						@if(Session::get('lang') === 'en')
							<li>
								<a class="ajax-link" href="{{ URL::to('docs/index.html') }}">
									<i class="icon-list-alt"></i>
									<span class="hidden-tablet"> {{ trans('admin.documentation') }}</span>
								</a>
							</li>
						@elseif(Session::get('lang') === 'tr')
							<li>
								<a class="ajax-link" href="{{ URL::to('docs/turkce.html') }}">
									<i class="icon-list-alt"></i>
									<span class="hidden-tablet"> {{ trans('admin.documentation') }}</span>
								</a>
							</li>
						@else
							<li>
								<a class="ajax-link" href="{{ URL::to('docs/index.html') }}">
									<i class="icon-list-alt"></i>
									<span class="hidden-tablet"> {{ trans('admin.documentation') }}</span>
								</a>
							</li>
						@endif
					</ul>

					<ul class="nav nav-tabs nav-stacked plugins-menu">
						<li class="nav-header hidden-tablet">Plugins</li>

						@foreach(PluginManager::getLoadedPluginNames() as $name => $folder)

							@if(PluginManager::activated($name))
								<li>
									<a class="ajax-link" href="{{ PluginManager::get($name)->getAdminNavigationLinks() }}">
										<i class="icon-leaf"></i>
										<span class="hidden-tablet">Manage {{ $name}}</span>
									</a>
								</li>
							@else
								<li>
									<a class="ajax-link" href="{{ URL::to('admin/plugin-manager/install/' . $folder) }}">
										<i class="icon-leaf"></i>
										<span class="hidden-tablet">Install {{ $name }}</span>
									</a>
								</li>
							@endif
						@endforeach
					</ul>

					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> {{ trans('admin.enable_ajax') }}</label>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to enable <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> to use this website.</p>
				</div>
			</noscript>

			<div id="content" class="span10"> <!-- content starts -->

				@yield('content')

			</div> <!-- content ends -->
		</div><!--/fluid-row-->

		<hr>

		<footer></footer>

	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="{{ URL::asset('assets/admin/js/jquery-1.7.2.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ URL::asset('assets/admin/js/jquery-ui-1.8.21.custom.min.js') }}"></script>

	<!-- transition / effect library -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-transition.js') }}"></script>

	<!-- alert enhancer library -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-alert.js') }}"></script>

	<!-- modal / dialog library -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-modal.js') }}"></script>

	<!-- custom dropdown library -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-dropdown.js') }}"></script>

	<!-- scrolspy library -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-scrollspy.js') }}"></script>

	<!-- library for creating tabs -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-tab.js') }}"></script>

	<!-- library for advanced tooltip -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-tooltip.js') }}"></script>

	<!-- popover effect library -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-popover.js') }}"></script>

	<!-- button enhancer library -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-button.js') }}"></script>

	<!-- accordion library (optional, not used in demo) -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-collapse.js') }}"></script>

	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-carousel.js') }}"></script>

	<!-- autocomplete library -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-typeahead.js') }}"></script>

	<!-- tour library -->
	<script src="{{ URL::asset('assets/admin/js/bootstrap-tour.js') }}"></script>

	<!-- library for cookie management -->
	<script src="{{ URL::asset('assets/admin/js/jquery.cookie.js') }}"></script>

	<!-- calander plugin -->
	<script src="{{ URL::asset('assets/admin/js/fullcalendar.min.js') }} "></script>

	<!-- data table plugin -->
	<script src="{{ URL::asset('assets/admin/js/jquery.dataTables.min.js') }} "></script>

	<!-- chart libraries start -->
	<script src="{{ URL::asset('assets/admin/js/excanvas.js') }}"></script>
	<script src="{{ URL::asset('assets/admin/js/jquery.flot.min.js') }}"></script>
	<script src="{{ URL::asset('assets/admin/js/jquery.flot.pie.min.js') }}"></script>
	<script src="{{ URL::asset('assets/admin/js/jquery.flot.stack.js') }}"></script>
	<script src="{{ URL::asset('assets/admin/js/jquery.flot.resize.min.js') }}"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="{{ URL::asset('assets/admin/js/jquery.chosen.min.js') }}"></script>

	<!-- checkbox, radio, and file input styler -->
	<script src="{{ URL::asset('assets/admin/js/jquery.uniform.min.js') }}"></script>

	<!-- plugin for gallery image view -->
	<script src="{{ URL::asset('assets/admin/js/jquery.colorbox.min.js') }}"></script>

	<!-- rich text editor library -->
	<script src="{{ URL::asset('assets/admin/js/jquery.cleditor.min.js') }}"></script>

	<!-- notification plugin -->
	<script src="{{ URL::asset('assets/admin/js/jquery.noty.js') }}"></script>

	<!-- file manager library -->
	<script src="{{ URL::asset('assets/admin/js/jquery.elfinder.min.js') }}"></script>

	<!-- star rating plugin -->
	<script src="{{ URL::asset('assets/admin/js/jquery.raty.min.js') }}"></script>

	<!-- for iOS style toggle switch -->
	<script src="{{ URL::asset('assets/admin/js/jquery.iphone.toggle.js') }}"></script>

	<!-- autogrowing textarea plugin -->
	<script src="{{ URL::asset('assets/admin/js/jquery.autogrow-textarea.js') }}"></script>

	<!-- multiple file upload plugin -->
	<script src="{{ URL::asset('assets/admin/js/jquery.uploadify-3.1.min.js') }}"></script>

	<!-- history.js for cross-browser state change on ajax -->
	<script src="{{ URL::asset('assets/admin/js/jquery.history.js') }}"></script>

	<!-- jCrop -->
	<script type="text/javascript" src="{{ URL::to('assets/admin/js/jquery.Jcrop.js') }}"></script>

	<!-- application script for Charisma demo -->
	<script src="{{ URL::asset('assets/admin/js/charisma.js') }}"></script>

	<script type="text/javascript">
	$(document).on('ready', function() {
		$('#jcrop_target').Jcrop({

			boxHeight: 400,
			minSize: [50, 26],
			aspectRatio: 300 / 156,
			bgColor: 'black',
			bgOpacity: .7,
			setSelect: [10, 10, 50, 50 ],
			onSelect: updateCoords
		});
	});

	function updateCoords(c) {
		$('#x').val( (c.x.toFixed()) );
		$('#y').val( (c.y.toFixed()) );
		$('#width').val( (c.w.toFixed()) );
		$('#height').val( (c.h.toFixed()) );
	};

	</script>

</body>
</html>
