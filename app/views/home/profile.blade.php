@extends('home.layout')

@section('title', trans('app.my_profile'))

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			
			<h2>{{ trans('app.settings') }}</h2>
			
			{{ $message_area }}

			<p>{{ trans('app.profile_welcome', array('username' => Auth::user()->username)) }}</p>
			
			<hr>
			
			<div class="col-xs-12 col-sm-6">
				<h4 class="text-center">{{ trans('app.profile_change_password') }}</h4>
				<form method="post" action="{{ URL::to('profile/password/update') }}">
					
					<input name="_token" type="hidden" value="{{ csrf_token() }}" />
					
					<div class="form-group">
						<label for="password" class="control-label">{{ trans('app.profile_new_password') }}</label>
						<input type="password" id="password" class="form-control" placeholder="{{ trans('app.profile_new_password') }}..." name="password" value="{{ Input::old('password') }}" required/>
					</div>

					<div class="form-group">
						<label for="cpassword" class="control-label">{{ trans('app.profile_new_password') }} ({{ trans('app.profile_again') }})</label>
						<input type="password" id="cpassword" class="form-control" placeholder="{{ trans('app.profile_new_password') }} ({{ trans('app.profile_again') }})..." name="cpassword" value="{{ Input::old('cpassword') }}" required/>
					</div>

					<button type="submit" class="btn btn-primary btn-md" role="button">{{ trans('app.profile_change_password') }}</a>

				</form>
			</div>

			<div class="col-xs-12 col-sm-6">
				@if(!$comments->isEmpty())
					<div class="panel panel-default comments">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-comment"></span>
							<h3 class="panel-title">
								{{ trans('app.profile_your_comments') }}</h3>
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
															'url' => '<a href="' . URL::to('u/' . Auth::user()->username) . '">you</a>')) }}
												</div>

												<div class="comment-text">
													{{{ $v->message }}}
												</div>
												<div class="action">
													@if( (int) $v->is_approved === 1)
														<button type="button" class="btn btn-success btn-xs" title="{{ trans('app.approved') }}">
															<span class="label label-successs">{{ trans('app.approved') }}</span>
														</button>
													@endif

													@if( (int) $v->is_approved === 0)
														<button type="button" class="btn btn-primary btn-xs" title="{{ trans('app.not_approved_yet') }}">
															<span class="label label-primary">{{ trans('app.not_approved_yet') }}</span>
														</button>
													@endif

													<a href="{{ URL::to('profile/comment/delete/' . $v->id) }}">
														<button type="button" class="btn btn-danger btn-xs" title="{{ trans('app.delete') }}">
															<span class="glyphicon glyphicon-trash"></span>
														</button>
													</a>
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