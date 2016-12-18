@extends('theme-admin.layout')
@section('title', trans('admin.error'))
@section('content')

	<div class="box-content alerts">
		<div class="alert alert-block ">
			<button data-dismiss="alert" class="close" type="button">×</button>
			<h4 class="alert-heading">{{ trans('admin.error') }}</h4>
			<p>{{ $message }}</p>
		</div>
										
		<div class="clearfix"></div>
	</div>
@stop