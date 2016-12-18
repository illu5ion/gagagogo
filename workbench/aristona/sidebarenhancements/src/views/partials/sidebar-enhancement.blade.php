<!-- Widget -->
@if(!$last_comments->isEmpty())
<div class="widget-container">
	<div class="panel panel-colored comments">
		<div class="panel-heading">
			{{ trans('sidebarenhancements::plugin.latest_comments') }}
		</div>

		<ul class="list-group">
			@foreach($last_comments as $k => $v)
				<li class="list-group-item">
					<div class="row">
						<div class="col-xs-2">
							<img src="{{ $v->user->getAssociatedAvatar() }}" class="img-responsive" alt="" /></div>
						<div class="col-xs-10">
							<div class="mic-info">
								{{ trans('app.profile_comment_header', array(
									'date' => Date::parse($v->created_at)->diffForHumans(),
									'url' => '<a href="' . URL::to('u/' . $v->user->username) . '">' . $v->user->username . '</a>')) }}
							</div>

							<div class="comment-text">
								<p style="word-wrap: break-word; color: #777;">{{{ $v->message }}}</p>
							</div>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@endif
<!--/widget-->


<!-- Widget -->
@if(!$hottest->isEmpty())
	<div class="widget-container">
		<div class="panel panel-colored comments">
			<div class="panel-heading">
				{{ trans('sidebarenhancements::plugin.hottest') }}
			</div>

			<ul class="list-group">
				@foreach($hottest as $k => $v)
					<li class="list-group-item" style="padding: 0; margin: 15px; overflow: hidden;">
						@include('home.partials.gag.typecheck', array('gag' => $v))
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif
<!--/widget-->