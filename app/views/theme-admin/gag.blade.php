@extends('theme-admin.layout')
@section('title', trans('admin.gag_listing'))
@section('content')

@include('theme-admin.partials.breadcrumb')

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-pencil"></i>@yield('title')</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th style="width: 5%;">#</th>
						<th style="width: 25%;">{{ trans('admin.author') }}</th>
						<th style="width: 25%;">{{ trans('admin.title') }}</th>
						<th style="width: 30%;">{{ trans('admin.management') }}</th>
					</tr>
				</thead>
				<tbody>

					@if(!$gags->isEmpty())
						@foreach($gags as $k => $v)
						<tr>
							<td>{{ $v->id }}</td>
							<td class="center">{{{ $v->user->username }}} {{ $v->user->getPermissionForHumansStyled() }}</td>
							<td class="center">{{ $v->title }}</td>

							<td class="center">

								{{-- Show feature/unfeature only if the type is an image --}}
								@if($v->type === 'image')

									@if($v->is_featured == 0 || $v->is_featured == null)
										<a class="btn btn-mini btn-info" href="{{ URL::to('admin/gag/feature/' . $v->id) }}">
											<i class="icon-thumbs-up icon-white"></i>  
											{{ trans('admin.feature') }}
										</a>
									@else
										<a class="btn btn-mini btn-warning" href="{{ URL::to('admin/gag/unfeature/' . $v->id) }}">
											<i class="icon-thumbs-down icon-white"></i>  
											{{ trans('admin.unfeature') }}
										</a>
									@endif
								@endif

								{{-- Enable approve or disapprove gags --}}
								@if($v->is_approved == 0 || $v->is_approved == null)
									<a class="btn btn-mini" href="{{ URL::to('admin/gag/approve/' . $v->id) }}">
										<i class="icon-eye-open"></i>  
										{{ trans('admin.approve') }}
									</a>
									@else
									<a class="btn btn-mini" href="{{ URL::to('admin/gag/disapprove/' . $v->id) }}">
										<i class=" icon-eye-close"></i>
										{{ trans('admin.disapprove') }}
									</a>
								@endif

								<a class="btn btn-mini btn-success" href="{{ $v->endpoint() }}">
									<i class="icon-zoom-in icon-white"></i>  
									{{ trans('admin.inspect') }}
								</a>

								<a class="btn btn-mini btn-danger" href="{{ URL::to('admin/gag/delete/' . $v->id) }}" onclick="
									if(!confirm('{{ trans('admin.delete_confirm_gag') }}')){return false;}">
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