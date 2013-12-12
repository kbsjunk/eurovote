<?php

class CountriesController extends BaseController {

	/**
	 * Country Repository
	 *
	 * @var Country
	 */
	protected $country;

	public function __construct(Country $country)
	{
		$this->country = $country;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function insdex()
	{
		$countries = $this->country->orderBy('sortas')->orderBy('slug')->get();

		return View::make('countries.index', compact('countries'));
	}

	public function index()
	{

		$countries = $this->country->with('cities')->orderBy('sortas')->orderBy('slug')->get();

		// dd($countries->toArray());

		$model = new \Kendo\Data\DataSourceSchemaModel();

		$nameField = new \Kendo\Data\DataSourceSchemaModelField('name');
		$nameField->type('string');

		$nameNativeField = new \Kendo\Data\DataSourceSchemaModelField('name_native');
		$nameNativeField->type('string');

		$sortAsField = new \Kendo\Data\DataSourceSchemaModelField('sortas');
		$sortAsField->type('string');

		$disambigField = new \Kendo\Data\DataSourceSchemaModelField('disambig');
		$disambigField->type('string');

		$codeField = new \Kendo\Data\DataSourceSchemaModelField('code');
		$codeField->type('string');

		$isFormerField = new \Kendo\Data\DataSourceSchemaModelField('is_former');
		$isFormerField->type('boolean');

		$model->addField($nameField, $nameNativeField, $sortAsField, $disambigField, $codeField, $isFormerField);

		$schema = new \Kendo\Data\DataSourceSchema();
		$schema->model($model);
		$dataSource = new \Kendo\Data\DataSource();

		$dataSource->data($countries->toArray())
		->schema($schema);

		$grid = new \Kendo\UI\Grid('grid');

		$nameColumn = new \Kendo\UI\GridColumn();
		$nameColumn->field('name')
		->title('Country');

		$nameNativeColumn = new \Kendo\UI\GridColumn();
		$nameNativeColumn->field('name_native')
		->title('Local Name');

		$disambigColumn = new \Kendo\UI\GridColumn();
		$disambigColumn->field('disambig')
		->title('Disambiguation');

		// $sortAsColumn = new \Kendo\UI\GridColumn();
		// $sortAsColumn->field('sort_as')
		// ->title('Sort As');

		$codeColumn = new \Kendo\UI\GridColumn();
		$codeColumn->field('code')
		->width('100px')
		->title('Code');

		$isFormerColumn = new \Kendo\UI\GridColumn();
		$isFormerColumn->field('is_former')
		->width('80px')
		->title('Former');
//$sortAsColumn, 
		$grid->addColumn($nameColumn, $nameNativeColumn, $disambigColumn, $codeColumn, $isFormerColumn)
		->dataSource($dataSource)

		// $grid->columnMenu(true);
		->sortable(true)
		->groupable(true)
		->height(400)
		->mobile(true);

		$grid->detailTempate();

		$pageable = new \Kendo\UI\GridPageable();
		$pageable->pageSize(20);
		$grid->pageable($pageable);

		return View::make('kendo.grid', array('contents' => $grid->render()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('countries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Country::$rules);

		if ($validation->passes())
		{
			$this->country->create($input);

			return Redirect::route('countries.index');
		}

		return Redirect::route('countries.create')
		->withInput()
		->withErrors($validation)
		->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$country = $this->country->findBySlug($id);

		return View::make('countries.show', compact('country'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$country = $this->country->findBySlug($id);

		if (is_null($country))
		{
			return Redirect::route('countries.index');
		}

		return View::make('countries.edit', compact('country'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Country::$rules);

		if ($validation->passes())
		{
			$country = $this->country->findBySlug($id);
			$country->update($input);

			return Redirect::route('countries.show', $id);
		}

		return Redirect::route('countries.edit', $id)
		->withInput()
		->withErrors($validation)
		->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->country->findBySlug($id)->delete();

		return Redirect::route('countries.index');
	}

}
