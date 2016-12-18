@extends('theme-admin.layout')
@section('title', trans('admin.dashboard'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-home"></i> @yield('title') </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			{{ trans('admin.welcome_notice', array('username' => Auth::user()->username)) }}

			<h4>{{ trans('admin.need_documentation') }}</h4>
			{{ trans('admin.need_documentation_content') }}

			<div class="clearfix"></div>
		</div>
	</div>
</div>
	
@stop