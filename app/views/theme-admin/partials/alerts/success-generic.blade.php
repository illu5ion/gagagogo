@extends('theme-admin.layout')
@section('title', trans('admin.success'))
@section('content')

	<div class="box-content alerts">
		<div class="alert alert-success">
			<button data-dismiss="alert" class="close" type="button">×</button>
			<h4 class="alert-heading">{{ trans('admin.success') }}:</h4>
			<p>{{ $message }}</p>
		</div>
		<div class="clearfix"></div>
	</div>
@stop