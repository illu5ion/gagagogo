<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-3">
				<p class="copyright">
					@if(!empty($settings->copyright))
						{{ $settings->copyright }}
					@endif
				</p>
			</div>
			<div class="col-xs-12 col-sm-9">
				@if(!$pages->isEmpty())
					<ul>
					@foreach($pages as $k => $v)
						<li><a href="{{ URL::to('pages/' . Str::slug($v->title)) }}">{{ $v->title }}</a></li>
					@endforeach
					</ul>
				@endif
			</div>
		</div>
	</div>
</footer>