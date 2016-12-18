<div class="panel panel-default comments">
	<div class="panel-heading">
		<span class="glyphicon glyphicon-comment"></span>
		<h3 class="panel-title">
			{{ trans('app.leave_your_comment') }} <i>({{ trans('app.logged_in_as', array('username' => Auth::user()->username)) }})</i>
		</h3>
	</div>
	<div class="panel-body">
		<ul class="list-group">
			<li class="list-group-item">
				<div class="row">
					<div class="col-xs-3">
						<img src="{{ Auth::user()->getAssociatedAvatar() }}" class="img-responsive" alt="Avatar of {{ Auth::user()->username }} user" /></div>
					<div class="col-xs-9">
						<form method="POST" action="{{ URL::to('profile/comment/add') }}">
							
							<input name="_token" type="hidden" value="{{ csrf_token() }}" />
							<input type="hidden" name="identifier" value="{{ $identifier }}">

							<div class="form-group">
								<textarea class="form-control" rows="3" placeholder="{{ trans('app.your_comment') }}..." name="comment" required>{{ Input::old('comment') }}</textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-sm" role="button">{{ trans('app.publish_my_comment') }}</a>
						</form>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>