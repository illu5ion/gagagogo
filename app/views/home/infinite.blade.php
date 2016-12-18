@if(!$gags->isEmpty())
	@foreach($gags as $k => $v)
		<div class="row gag-container" style="margin-left: 0;">
			<div class="gag-header" style="width:87%; float:left; top:0px;">

				{{-- Create header area (user avatar, title) --}}
				@include('home.partials.gag.header', array('gag' => $v, 'nextbutton' => false))

				{{-- Create header-below area (comments, votes) --}}
				@include('home.partials.gag.header-below', array('gag' => $v))

				{{-- Check types areand render accordingly --}}
				@include('home.partials.gag.typecheck', array('gag' => $v))

				{{-- Share buttons --}}
				@include('home.partials.gag.footer', array('gag' => $v))

				<hr>
			</div>

			@if( Auth::check() )
				@include('home.partials.loggedIn.vote-container', array('gag' => $v))
			@else
				@include('home.partials.loggedOut.vote-container', array('gag' => $v))
			@endif

		</div>
	@endforeach
@endif
