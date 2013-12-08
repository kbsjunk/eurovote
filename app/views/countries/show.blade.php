@extends('layouts.scaffold')

@section('main')

<h1>Show Country</h1>

<p>{{ link_to_route('countries.index', 'Return to all countries') }}</p>
<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<th>
				{{ trans('eurovote.model.name') }}
			</th>

			<td>
				{{ $country->name }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.name_native') }}
			</th>

			<td>
				@foreach ($country->name_native as $name_native)
				{{ $name_native }},
				@endforeach
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.sortas') }}
			</th>

			<td>
				{{ $country->sortas }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.slug') }}
			</th>

			<td>
				{{ $country->slug }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.disambig') }}
			</th>

			<td>
				{{ $country->disambig }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.descr') }}
			</th>

			<td>
				{{ $country->descr }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.code') }}
			</th>

			<td>
				{{ $country->code }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.is_former') }}
			</th>

			<td>
				{{ $country->is_former }}
			</td>
		</tr>

		<tr>
			<td colspan="2">
				{{ link_to_route('countries.edit', 'Edit', array($country->id), array('class' => 'btn btn-info')) }}
			</td>
		</tr>
		<tr>
			<td colspan="2">
				{{ Form::open(array('method' => 'DELETE', 'route' => array('countries.destroy', $country->id))) }}
				{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}
			</td>
		</tr>
	</tbody>
</table>
@stop
