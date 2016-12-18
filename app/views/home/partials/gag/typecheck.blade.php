{{-- If this is an image --}}
@if($gag->type === 'image')

	@section('facebook-share-image', URL::to('assets/public/uploads/' . $gag->gag_url . '.png'))
	<a href="{{ $gag->endpoint() }}" title="{{{ $gag->title }}}">
		<img src="{{ URL::to('assets/public/uploads/' . $gag->gag_url . '.png') }}" class="img-responsive" alt="{{{ $gag->title }}}" style="width: 100%;">
	</a>

@endif

{{-- If this is a gif --}}
@if($gag->type === 'gif')

	@section('facebook-share-image', URL::to('assets/public/uploads/gif_prefix_' . $gag->gag_url . '.png'))
	<div class="play-overlay clickable-gif">
		<a data-url="{{ URL::to('assets/public/uploads/' . $gag->gag_url . '.gif') }}" data-type="gif" href="#" title="{{{ $gag->title }}}">
			<img src="{{ URL::to('assets/public/uploads/gif_prefix_' . $gag->gag_url . '.png') }}" class="img-responsive" alt="{{{ $gag->title }}}" style="width: 100%; float: none;">
		</a>

		<span class="play">
			<i class="fa fa-play-circle-o"></i> GIF
		</span>
	</div>

@endif

{{-- If this is a youtube embed --}}
@if($gag->type === 'youtube')

	<iframe src="//www.youtube.com/embed/{{{ $gag->gag_url }}}" frameborder="0" allowfullscreen></iframe>

@endif

{{-- If this is a vine embed --}}
@if($gag->type === 'vine')
	<?php $json = json_decode($gag->gag_url); ?>
	
	<div class="play-overlay clickable-vine">
		<a data-url="{{{ $json->id }}}" data-type="vine" href="#" title="{{{ $gag->title }}}">
			<img src="{{{ $json->image }}}" class="img-responsive" alt="{{{ $gag->title }}}" style="width: 100%; float: none;">
		</a>

		<span class="play">
			<i class="fa fa-play-circle-o"></i> VINE
		</span>
	</div>

@endif

{{-- If this is a vimeo embed --}}
@if($gag->type === 'vimeo')

	<iframe src="//player.vimeo.com/video/{{{ $gag->gag_url }}}?portrait=0&title=0&badge=0&byline=0&autopause=0" frameborder="0" allowfullscreen></iframe>

@endif