@extends('theme-admin.layout')
@section('title', trans('admin.category_listing'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
			<h2><i class="icon-folder-open"></i> @yield('title') </h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">		
			<a class="btn btn-success" href="{{ URL::to('admin/category/add') }}">
				<i class="icon-zoom-in icon-white"></i>  
				{{ trans('admin.category_add') }}
			</a>
		</div>
	</div>
</div>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-folder-open"></i>@yield('title')</h2>
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
						<th style="width: 30%;">{{ trans('admin.category_name') }}</th>
						<th style="width: 30%;">{{ trans('admin.category_featured_text') }}</th>
						<th style="width: 30%;">{{ trans('admin.management') }}</th>
					</tr>
				</thead>
				<tbody>

					@if(!$categories->isEmpty())
						@foreach($categories as $k => $v)
						<tr>
							<td>{{ $v->id }}</td>
							<td class="center">{{ $v->category_name }}</td>
							<td class="center">
								@if($v->featured_text == "0")
									<i>{{ trans('admin.category_no_text_given') }}</i>
								@else
									{{ $v->featured_text }}
								@endif
							</td>
							<td class="center">
								<a class="btn btn-primary" href="{{ URL::to('admin/category/modify/' . $v->id) }}">
									<i class="icon-zoom-in icon-white"></i>  
									{{ trans('admin.edit') }}
								</a>
								<a class="btn btn-success" href="{{ URL::to('category/' . Str::slug($v->category_name)) }}">
									<i class="icon-zoom-in icon-white"></i>  
									{{ trans('admin.inspect') }}
								</a>
								<a class="btn btn-danger" href="{{ URL::to('admin/category/delete/' . $v->id) }}" onclick="if(!confirm('{{ trans('admin.delete_confirm') }}')){return false;}">
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