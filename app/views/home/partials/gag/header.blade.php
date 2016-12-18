<div class="row">
	@if($nextbutton === true)
		<?php $nextgag = Gag::orderBy('id', 'desc')->where('id', '<', $gag->id)->first(); ?>
		<div class="col-xs-9">
			<a href="{{ URL::to('u/' . $gag->user->username) }}">
				<img class="img-circle avatar"src="{{ $gag->user->getAssociatedAvatar() }}">
			</a>
			<h3 style="line-height: 50px; padding-right: 0;">
				<a href="{{ $gag->endpoint() }}" title="{{{ $gag->title }}}">{{{ $gag->title }}}</a>
			</h3>
		</div>
		@if($nextgag != null)
		<div class="col-xs-3">
			<a href="#">
				<div class="post-nav" style="float: right;">
					<div class="nextgag">
						<a href="{{ $nextgag->endpoint() }}" class="next">
								{{ trans('app.next_post') }}
							</a>
						<span class="right-indicator"></span>
					</div>
				</div>
			</a>
		</div>
		@endif
	@else
		<div class="col-xs-12">
			<a href="{{ URL::to('u/' . $gag->user->username) }}">
				<img class="img-circle avatar"src="{{ $gag->user->getAssociatedAvatar() }}">
			</a>
			<h3 style="line-height: 50px; padding-right: 0;">
				<a href="{{ $gag->endpoint() }}" title="{{{ $gag->title }}}">{{{ $gag->title }}}</a>
			</h3>
		</div>
	@endif
</div>