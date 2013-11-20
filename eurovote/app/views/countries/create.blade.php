@extends('layouts.scaffold')

@section('main')

<h1>Create Country</h1>

{{ Form::open(array('route' => 'countries.store')) }}
<ul>
	<li>
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name') }}
	</li>

	<li>
		{{ Form::label('name_native', 'Name native:') }}
		{{ Form::text('name_native') }}
	</li>

	<li>
		{{ Form::label('sortas', 'Sortas:') }}
		{{ Form::text('sortas') }}
	</li>

	<li>
		{{ Form::label('slug', 'Slug:') }}
		{{ Form::text('slug') }}
	</li>

	<li>
		{{ Form::label('disambig', 'Disambig:') }}
		{{ Form::text('disambig') }}
	</li>

	<li>
		{{ Form::label('descr', 'Descr:') }}
		{{ Form::textarea('descr') }}
	</li>

	<li>
		{{ Form::label('code', 'Code:') }}
		{{ Form::text('code') }}
	</li>

	<li>
		{{ Form::label('is_former', 'Is former:') }}
		{{ Form::checkbox('is_former') }}
	</li>

	<li>
		{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
	</li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop


