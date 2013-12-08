{% extends 'layouts.scaffold' %}

{% block main %}

<h1>Edit City</h1>
{{ form_model(city, {'method' : 'PATCH', 'route' : array('cities.update', city.slug})) }}
<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<th>
				{{ form_label('name', trans('eurovote.model.name')) }}
			</th>
 
			<td>
				{{ form_text('name') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ form_label('name_native', trans('eurovote.model.name_native')) }}
			</th>

			<td>
				{{ form_arrayField('text', 'name_native', city.name_native, true) }}
			</td>
		</tr>

		<tr>
			<th>
				{{ form_label('sortas', trans('eurovote.model.sortas')) }}
			</th>

			<td>
				{{ form_text('sortas') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ form_label('slug',trans('eurovote.model.slug')) }}
			</th>

			<td>
				{{ form_text('slug') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ form_label('disambig', trans('eurovote.model.disambig')) }}
			</th>

			<td>
				{{ form_text('disambig') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ form_label('descr', trans('eurovote.model.descr')) }}
			</th>

			<td>
				{{ form_textarea('descr') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ form_label('code', trans('eurovote.model.code')) }}
			</th>

			<td>
				{{ form_text('code') }}
			</td>
		</tr>

		<tr>
			<th>
				{{ form_label('is_former', trans('eurovote.model.is_former')) }}
			</th>

			<td>
				{{ form_checkbox('is_former') }}
			</td>
		</tr>
		<tr>
			<td colspan="2">
				{{ form_submit('Update', {'class' : 'btn btn-info'}) }}
				{{ link_to_route('cities.show', 'Cancel', city.slug, {'class' : 'btn'}) }}
			</td>
		</tr>
	</tbody>
</table>
{{ form_close() }}

@if (errors.any())
<ul>
	{{ implode('', errors.all('<li class="error">:message</li>')) }}
</ul>
@endif

{% endblock %}
