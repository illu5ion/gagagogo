@extends('theme-admin.layout')
@section('title', trans('admin.settings'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-cog"></i> @yield('title') </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			<form method="post" action="{{ URL::to('admin/setting') }}" class="form-horizontal" enctype="multipart/form-data">

				<input name="_token" type="hidden" value="{{ csrf_token() }}" />
				
				<fieldset>
					<legend>{{ trans('admin.settings_description') }}</legend>

					<div class="control-group">
						<label class="control-label" for="copyright">{{ trans('admin.settings_copyright') }}:</label>
						<div class="controls">
							<textarea rows="6" name="copyright">{{ $settings->copyright }}</textarea>
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="autoapprove_comments">{{ trans('admin.settings_auto_approve_comments') }}:</label>
						<div class="controls">
							@if( (int) $settings->autoapprove_comments === 1)
								<input type="checkbox" name="autoapprove_comments_checkbox" data-no-uniform="true" class="iphone-toggle" checked>
							@else
								<input type="checkbox" name="autoapprove_comments_checkbox" data-no-uniform="true" class="iphone-toggle">
							@endif
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="autoapprove_gags">{{ trans('admin.settings_auto_approve_gags') }}:</label>
						<div class="controls">
							@if( (int) $settings->autoapprove_gags === 1)
								<input type="checkbox" name="autoapprove_gags_checkbox" data-no-uniform="true" class="iphone-toggle" checked>
							@else
								<input type="checkbox" name="autoapprove_gags_checkbox" data-no-uniform="true" class="iphone-toggle">
							@endif
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="autoapprove_gags">{{ trans('admin.settings_auto_add_watermark') }}:</label>
						<div class="controls">
							@if( (int) $settings->auto_add_watermark === 1)
								<input type="checkbox" name="auto_add_watermark" data-no-uniform="true" class="iphone-toggle" checked>
							@else
								<input type="checkbox" name="auto_add_watermark" data-no-uniform="true" class="iphone-toggle">
							@endif
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">{{ trans('admin.settings_current_logo') }}:</label> <img src="{{ URL::to('assets/public/uploads/' . $settings->logo) }}" alt="Logo" style="max-width: 150px; max-height: 150px;">
					</div>
					<div class="control-group">
						<label class="control-label" for="fileInput">{{ trans('admin.settings_new_logo') }}:</label>
						<div class="controls">
							<input class="input-file uniform_on" 
							type="file"
							name="logo" >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">{{ trans('admin.settings_current_watermark') }}:</label> <img src="{{ URL::to('assets/public/uploads/' . $settings->watermark) }}" alt="Watermark" style="max-width: 150px; max-height: 150px;">
					</div>
					<div class="control-group">
						<label class="control-label" for="fileInput">{{ trans('admin.settings_new_watermark') }}:</label>
						<div class="controls">
							<input class="input-file uniform_on" 
							type="file"
							name="watermark" >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="facebook_url">{{ trans('admin.settings_fb_like_url') }}:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="facebook_url" value="{{ $settings->facebook_like_address }}">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="google_maps_code">{{ trans('admin.settings_google_map_code') }}:</label>
						<div class="controls">
							<textarea rows="6" name="google_maps_code">{{ $settings->google_maps_code }}</textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="google_analytics_code">{{ trans('admin.settings_google_analytics_code') }}:</label>
						<div class="controls">
							<textarea rows="6" name="google_analytics_code">{{ $settings->google_analytics_code }}</textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="slogan">{{ trans('admin.settings_slogan') }}:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="slogan" value="{{ $settings->slogan }}">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="color_type">{{ trans('admin.settings_app_theme_type') }}:</label>
						<div class="controls">
							<select id="selector" name="color_type" data-rel="chosen">
								@foreach($themes as $theme)
									<option value="{{ $theme }}">{{ trans("themes.{$theme}") }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="phone">{{ trans('admin.phone') }}:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="phone" value="{{ $settings->phone }}">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="email">Email:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="email" value="{{ $settings->email }}">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="address">{{ trans('admin.address') }}:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="address" value="{{ $settings->address }}">
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