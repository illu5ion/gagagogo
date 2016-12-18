@extends('home.layout')

@section('title', trans('app.error_banned'))

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">

			@include('home.partials.alerts.error', array('message' => trans('app.error_banned')))
	
		</div>
	</div>
</div>

@stop