{% extends 'layouts.scaffold' %}

{% block main %}

<h1>Show City</h1>

<p>{{ link_to_route('cities.index', 'Return to all cities') }}</p>
<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<th>
				{{ trans('eurovote.model.name') }}
			</th>
			
			<td>
				{{ city.name }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.name_native') }}
			</th>

			<td>
				{% for city.name_native in name_native %}
				{{ name_native }},
				{% endfor %}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.sortas') }}
			</th>

			<td>
				{{ city.sortas }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.slug') }}
			</th>

			<td>
				{{ city.slug }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.disambig') }}
			</th>

			<td>
				{{ city.disambig }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.descr') }}
			</th>

			<td>
				{{ city.descr }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.code') }}
			</th>

			<td>
				{{ city.code }}
			</td>
		</tr>

		<tr>
			<th>
				{{ trans('eurovote.model.is_former') }}
			</th>

			<td>
				{{ city.is_former }}
			</td>
		</tr>

		<tr>
			<td colspan="2">
				{{ link_to_route('cities.edit', 'Edit', [city.slug], {'class' : 'btn btn-info'}) }}
			</td>
		</tr>
		<tr>
			<td colspan="2">
				{{ form_open({'method' : 'DELETE', 'route' : ['cities.destroy', city.slug]}) }}
				{{ form_submit('Delete', {'class' : 'btn btn-danger'}) }}
				{{ form_close() }}
			</td>
		</tr>
	</tbody>
</table>
{% endblock %}
