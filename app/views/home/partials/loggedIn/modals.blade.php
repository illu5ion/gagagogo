<div class="modal fade bs-modal-sm" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="bs-example bs-example-tabs">
				<button type="button" class="close close-padding" data-dismiss="modal" aria-hidden="true">&times;</button>
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#image" data-toggle="tab"><span class="glyphicon glyphicon-picture"></span> {{ trans('app.upload_images') }}</a></li>
					<li class=""><a href="#media" data-toggle="tab"><span class="glyphicon glyphicon-film"></span> {{ trans('app.upload_media') }}</a></li>
				</ul>
			</div>
			<div class="modal-body">
				<div id="myTabContent" class="tab-content">
		
					<div class="alert alert-danger alert-dismissable" style="display: none;">
						<strong>{{ trans('app.error') }}:</strong> <span></span>
					</div>

					<div class="alert alert-success alert-dismissable" style="display: none;">
						<strong>{{ trans('app.success') }}:</strong> <span></span>
					</div>

					<div class="tab-pane fade active in" id="image">
						<form id="image-form" class="form-horizontal" role="form" action="{{ URL::to('profile/upload/image') }}" enctype="multipart/form-data" method="post">

						<input name="_token" type="hidden" value="{{ csrf_token() }}" />
						<fieldset>
						
						<div class="control-group">
							<label class="control-label" for="upload_title">{{ trans('app.upload_title') }}:</label>
							<div class="controls">
								<input id="upload_title" name="upload_title" class="form-control" type="text" placeholder="{{ trans('app.upload_title') }}..." class="input-large">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="selector">{{ trans('app.category') }}:</label>
							<div class="controls">
								<select id="selector" class="form-control" name="belongs_to" data-rel="chosen">
									@if(!$categories->isEmpty())
										@foreach($categories as $k => $v)
											<option value="{{ $v->id }}">{{ $v->category_name }}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="credits">{{ trans('app.upload_credits') }} {{ trans('app.optional') }}:</label>
							<div class="controls">
								<input id="credits" name="credits" class="form-control" type="text" placeholder="{{ trans('app.upload_credits') }} {{ trans('app.optional') }}..." class="input-large">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="image"></label>
							<div class="controls">
								<div style="position:relative;">
									<a class='btn btn-primary' href='javascript:;'>
										{{ trans('app.upload_choose_file') }}
										<input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="image" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
									</a>
									&nbsp;
									<span class='label label-info' id="upload-file-info"></span>
								</div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="imageSubmit"></label>
							<div class="controls">
								<button id="imageSubmit" name="imageSubmit" data-type="image" data-loading-text="{{ trans('app.loading') }}" class="btn btn-success">{{ trans('app.upload') }}</button>
							</div>
						</div>
						</fieldset>
						</form>
				</div>

				<div class="tab-pane fade" id="media">
						<form id="media-form" class="form-horizontal" role="form" action="{{ URL::to('profile/upload/media') }}" enctype="multipart/form-data" method="post">

						<input name="_token" type="hidden" value="{{ csrf_token() }}" />
						<fieldset>

						<div class="control-group">
							<label class="control-label" for="upload_title">{{ trans('app.upload_title') }}:</label>
							<div class="controls">
								<input id="upload_title" name="upload_title" class="form-control" type="text" placeholder="{{ trans('app.upload_title') }}..." class="input-large">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="selector">{{ trans('app.category') }}:</label>
							<div class="controls">
								<select id="selector" class="form-control" name="belongs_to" data-rel="chosen">
									@if(!$categories->isEmpty())
										@foreach($categories as $k => $v)
											<option value="{{ $v->id }}">{{ $v->category_name }}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="url">{{ trans('app.upload_url') }}:</label>
							<div class="controls">
								<input id="url" name="url" class="form-control" type="text" placeholder="{{ trans('app.upload_url_helper') }}..." class="input-large">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="mediaSubmit"></label>
							<div class="controls">
								<button id="mediaSubmit" name="mediaSubmit" data-type="media" data-loading-text="{{ trans('app.loading') }}" class="btn btn-success">{{ trans('app.upload') }}</button>
							</div>
						</div>
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>