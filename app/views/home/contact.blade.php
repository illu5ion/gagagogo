@extends('home.layout')

@section('title', trans('app.contact'))

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			
			<h2>{{ trans('app.contact') }}</h2>
		 
			<div class="google-maps">
				<iframe src="{{ $settings->google_maps_code }}" style="border: 0;"></iframe>
			</div>

			{{ $message_area }}
			
			<div class="col-xs-12 col-sm-6">
				<h3 class="text-center">{{ trans('app.contact_leave_us_a_message') }}</h3>

				<form method="post" action="{{ URL::to('contact') }}">
					
					<input name="_token" type="hidden" value="{{ csrf_token() }}" />

					<div class="form-group">
						<input type="text" class="form-control" placeholder="{{ trans('app.contact_ur_name') }}..." name="name" value="{{ Input::old('name') }}" required/>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" placeholder="{{ trans('app.contact_ur_email') }}..." name="email" value="{{ Input::old('email') }}" required/>
					</div>

					<div class="form-group">
						<textarea class="form-control" rows="3" placeholder="{{ trans('app.contact_ur_message') }}..." name="message" required>{{ Input::old('message') }}</textarea>
					</div>

					<button type="submit" class="btn btn-danger btn-sm btn-block" role="button">{{ trans('app.contact_send_my_message') }}</a>

				</form>
			</div>

			<div class="col-xs-12 col-sm-6">
				<h3 class="text-center">{{ trans('app.contact_other_ways') }}</h3>

				<p><span class="glyphicon glyphicon-envelope"></span> <b>Email:</b> {{ $settings->email }}</p>
				<p><span class="glyphicon glyphicon-map-marker"></span> <b>{{ trans('app.office_address') }}:</b> {{ $settings->address }}</p>
				<p><span class="glyphicon glyphicon-earphone"></span> <b>{{ trans('app.phone') }}:</b> {{ $settings->phone }}</p>
			</div>

		</div>
	</div>
</div>

@stop