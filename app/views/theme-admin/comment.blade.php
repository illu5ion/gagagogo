@extends('theme-admin.layout')
@section('title', trans('admin.comment_listing'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-comment"></i>{{ trans('admin.comment_mass_approve') }}</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">		
			<a class="btn btn-success" href="{{ URL::to('admin/comment/massapprove') }}" onclick="if(!confirm('{{ trans('admin.comment_mass_approve_notice') }}')){return false;}">
				{{ trans('admin.comment_mass_approve') }}
			</a>
		</div>
	</div>
</div>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-comment"></i> @yield('title')</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			{{ $message_area }}

			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th style="width: 5%;">#</th>
						<th style="width: 20%;">{{ trans('admin.author') }}</th>
						<th style="width: 35%;">{{ trans('admin.comment') }}</th>
						<th style="width: 15%;">{{ trans('admin.date') }}</th>
						<th style="width: 25%;">{{ trans('admin.management') }}</th>
					</tr>
				</thead>
				<tbody>

					@if(!$comments->isEmpty())
						@foreach($comments as $k => $v)
						<tr>
							<td>{{{ $v->id }}}</td>
							<td class="center">{{{ $v->user->username }}} {{ $v->user->getPermissionForHumansStyled() }}</td>
							<td class="center">{{{ $v->message }}}</td>
							<td class="center">{{{ Date::parse($v->created_at)->diffForHumans() }}}</td>
							<td class="center">

								@if( (int) $v->is_approved === 0)
									<a class="btn btn-primary" href="{{ URL::to('admin/comment/approve/' . $v->id) }}">
										<i class="icon-ok icon-white"></i> 
										{{ trans('admin.approve') }}
									</a>
								@else
									<a class="btn btn-warning" href="{{ URL::to('admin/comment/disapprove/' . $v->id) }}">
										<i class="icon-lock icon-white"></i> 
										{{ trans('admin.disapprove') }}
									</a>
								@endif
								<a class="btn btn-danger" href="{{ URL::to('admin/comment/delete/' . $v->id) }}">
									<i class="icon-trash icon-white"></i> 
									{{ trans('admin.delete') }}
								</a>
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