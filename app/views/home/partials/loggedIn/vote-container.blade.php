{{-- Did we already vote on those? --}}
<?php $status = Vote::where('gag_id', $gag->id)->where('user_id', Auth::user()->id)->first(); ?>

<div class="vote-container">
	<a class="upvote" data-type="upvote" data-url="{{ URL::to('profile/vote/' . $gag->id . '/up') }}" href="#">
		<button class="btn btn-default btn-md">
			@if( ( $status != false ) && ( (int) $status->vote === 1) )
				<i class="fa fa-arrow-up selected"></i>
			@else
				<i class="fa fa-arrow-up"></i>
			@endif
		</button>
	</a>
	<a class="downvote" data-type="downvote" data-url="{{ URL::to('profile/vote/' . $gag->id) . '/down'}}" href="#">
		<button class="btn btn-default btn-md">
			@if( ( $status != false ) && ( (int) $status->vote === -1) )
				<i class="fa fa-arrow-down selected"></i>
			@else
				<i class="fa fa-arrow-down"></i>
			@endif
		</button>
	</a>
	
	<a href="{{ $gag->endpoint() }}#comments">
		<button class="btn btn-default btn-md">
			<i class="fa fa-comment"></i>
		</button>
	</a>
</div>