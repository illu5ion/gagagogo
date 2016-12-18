@extends('theme-admin.layout')
@section('title', trans('admin.category_add'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-folder-open"></i> @yield('title') </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			{{ $message_area }}

			<form method="post" action="{{ URL::to('admin/category/add') }}" class="form-horizontal" enctype="multipart/form-data">

				<input name="_token" type="hidden" value="{{ csrf_token() }}" />

				<fieldset>
					<legend>{{ trans('admin.category_add') }}</legend>
					
					<div class="control-group">
						<label class="control-label" for="category_name">{{ trans('admin.category_name') }}</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="category_name" value="{{ Input::old('category_name') }}" placeholder="{{ trans('admin.category_name_placeholder') }}">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="featured_text">{{ trans('admin.category_featured_text') }} {{ trans('admin.optional') }}</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="featured_text" value="{{ Input::old('featured_text') }}" placeholder="{{ trans('admin.category_featured_text_placeholder') }}">
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