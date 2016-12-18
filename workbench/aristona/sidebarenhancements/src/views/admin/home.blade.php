@extends('theme-admin.layout')
@section('title', 'Sidebar Enhancements Management')
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="fa fa-puzzle-piece"></i> @yield('title')</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			There is no admin panel features for Sidebar Enhancements plugin (yet).		
		</div>
	</div><!--/span-->

</div><!--/row-->

@stop
