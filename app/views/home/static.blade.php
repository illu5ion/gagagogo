@extends('home.layout')

@section('title', $page->title)

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-8">

			<h2>{{ $page->title }}</h2><hr>
			{{ $page->content }}

		</div>

		@include('home.partials.sidebar')

	</div>
</div>

@stop