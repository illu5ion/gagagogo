<div class="navbar navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ URL::to('/') }}">
				@if(!empty($settings->logo))
					<img src="{{ URL::to('assets/public/uploads/' . $settings->logo) }}" alt="{{ Config::get('site.application_name') }} Logo">
				@endif
			</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav pull-left">

				<li class="dropdown">
					<a class="dropdown-toggle opacity" data-toggle="dropdown" href="#">
						{{ trans('app.nav_order') }} <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ URL::to('top') }}">{{ trans('app.nav_top') }}</a>
							<a href="{{ URL::to('hot') }}">{{ trans('app.nav_hot') }}</a>
							<a href="{{ URL::to('trending') }}">{{ trans('app.nav_trending') }}</a>
							<a href="{{ URL::to('/') }}">{{ trans('app.nav_fresh') }}</a>
						</li>
					</ul>
				</li>
				
				@if(!$categories->isEmpty())
					<?php $categoryCount = 0; ?>
					@foreach($categories as $k => $v)
						<?php $categoryCount++; ?>
						@if($categoryCount < 5)
							<li>
								@if( Request::segment(2) === Str::slug($v->category_name))
									<a class="selected" href="{{ URL::to('category/' . Str::slug($v->category_name)) }}">
										
									@if( $v->featured_text == "0")
										<span>
											{{ $v->category_name }}
										</span>
									@else
										<span class="popup text-featured popup-featured" data-featured="{{ $v->featured_text }}">
											{{ $v->category_name }}
										</span>
									@endif
									</a>
								@else
									<a href="{{ URL::to('category/' . Str::slug($v->category_name)) }}">
										
									@if( $v->featured_text == "0")
										<span>
											{{ $v->category_name }}
										</span>
									@else
										<span class="popup text-featured popup-featured" data-featured="{{ $v->featured_text }}">
											{{ $v->category_name }}
										</span>
									@endif
									</a>
								@endif
							</li>
						@else
						    @if($categoryCount === 5)
								<li class="dropdown">
									<a class="dropdown-toggle opacity" data-toggle="dropdown" href="#">
										{{ trans('app.more') }} <i class="fa fa-caret-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="{{ URL::to('category/' . Str::slug($v->category_name)) }}">{{ $v->category_name }}</a>
										</li>
							@else
										<li>
											<a href="{{ URL::to('category/' . Str::slug($v->category_name)) }}">{{ $v->category_name }}</a>
										</li>
							@endif

							@if($categoryCount === count($categories))
									</ul></li>
							@endif
						@endif
					@endforeach
				@endif
			</ul>
			
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					{{ $nav_notifications_partial }}
				</li>
				{{ $nav_login_partial }}
			</ul>
		</div>
	</div>
</div>

<div class="navbar-below">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-5 col-md-4">
				<div class="slogan">
					<p>{{ $settings->slogan }}</p>
				</div>				
			</div>

			<div class="col-xs-12 col-sm-7 col-md-8">
				<div class="social-container">

					<div class="facebook-like-container">
						<div class="fb-like" data-href="{{ $settings->facebook_like_address }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
					</div>
					
					<div class="facebook-share-container">
						<div class="fb-share-button" style="margin-top: 0px;" data-href="{{ URL::to('/') }}" data-type="button_count"></div>
					</div>

					<div class="twitter-container">
						<a href="https://twitter.com/share" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>