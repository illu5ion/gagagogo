@extends('installer.layout')
@section('title', trans('installer.success'))

@section('content')

<h2>{{ trans('installer.success') }}</h2>
<hr>

<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{ trans('installer.success') }}:</strong> {{ trans('installer.updater_success_message') }}
</div>

@stop