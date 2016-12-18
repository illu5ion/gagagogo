<div class="modal fade bs-modal-sm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="bs-example bs-example-tabs">
				<button type="button" class="close close-padding" data-dismiss="modal" aria-hidden="true">&times;</button>
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#sign-in" data-toggle="tab"><span class="glyphicon glyphicon-log-in"></span> {{ trans('app.sign_in') }}</a></li>
					<li class=""><a href="#sign-up" data-toggle="tab"><span class="glyphicon glyphicon-user"></span> {{ trans('app.register') }}</a></li>
				</ul>
			</div>
			<div class="modal-body">
				<div id="myTabContent" class="tab-content">
		
					<div class="alert alert-danger alert-dismissable" style="display: none;">
						<strong>{{ trans('app.error') }}:</strong> <span></span>
					</div>

					<div class="alert alert-success alert-dismissable" style="display: none;">
						<strong>{{ trans('app.success') }}:</strong> <span></span>
					</div>

					<div class="tab-pane fade active in" id="sign-in">
						<form id="sign-in-form" class="form-horizontal" role="form" action="#" method="post">

						<input name="_token" type="hidden" value="{{ csrf_token() }}" />
						<fieldset>
						<!-- Sign In Form -->
						<!-- Text input-->
						<div class="control-group">
							<label class="control-label" for="username">{{ trans('app.username') }}:</label>
							<div class="controls">
								<input required="" id="username" name="username" type="text" class="form-control" placeholder="{{ trans('app.username') }}..." class="input-medium" required="">
							</div>
						</div>

						<!-- Password input-->
						<div class="control-group">
							<label class="control-label" for="password">{{ trans('app.password') }}:</label>
							<div class="controls">
								<input required="" id="password" name="password" class="form-control" type="password" placeholder="{{ trans('app.password') }}..." class="input-medium">
							</div>
						</div>

						<!-- Multiple Checkboxes (inline) -->
						<div class="control-group">
							<label class="control-label" for="rememberme"></label>
							<div class="controls">
								<label class="checkbox inline" for="rememberme-0">
									<input type="checkbox" name="rememberme" id="rememberme-0" value="0">
									{{ trans('app.remember_me') }}
								</label>
							</div>
						</div>

						<!-- Button -->
						<div class="control-group">
							<label class="control-label" for="signin"></label>
							<div class="controls">
								<button id="signin" name="signin" data-loading-text="{{ trans('app.loading') }}" class="btn btn-success">{{ trans('app.sign_in') }}</button>
								{{ trans('app.or') }}
								<!-- Facebook -->
								<a href="{{ URL::to('auth/provider/facebook') }}" class="btn btn-primary" style="background-color: #3468af;">
									<span class="icon fa fa-facebook" style="color: white; font-size: 16px; line-height: 16px; margin-right: 3px;"></span> 
									{{ trans('app.connect_facebook') }}
								</a>
							</div>
						</div>

						</fieldset>
					</form>
				</div>
				<div class="tab-pane fade" id="sign-up">
						<form id="sign-up-form" class="form-horizontal" role="form" action="#" method="post">

						<input name="_token" type="hidden" value="{{ csrf_token() }}" />
						<fieldset>
						<!-- Sign Up Form -->
						<!-- Text input-->
						<div class="control-group">
							<label class="control-label" for="username">{{ trans('app.username') }}:</label>
							<div class="controls">
								<input id="username" name="username" class="form-control" type="text" placeholder="{{ trans('app.username') }}..." class="input-large" required="">
							</div>
						</div>
						
						<!-- Text input-->
						<div class="control-group">
							<label class="control-label" for="password">{{ trans('app.password') }}:</label>
							<div class="controls">
								<input id="password" name="password" class="form-control" type="password" placeholder="{{ trans('app.password') }}..." class="input-large" required="">
							</div>
						</div>
						
						<!-- Password input-->
						<div class="control-group">
							<label class="control-label" for="email">{{ trans('app.email') }}:</label>
							<div class="controls">
								<input id="email" name="email" class="form-control" type="text" placeholder="{{ trans('app.email') }}..." class="input-large" required="">
							</div>
						</div>
						
						<!-- Button -->
						<div class="control-group">
							<label class="control-label" for="signup"></label>
							<div class="controls">
								<button id="signup" name="signup" data-loading-text="{{ trans('app.loading') }}" class="btn btn-success">{{ trans('app.register') }}</button>
							</div>
						</div>
						</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>