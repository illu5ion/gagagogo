@extends('theme-admin.layout')
@section('title', trans('admin.widget_add'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-tasks"></i> @yield('title') </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			{{ $message_area }}

			<form method="post" action="{{ URL::to('admin/widget/addstring') }}" class="form-horizontal" enctype="multipart/form-data">

				<input name="_token" type="hidden" value="{{ csrf_token() }}" />

				<fieldset>
					<legend>@yield('title')</legend>
					
					<div class="control-group">
						<label class="control-label" for="name">{{ trans('admin.widget_name') }}:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="name" value="{{ Input::old('name') }}"placeholder="{{ trans('admin.widget_name_placeholder') }}">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="content">{{ trans('admin.content') }}:</label>
						<div class="controls">
							<textarea class="cleditor" rows="3" name="content"></textarea>
						</div>
						{{ trans('admin.widget_script_notice', array('button_image' => '<div class="cleditorButton" title="Show Source" style="background-color: transparent; background-position: -744px 50%; display: inline-block; float: none; vertical-align: middle;"></div>')) }}
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