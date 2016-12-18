@extends('theme-admin.layout')
@section('title', trans('admin.contact_listing'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-envelope"></i> @yield('title') </h2>
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
						<th style="width: 15%;">{{ trans('admin.author') }}</th>
						<th style="width: 15%;">Email</th>
						<th style="width: 30%;">{{ trans('admin.message') }}</th>
						<th style="width: 10%;">{{ trans('admin.date') }}</th>
						<th style="width: 20%;">{{ trans('admin.management') }}</th>
					</tr>
				</thead>
				<tbody>

					@if(!$contacts->isEmpty())
						@foreach($contacts as $k => $v)
						<tr>
							<td>{{{ $v->id }}}</td>
							<td class="center">{{{ $v->name }}}</td>
							<td class="center">{{{ $v->email }}}</td>
							<td class="center">{{{ $v->message }}}</td>
							<td class="center">{{{ Date::parse($v->created_at)->diffForHumans() }}}</td>
							<td class="center">
								<a class="btn btn-success" href="mailto:{{ $v->email }}">
									<i class="icon-zoom-in icon-white"></i>
									{{ trans('admin.reply') }}
								</a>
								<a class="btn btn-danger" href="{{ URL::to('admin/contact/delete/' . $v->id) }}" onclick="
									if(!confirm('{{ trans('admin.delete_confirm') }}')){return false;}">
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