@foreach ($notifications as $k => $v)
	<li class="notification" data-notification-id="{{ $v->id }}">
		<?php $target_user = User::find($v->target_user); ?>

		<a href="{{ URL::to('u/' . $target_user->username) }}">
			<div class="avatar-container">
				<img src="{{ $target_user->getAssociatedAvatar() }}">
			</div>
		</a>
		<div class="content">
			<p class="message">

				{{-- Type: comment --}}
				@if($v->type === 'comment')
					{{ trans('app.notification_comment', array('username' => $target_user->username)) }}

					<a href="{{ $v->gags->endpoint() }}">
						<b>{{ trans('app.notification_check_it') }}</b>!
					</a>
				@endif

				{{-- Type: vote --}}
				@if($v->type === 'vote')
					{{ trans('app.notification_vote', array('username' => $target_user->username)) }}

					<a href="{{ $v->gags->endpoint() }}">
						<b>{{ trans('app.notification_check_it') }}</b>!
					</a>
				@endif

			</p>
			<p class="timestamp">
				<i class="fa fa-clock-o fa-fw"></i>
				{{ Date::parse($v->created_at)->diffForHumans() }}
			</p>
		</div>
	</li>
@endforeach