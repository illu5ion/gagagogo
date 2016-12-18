@extends('installer.layout')
@section('title', trans('installer.install'))

@section('content')

<h2>{{ trans('installer.install') }} {{ Config::get('site.application_name') }}</h2>
<hr>

{{ $message_area }}

<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('installer/install') }}">
  <div class="form-group">
	<label for="username" class="col-sm-2 control-label">{{ trans('installer.username') }}</label>
	<div class="col-sm-3">
	  <input type="text" name="username" class="form-control" id="username" placeholder="{{ trans('installer.username') }}" value="{{ Input::old('username') }}">
	</div>
  </div>
  <div class="form-group">
	<label for="password" class="col-sm-2 control-label">{{ trans('installer.password') }}</label>
	<div class="col-sm-3">
	  <input type="password" name="password" class="form-control" id="password" placeholder="{{ trans('installer.password') }}" value="{{ Input::old('password') }}">
	</div>
  </div>
  <div class="form-group">
	<label for="cpassword" class="col-sm-2 control-label">{{ trans('installer.password') }} ({{ trans('installer.again') }})</label>
	<div class="col-sm-3">
	  <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="{{ trans('installer.password') }} ({{ trans('installer.again') }})" value="{{ Input::old('cpassword') }}">
	</div>
  </div>
  <div class="form-group">
	<label for="usermail" class="col-sm-2 control-label">Email</label>
	<div class="col-sm-3">
	  <input type="text" name="usermail" class="form-control" id="usermail" placeholder="Email" value="{{ Input::old('usermail') }}">
	</div>
  </div>
  <div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	  <button type="submit" class="btn btn-primary">{{ trans('installer.install') }} {{ Config::get('site.application_name') }}</button>
	</div>
  </div>
</form>

@stop