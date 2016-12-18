<div class="row">
	<div class="col-xs-10">
	<p>
		<a href="{{ $gag->endpoint() }}">
			{{ trans('app.gag_date', array('date' => Date::parse($gag->created_at)->diffForHumans())) }}
		</a>
		<span>-</span>
		<a href="{{ $gag->endpoint() }}">

			<?php $commentsAmt = Comment::where('on', $gag->id)->where('is_approved', 1)->count(); ?>
			<?php $upvoteAmt = Vote::where('gag_id', $gag->id)->where('vote', 1)->count(); ?>
			<?php $downvoteAmt = Vote::where('gag_id', $gag->id)->where('vote', -1)->count(); ?>

			{{ Lang::choice('app.gag_comments', $commentsAmt, array('count' => $commentsAmt)) }}
		</a>
		<span>-</span>
		<a href="{{ $gag->endpoint() }}">
			{{ trans('app.gag_votes', array('vote_amt' => abs($upvoteAmt - $downvoteAmt) )) }}
		</a>
	</p>
	</div>
</div>