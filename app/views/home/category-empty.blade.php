@extends('home.layout')

@section('title', $category_name . ' ' . trans('app.category'))

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-8">
			{{ $message_area }}
		</div>

		@include('home.partials.sidebar')
	</div>
</div><!--/.container-->

@stop