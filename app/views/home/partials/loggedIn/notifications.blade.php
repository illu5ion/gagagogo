<a class="dropdown-toggle opacity notification-container" data-toggle="dropdown" href="#">
	<div class="notification-bubble" data-notification-amount="{{ $notification_amount }}">{{ $notification_amount }}</div>
	<span>
		<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
	</span>
</a>
<div class="dropdown-menu notification-menu">
	<div class="notification-title">
		<h3>{{ trans('app.notifications') }}</h3>
		<i id="notification-trasher" class="fa fa-trash-o fa-lg pull-right"></i>
	</div>

	<div class="notification-container">
		@if(!$notifications->isEmpty())
		<ul>
			@include('home.partials.loggedIn.notifications-single', array('notifications' => $notifications))
		</ul>
		@else
		<ul>
			<li class="error"><span>{{ trans('app.notification_no_new_notification_is_found') }}</span></li>
		</ul>
		@endif
	</div>
	<div class="notification-view-all">
		
	</div>
</div>
<!-- /.dropdown-alerts -->