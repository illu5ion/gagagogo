@extends('theme-admin.layout')
@section('title', trans('admin.widget_listing'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-tasks"></i> {{ trans('admin.widget_add') }} </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">

			<a class="btn btn-warning" href="{{ URL::to('admin/widget/addstring') }}">
				<i class="icon-tasks icon-white"></i>  
				{{ trans('admin.widget_add_text_based') }}
			</a>

			<a class="btn btn-success" href="{{ URL::to('admin/widget/addupload') }}">
				<i class="icon-tasks icon-white"></i>  
				{{ trans('admin.widget_add_upload_based') }}
			</a>

		</div>
	</div>
</div>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-tasks"></i> @yield('title')</h2>
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
						<th style="width: 30%;">{{ trans('admin.widget_name') }}</th>
						<th style="width: 30%;">{{ trans('admin.type') }}</th>
						<th style="width: 30%;">{{ trans('admin.management') }}</th>
					</tr>
				</thead>
				<tbody>

					@if(!$widgets->isEmpty())
						@foreach($widgets as $k => $v)
						<tr>
							<td>{{ $v->id }}</td>
							<td class="center">{{ $v->name }}</td>
							<td class="center">{{ ucfirst($v->type) }}</td>
							<td class="center">
								<a class="btn btn-success" href="{{ URL::to('/') }}">
									<i class="icon-zoom-in icon-white"></i>  
									{{ trans('admin.inspect') }}
								</a>
								<a class="btn btn-danger" href="{{ URL::to('admin/widget/delete/' . $v->id) }}"  onclick="if(!confirm('{{ trans('admin.delete_confirm') }}')){return false;}">
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