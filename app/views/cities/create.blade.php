{% extends 'layouts.scaffold' %}

{% block main %}

<h1>Create City</h1>

{{ form_open({'route' : 'cities.store'}) }}
<ul>
	<li>
		{{ form_label('name', 'Name:') }}
		{{ form_text('name') }}
	</li>

	<li>
		{{ form_label('name_native', 'Name native:') }}
		{{ form_text('name_native') }}
	</li>

	<li>
		{{ form_label('sortas', 'Sortas:') }}
		{{ form_text('sortas') }}
	</li>

	<li>
		{{ form_label('slug', 'Slug:') }}
		{{ form_text('slug') }}
	</li>

	<li>
		{{ form_label('disambig', 'Disambig:') }}
		{{ form_text('disambig') }}
	</li>

	<li>
		{{ form_label('descr', 'Descr:') }}
		{{ form_textarea('descr') }}
	</li>

	<li>
		{{ form_label('code', 'Code:') }}
		{{ form_text('code') }}
	</li>

	<li>
		{{ form_label('is_former', 'Is former:') }}
		{{ form_checkbox('is_former') }}
	</li>

	<li>
		{{ form_submit('Submit', {'class' : 'btn btn-info'}) }}
	</li>
</ul>
{{ form_close() }}

@if (errors.any())
<ul>
	{{ implode('', errors.all('<li class="error">:message</li>')) }}
</ul>
@endif

{% endblock %}


