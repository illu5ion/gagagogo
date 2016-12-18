@extends('theme-admin.layout')
@section('title', trans('admin.user_add'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-user"></i> @yield('title') </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			{{ $message_area }}

			<form method="post" action="{{ URL::to('admin/user/add') }}" class="form-horizontal" enctype="multipart/form-data">

				<input name="_token" type="hidden" value="{{ csrf_token() }}" />
				
				<fieldset>
					<legend>@yield('title')</legend>

					<div class="control-group">
						<label class="control-label" for="username">{{ trans('admin.user_username')}} :</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="username" value="{{ Input::old('username') }}" placeholder="{{ trans('admin.user_username_placeholder') }}">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="password">{{ trans('admin.password') }}:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="password" value="{{ Input::old('password') }}">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="usermail">Email:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="usermail" value="{{ Input::old('usermail') }}" placeholder="{{ trans('admin.user_email_placeholder') }}">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="selector">{{ trans('admin.permission') }}:</label>
						<div class="controls">
							<select id="selector" name="authority" data-rel="chosen">
								<option value="1">{{ trans('app.user') }}</option>
								<option value="0">{{ trans('app.admin') }}</option>
							</select>
						</div>
					</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">{{ trans('admin.save') }}</button>
					<button type="reset" class="btn">{{ trans('admin.cancel') }}</button>
				</div>
			</fieldset>
		</form>   

		</div>
	</div><!--/span-->
</div><!--/row-->

@stop