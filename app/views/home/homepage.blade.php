@extends('home.layout')

@section('title', trans('app.homepage'))

@section('content')

<div class="container">
	{{-- Demo notice --}}
	@if(App::environment() === 'demo')
		<div class="row">
			<div class="col-xs-12">
				@include('home.partials.alerts.info', array('message' => trans('app.demo_message')))
			</div>
		</div>
	@endif

	<div class="row">
		<div class="col-sm-8 gag-wrapper infinite-scroll">
			
			@include('home.infinite')

		</div>

		@include('home.partials.sidebar')

	</div>

</div>	<!-- /.container -->

@stop