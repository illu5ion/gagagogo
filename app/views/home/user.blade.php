@extends('home.layout')

@section('title', $user->username . ' ' . trans('app.profile_page'))

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			
			<h2>{{ trans('app.user_public_profile_of', array('username' => $user->username)) }}</h2>

			<hr>
			
			<div class="col-xs-12 col-sm-6">
				<p>{{ trans('app.user_permission_level') }}: {{ $user->getPermissionForHumansStyledBootstrap3() }}</p>

				<p>{{ trans('app.user_votes_taken') }}: {{ $votes_taken }}</p>

				<p>{{ trans('app.user_votes_given') }}: {{ $votes_given }}</p>

				<p>{{ trans('app.user_shares') }}: {{ $shares }}</p>
			</div>

			<div class="col-xs-12 col-sm-6">
				@if(!$comments->isEmpty())
					<div class="panel panel-default comments">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-comment"></span>
							<h3 class="panel-title">
								{{ trans('app.user_comments', array('username' => $user->username)) }}</h3>
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
												<img src="{{ $v->user->getAssociatedAvatar() }}" class="img-circle img-responsive" alt="" /></div>
											<div class="col-xs-10">
												<div class="mic-info">
													{{ trans('app.profile_comment_header', array(
															'date' => Date::parse($v->created_at)->diffForHumans(),
															'url' => '<a href="' . URL::to('u/' . $user->username) . '">' . $user->username . '</a>')) }}
												</div>

												<div class="comment-text">
													{{{ $v->message }}}
												</div>
											</div>
										</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>

					{{ $comments->links() }}
				@else
					<p>{{ trans('app.error_not_found', array('name' => lcfirst(trans('app.comment')))) }}</p>
				@endif
			</div>
		</div>
	</div>
</div>

@stop