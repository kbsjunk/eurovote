{% extends 'layouts.scaffold' %}

{% block main %}

<h1>All Cities</h1>

<p>{{ link_to_route('cities.create', 'Add new city') }}</p>

@if (cities.count())
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>{{ trans('eurovote.model.name') }}</th>
			<th>{{ trans('eurovote.model.name_native') }}</th>
			<th>{{ trans('eurovote.model.sortas') }}</th>
			<th>{{ trans('eurovote.model.slug') }}</th>
			<th>{{ trans('eurovote.model.disambig') }}</th>
			<th>{{ trans('eurovote.model.descr') }}</th>
			<th>{{ trans('eurovote.country') }}</th>
			<th>{{ trans('eurovote.model.is_former') }}</th>
		</tr>
	</thead>

	<tbody>
		{% for cities in city %}
		<tr>
			<td>
				{{ city.anchor() }}
			</td>

			<td>
				{{ implode(', ', city.name_native) }}
			</td>

			<td>
				{{ city.sortas }}
			</td>

			<td>
				{{ city.slug }}
			</td>

			<td>
				{{ city.disambig }}
			</td>

			<td>
				{{ city.descr }}
			</td>

			<td>
				{{ city.country.anchor() }}
			</td>

			<td>
				{{ city.is_former }}
			</td>
			<td>{{ link_to_route('cities.edit', 'Edit', {city.slug}, {'class' : 'btn btn-info'}) }}</td>
			<td>
				{{ form_open({'method' : 'DELETE', 'route' : array('cities.destroy', city.slug})) }}
				{{ form_submit('Delete', {'class' : 'btn btn-danger'}) }}
				{{ form_close() }}
			</td>
		</tr>
		{% endfor %}
	</tbody>
</table>
@else
There are no cities
@endif

{% endblock %}
