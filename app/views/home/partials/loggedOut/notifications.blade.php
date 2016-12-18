<a class="dropdown-toggle opacity notification-container" data-toggle="dropdown" href="#">
	<div class="notification-bubble" data-notification-amount="0">0</div>
	<span>
		<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
	</span>
</a>
<div class="dropdown-menu notification-menu">
	<div class="notification-title">
		<h3>{{ trans('app.notifications') }}</h3>
	</div>

	<div class="notification-container">
		<ul>
			<li class="error"><span>{{ trans('app.notification_login_required') }}</span></li>
		</ul>
	</div>
	<div class="notification-view-all">
		
	</div>
</div>
<!-- /.dropdown-alerts -->