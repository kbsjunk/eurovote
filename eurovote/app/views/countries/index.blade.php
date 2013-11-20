@extends('layouts.scaffold')

@section('main')

<h1>All Countries</h1>

<p>{{ link_to_route('countries.create', 'Add new country') }}</p>

@if ($countries->count())
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>{{ trans('eurovote.model.name') }}</th>
			<th>{{ trans('eurovote.model.name_native') }}</th>
			<th>{{ trans('eurovote.model.sortas') }}</th>
			<th>{{ trans('eurovote.model.slug') }}</th>
			<th>{{ trans('eurovote.model.disambig') }}</th>
			<th>{{ trans('eurovote.model.descr') }}</th>
			<th>{{ trans('eurovote.model.code') }}</th>
			<th>{{ trans('eurovote.model.is_former') }}</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($countries as $country)
		<tr>
			<td>
				{{ link_to_route('countries.show', $country->name, array($country->id)) }}
			</td>

			<td>
				{{ $country->name_native }}
			</td>

			<td>
				{{ $country->sortas }}
			</td>

			<td>
				{{ $country->slug }}
			</td>

			<td>
				{{ $country->disambig }}
			</td>

			<td>
				{{ $country->descr }}
			</td>

			<td>
				{{ $country->code }}
			</td>

			<td>
				{{ $country->is_former }}
			</td>
			<td>{{ link_to_route('countries.edit', 'Edit', array($country->id), array('class' => 'btn btn-info')) }}</td>
			<td>
				{{ Form::open(array('method' => 'DELETE', 'route' => array('countries.destroy', $country->id))) }}
				{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
There are no countries
@endif

@stop
