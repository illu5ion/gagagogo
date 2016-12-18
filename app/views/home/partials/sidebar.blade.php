<div class="col-sm-4 hidden-xs">

	<!-- Widget -->
	@if(!$widgets->isEmpty())
		@foreach($widgets as $k => $v)
			<div class="widget-container">
				<div class="panel panel-colored">
					<div class="panel-heading">
						{{ $v->name }}
					</div>

					@if($v->type === 'swf')
						<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="100%" height="100%">
						<param name="movie" value="{{ URL::to('assets/public/uploads/' . $v->content . '.swf') }}"/>
						<param name="quality" value="best" />
						<param name="menu" value="true" />
						<param name="allowScriptAccess" value="sameDomain" />
						<embed src="{{ URL::to('assets/public/uploads/' . $v->content . '.swf') }}" quality="best" menu="true" width="100%" height="100%" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="sameDomain" />
						</object>
					@endif

					@if($v->type === 'image')
						<img src="{{ URL::to('assets/public/uploads/' . $v->content . '.png') }}" class="img-responsive" style="width: 100%;">
					@endif

					@if($v->type === 'gif')
						<img src="{{ URL::to('assets/public/uploads/' . $v->content . '.gif') }}" class="img-responsive" style="width: 100%;">
					@endif

					@if($v->type === 'string')
						<div style="color: #555; padding: 10px 15px;">
							{{ $v->content }}
						</div>
					@endif

				</div>
			</div>
		@endforeach
	@endif
	<!--/widget-->

	<!-- Widget -->
	@if(!$featured_gags->isEmpty())
		<div class="widget-container">
			<div class="panel panel-colored">
				<div class="panel-heading">
					{{ trans('app.featured') }}
				</div>

				@foreach($featured_gags as $k => $v)
					@if($v->type === 'image')
						<div class="thumbnail">
							<h3>
								<a href="{{ $v->endpoint() }}">{{{ $v->title }}}</a>
							</h3>

							<a href="{{ $v->endpoint() }}" title="{{{ $v->title }}}">
								<img src="{{ URL::to('assets/public/uploads/cropped_' . $v->gag_url . '.png') }}" class="img-responsive" alt="{{{ $v->title }}}" style="width: 100%;">
							</a>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	@endif
	<!--/widget-->

	<!-- Widget -->
	@if(!$pages->isEmpty())
	<div class="widget-container">
		<div class="panel panel-colored">
			<div class="panel-heading">
				{{ trans('app.pages') }}
			</div>
			 <div class="list-group">
				@foreach($pages as $k => $v)
					<a class="list-group-item" href="{{ URL::to('pages/' . Str::slug($v->title)) }}">{{ $v->title }}</a>
				@endforeach
				<a class="list-group-item" href="{{ URL::to('contact') }}">{{ trans('app.contact') }}</a>
			</div>
		</div>
	</div>
	@endif
	<!--/widget-->

	<!-- Widget -->
	@if(!$categories->isEmpty())
	<div class="widget-container">
		<div class="panel panel-colored">
			<div class="panel-heading">
				{{ trans('app.categories') }}
			</div>

			 <div class="list-group">
			 	@foreach($categories as $k => $v)
			 	<a href="{{ URL::to('category/' . Str::slug($v->category_name)) }}" title="{{ $v->category_name }} Category" class="list-group-item">
			 		{{ $v->category_name }}
				</a>
				@endforeach
			</div>
		</div>
	</div>
	@endif
	<!--/widget-->

	<!-- Widget -->
	<div class="widget-container facebook-responsive-container">
		<div class="panel panel-colored">
			<div class="panel-heading">
				{{ trans('app.like_us_on_facebook') }}
			</div>

			<div class="fb-like-box" data-href="{{ $settings->facebook_like_address }}" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
		</div>
	</div>
	<!--/widget-->

	@if(PluginManager::activated('SidebarEnhancements'))
		{{ PluginManager::get('SidebarEnhancements')->getSidebar() }}
	@endif

</div>