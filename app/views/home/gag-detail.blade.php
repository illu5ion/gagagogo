@extends('home.layout')

@section('title', $gag_detail->title)

@section('content')

<div class="container">
	<div class="row">
		@if( (bool) Session::has('message') === true)
			<div class="col-xs-12">
				<div class="alert alert-{{ Session::get('type') }} alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ Session::get('message') }}
				</div>
			</div>
		@endif
		<div class="single-gag col-xs-12 col-sm-8">

			<div class="row gag-container" style="margin-left: 0;">
				<div class="gag-header" style="width:87%; float:left; top:0px;">

					{{-- Create header area (user avatar, title) --}}
					@include('home.partials.gag.header', array('gag' => $gag_detail, 'nextbutton' => true))

					{{-- Create header-below area (comments, votes) --}}
					@include('home.partials.gag.header-below', array('gag' => $gag_detail))

					{{-- Check types areand render accordingly --}}
					@include('home.partials.gag.typecheck', array('gag' => $gag_detail))

					{{-- Share buttons --}}
					@include('home.partials.gag.footer', array('gag' => $gag_detail))

					{{-- Credits --}}
					@if($gag_detail->credits != '')
						<h5 style="color: #999;">{{ trans('app.upload_credits') }}: {{ $gag_detail->credits }}</h5>
					@endif
					<hr>
				</div>

				@if( Auth::check() )
					@include('home.partials.loggedIn.vote-container', array('gag' => $gag_detail))
				@else
					@include('home.partials.loggedOut.vote-container', array('gag' => $gag_detail))
				@endif

			</div>

			<!-- Placeholder for #comments links -->
			<div id="comments"></div>

			<div class="row comment-type-selector">
				<div class="col-xs-12">
					<ul>
						<li>
							<a data-div-open="app-comments" href="#">
								{{ Config::get('site.application_name') }} {{ ucfirst(trans('comments')) }}
							</a>
						</li>
						<li>
							<a data-div-open="facebook-comments" href="#">
								Facebook {{ ucfirst(trans('comments')) }}
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="row app-comments">
				<div class="col-xs-12">
					<h3>{{ trans('app.comment_post_a_comment') }}</h3>

					{{ $comment_area }}

					@if(!$comments->isEmpty())
						<div class="panel panel-default comments">
							<div class="panel-heading">
								<span class="glyphicon glyphicon-comment"></span>
								<h3 class="panel-title">
									{{ trans('app.comment_recent_comments') }}</h3>
								<span class="label label-info">
									{{ $comments->count() }}
								</span>
							</div>
							<div class="panel-body">
								<ul class="list-group">
									@foreach($comments as $k => $v)
										<li class="list-group-item">
											<div class="row">
												<div class="col-xs-2">
													<img src="{{ $v->user->getAssociatedAvatar() }}" class="img-responsive" alt="" /></div>
												<div class="col-xs-10">
													<div class="mic-info">
														{{ trans('app.profile_comment_header', array(
															'date' => Date::parse($v->created_at)->diffForHumans(),
															'url' => '<a href="' . URL::to('u/' . $v->user->username) . '">' . $v->user->username . '</a>')) }}
													</div>

													<div class="comment-text">
														{{{ $v->message }}}
													</div>
													<!--<div class="action">
														<button type="button" class="btn btn-danger btn-xs" title="{{ trans('app.report') }}">
															<span class="glyphicon glyphicon-flag"></span>
														</button>
													</div>-->
												</div>
											</div>
										</li>
									@endforeach
								</ul>
								<!-- Soon
								<a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> Load More</a> -->
							</div>
						</div>
					@else
						<p>{{ trans('app.error_not_found', array('name' => 'comment')) }}</p>
					@endif
				</div>
			</div>

			<div class="row facebook-comments facebook-responsive-container" style="display: none;">
				<div class="col-xs-12">
					<div class="fb-comments" data-href="{{ Request::url()}}" data-numposts="8" data-colorscheme="light"></div>
				</div>
			</div>
		</div>

		@include('home.partials.sidebar')

	</div><!--/row-->
</div><!--/.container-->

@stop