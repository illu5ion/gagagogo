@extends('theme-admin.layout')
@section('title', trans('admin.user_listing'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-user"></i> {{ trans('admin.user_add') }} </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">		
			<a class="btn btn-success" href="{{ URL::to('admin/user/add') }}">
				<i class="icon-zoom-in icon-white"></i>  
				{{ trans('admin.user_add') }}
			</a>
		</div>
	</div>
</div>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> @yield('title') </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th style="width: 10%;">#</th>
						<th style="width: 20%;">{{ trans('admin.user_username') }}</th>
						<th style="width: 20%;">Email</th>
						<th style="width: 10%;">{{ trans('admin.permission') }}</th>
						<th style="width: 10%;">{{ trans('admin.authorization') }}</th>
						<th style="width: 30%;">{{ trans('admin.management') }}</th>
					</tr>
				</thead>
				<tbody>

					@if(!$users->isEmpty())
						@foreach($users as $k => $v)
						<tr>
							<td>{{{ $v->id }}}</td>
							<td class="center">{{{ $v->username }}}</td>
							<td class="center">{{{ $v->usermail }}}</td>

							@if( (int) $v->authority === 0)
								<td class="center"><span class="badge badge-inverse">{{ $v->getPermissionForHumans() }}</span></td>
							@endif

							@if( (int) $v->authority === 1)
								<td class="center"><span class="badge badge-success">{{ $v->getPermissionForHumans() }}</span></td>
							@endif
							
							@if( (int) $v->authority === 255)
								<td class="center"><span class="badge badge-warning">{{ $v->getPermissionForHumans() }}</span></td>
							@endif

							@if($v->registration_type === 'standard')
								<td class="center"><span class="badge badge-primary">{{{ ucfirst($v->registration_type) }}}</span></td>
							@endif

							@if($v->registration_type === 'facebook')
								<td class="center"><span class="badge" style="background-color: #3468af;">{{{ ucfirst($v->registration_type) }}}</span></td>
							@endif

							<td class="center">
								<a class="btn btn-success" href="{{ URL::to('u/' . Str::slug($v->username)) }}">
									<i class="icon-zoom-in icon-white"></i>  
									{{ trans('admin.user_view_profile') }}
								</a>

								@if( (int) $v->authority === 0)
									<a class="btn btn-danger" href="{{ URL::to('admin/user/ban/' . $v->id) }}" onclick="if(!confirm('{{ trans('admin.user_ban_admin_notice') }}')){return false;}">
									<i class="icon-lock icon-white"></i> 
									{{ trans('admin.ban') }}
								</a>
								@endif

								@if( (int) $v->authority === 1)
									<a class="btn btn-danger" href="{{ URL::to('admin/user/ban/' . $v->id) }}" onclick="if(!confirm('{{ trans('admin.user_ban_user_notice') }}')){return false;}">
									<i class="icon-lock icon-white"></i> 
									{{ trans('admin.ban') }}
								</a>
								@endif

								@if( (int) $v->authority === 255)
									<a class="btn btn-warning" href="{{ URL::to('admin/user/unban/' . $v->id) }}" onclick="if(!confirm('{{ trans('admin.user_unban_user_notice') }}')){return false;}">
									<i class="icon-ok icon-white"></i>
									{{ trans('admin.unban') }}
								</a>
								@endif
							</td>
						</tr>
						@endforeach
					@endif

				</tbody>
			</table>
		</div>
	</div><!--/span-->

</div><!--/row-->

@stop