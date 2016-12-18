<div class="gag-footer">
	<ul>
		<li class="facebook">
			<a href="https://www.facebook.com/sharer/sharer.php?u={{ $gag->endpoint() }}" target="_blank" title="Share on Facebook">
				<span class="icon fa fa-facebook"></span>
				<span class="text">{{ trans('app.social_share') }}</span>
			</a>
		</li>
		<li class="twitter">
			<a href="https://twitter.com/intent/tweet?url={{ $gag->endpoint() }}" target="_blank" title="Share on Twitter">
				<span class="icon fa fa-twitter"></span>
				<span class="text">{{ trans('app.social_tweet') }}</span>
			</a>
		</li>
		<li class="google-plus">
			<a href="https://plus.google.com/share?url={{ $gag->endpoint() }}" target="_blank" title="Share on Google Plus">
				<span class="icon fa fa-google-plus"></span>
				<span class="text">+1</span>
			</a>
		</li>

		{{-- If this is an image --}}
		@if($gag->type === 'image')
			<li class="pinterest">
				<a href="//www.pinterest.com/pin/create/button/?url={{ $gag->endpoint() }}&media={{ URL::to('assets/public/uploads/' . $gag->gag_url . '.png') }}&description={{ $gag->title }}" target="_blank" title="Share on Pinterest">
					<span class="icon fa fa-pinterest"></span>
					<span class="text">{{ trans('app.social_pin') }}</span>
				</a>
			</li>
		{{-- If this is a gif --}}
		@elseif($gag->type === 'gif')
			<li class="pinterest">
				<a href="//www.pinterest.com/pin/create/button/?url={{ $gag->endpoint() }}&media={{ URL::to('assets/public/uploads/' . $gag->gag_url . '.gif') }}&description={{ $gag->title }}" target="_blank" title="Share on Pinterest">
					<span class="icon fa fa-pinterest"></span>
					<span class="text">{{ trans('app.social_pin') }}</span>
				</a>
			</li>
		@else
		<li class="pinterest">
			<a href="//www.pinterest.com/pin/create/button/?url={{ $gag->endpoint() }}&description={{ $gag->title }}" target="_blank" title="Share on Pinterest">
				<span class="icon fa fa-pinterest"></span>
				<span class="text">{{ trans('app.social_pin') }}</span>
			</a>
		</li>
		@endif
	</ul>
</div>