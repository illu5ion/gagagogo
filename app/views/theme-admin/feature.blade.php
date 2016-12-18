@extends('theme-admin.layout')
@section('title', trans('admin.gag_feature'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-pencil"></i> @yield('title') </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			{{ $message_area }}

			<form method="post" action="{{ URL::to('admin/gag/feature') }}" class="form-horizontal" enctype="multipart/form-data">
				
				<fieldset>
					<legend>@yield('title')</legend>
									
					<p>{{ trans('admin.gag_feature_notice') }}</p>

					<hr>
					
					<input name="_token" type="hidden" value="{{ csrf_token() }}" />
					<input name="gag_id" type="hidden" value="{{ $gag->id }}" />

					<!-- Crop ratios -->
					<input type="hidden" value="0" id="x" name="x">
					<input type="hidden" value="0" id="y" name="y">
					<input type="hidden" value="0" id="width" name="width">
					<input type="hidden" value="0" id="height" name="height">

					<img id="jcrop_target" src="{{ URL::to('assets/public/uploads/' . $gag->gag_url . '.png') }}" alt="Image">
					

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