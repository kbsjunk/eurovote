@extends('layouts.scaffold')

@section('main')

<h1>Edit Country</h1>
{{ Form::model($country, array('method' => 'PATCH', 'route' => array('countries.update', $country->id))) }}
<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<th>
				{{ Form::label('name', trans('eurovote.model.name')) }}
			</th>

			<td>
				{{ Form::text('name') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ Form::label('name_native', trans('eurovote.model.name_native')) }}
			</th>

			<td>
				{{ Form::arrayField('text', 'name_native', $country->name_native, true) }}
			</td>
		</tr>

		<tr>
			<th>
				{{ Form::label('sortas', trans('eurovote.model.sortas')) }}
			</th>

			<td>
				{{ Form::text('sortas') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ Form::label('slug',trans('eurovote.model.slug')) }}
			</th>

			<td>
				{{ Form::text('slug') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ Form::label('disambig', trans('eurovote.model.disambig')) }}
			</th>

			<td>
				{{ Form::text('disambig') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ Form::label('descr', trans('eurovote.model.descr')) }}
			</th>

			<td>
				{{ Form::textarea('descr') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ Form::label('code', trans('eurovote.model.code')) }}
			</th>

			<td>
				{{ Form::text('code') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ Form::label('is_former', trans('eurovote.model.is_former')) }}
			</th>

			<td>
				{{ Form::checkbox('is_former') }}
			</td>
		</tr>
		<tr>
			<td colspan="2">
				{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
				{{ link_to_route('countries.show', 'Cancel', $country->id, array('class' => 'btn')) }}
			</td>
		</tr>
	</tbody>
</table>
{{ Form::close() }}

@if ($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
