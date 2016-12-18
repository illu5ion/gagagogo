@extends('theme-admin.layout')
@section('title', trans('admin.page_add'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-briefcase"></i> @yield('title') </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			{{ $message_area }}

			<form method="post" action="{{ URL::to('admin/page/add') }}" class="form-horizontal" enctype="multipart/form-data">

				<input name="_token" type="hidden" value="{{ csrf_token() }}" />
				
				<fieldset>
					<legend>@yield('title')</legend>
					
					<p>{{ trans('admin.page_notice') }}</p>

					<hr>

					<div class="control-group">
						<label class="control-label" for="focusedInput">{{ trans('admin.page_title') }}</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="title" value="{{ Input::old('title') }}" placeholder="{{ trans('admin.page_title_placeholder') }}">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="content">{{ trans('admin.content') }}</label>
						<div class="controls">
							<textarea class="cleditor" id="content" name="content" rows="3">{{ Input::old('content') }}</textarea>
						</div>
					</div>

					<!-- Not required in this app
					<div class="control-group">
						<label class="control-label" for="target">Target:</label>
						<div class="controls">
							<select id="target" name="target" data-rel="chosen">
								<option value="header">Header</option>
								<option value="footer">Footer</option>
							</select>
						</div>
					</div> -->

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