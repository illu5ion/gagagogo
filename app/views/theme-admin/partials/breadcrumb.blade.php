<div>
	<ul class="breadcrumb">
		<li>
			<a href="{{ URL::to('admin') }}">{{ trans('admin.homepage') }}</a> <span class="divider">/</span>
		</li>
		<li>@yield('title')</li>
	</ul>
</div>