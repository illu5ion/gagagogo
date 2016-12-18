<li class="dropdown">
	<a class="dropdown-toggle opacity" data-toggle="dropdown" href="#">
		<i class="fa fa-globe fa-fw"></i>  <i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu">
		<li>
			<a href="{{ URL::to('language/turkish') }}">{{ trans('app.turkish') }}</a>
			<a href="{{ URL::to('language/english') }}">{{ trans('app.english') }}</a>
		</li>
	</ul>
</li>
<li class="dropdown">
	<a class="dropdown-toggle opacity" data-toggle="dropdown" href="#">
		<i class="fa fa-exchange fa-fw"></i>  <i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu">
		<li>
			@foreach($themes as $k => $v)
				<a href="{{ URL::to('theme/' . $v) }}">{{ trans("themes.{$v}") }}</a>
			@endforeach
		</li>
	</ul>
</li>
<li class="dropdown">
	<a class="dropdown-toggle opacity" data-toggle="dropdown" href="#">
		<img class="nav-avatar" src="{{ Auth::user()->getAssociatedAvatar() }}">
		{{ trans('app.me') }} <i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu dropdown-user">
		<li>
			<a href="{{ URL::to('u/' . Auth::user()->username )}}"><i class="fa fa-user fa-fw"></i> {{ trans('app.my_profile') }}</a>
			<a href="{{ URL::to('profile') }}"><i class="fa fa-cog fa-fw"></i> {{ trans('app.settings') }}</a>
		</li>
		@if( (int) Auth::user()->authority === 0)
			<li><a href="{{ URL::to('admin') }}"><i class="fa fa-desktop fa-fw"></i> {{ trans('app.admin') }}</a></li>
		@endif
		<li class="divider"></li>
		<li>
			<a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out fa-fw"></i> {{ trans('app.sign_out') }}</a>
		</li>
	</ul>
	<!-- /.dropdown-user -->
</li>
<li>
	<a class="upload" data-toggle="modal" data-target="#uploadModal" style="cursor: pointer;">
		<span><i class="fa fa-cloud-upload"></i> {{ trans('app.upload') }}</span>
	</a>
</li>

@if(PluginManager::activated('MemeGenerator'))
	{{ PluginManager::get('MemeGenerator')->getNavigationButton() }}
@endif