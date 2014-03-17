<?php namespace Codesleeve\Platform\Publish\Controllers;

use View, Input, Auth, Session, Redirect, Response, App, Validator;
use Codesleeve\Platform\Publish\Models\Page;
use Codesleeve\Platform\Publish\Validators\PageValidator;

class PageController extends BaseController
{
	/**
	 * Create a new controller
	 */
	public function __construct(Page $pages, PageValidator $validator)
	{
		parent::__construct();

		$this->pages = $pages;
		$this->validator = $validator;

		dd($this);
	}

	/**
	 * View all of the pages.
	 *
	 * @return void
	 */
	public function index()
	{
		$pages = $this->pages
			->orderBy(Input::query('sort_by', 'id'), Input::query('sort_direction', 'ASC'))
			->paginate();

		$this->layout->nest('content', "platform-publish::pages.index", compact('pages'));
	}

	/**
	 * Show the form to create a new page.
	 *
	 * @return void
	 */
	public function create()
	{
		$page = $this->pages->fill(Input::old());

		$this->layout->nest('content', "platform-publish::pages.create", compact('page'));
	}

	/**
	 * Create a new page.
	 *
	 * @return Response
	 */
	public function store()
	{
		$page = $this->pages->fill(Input::all());

		$this->validator->validate(Input::all(), $page);

		$page->save();

		Session::flash('success', 'Created page succesfully');

		return Redirect::action($this->namespaced("PageController@index"));
	}

	/**
	 * Show the page resource
	 *
	 * @param  int $id
	 * @return void
	 */
	public function show($id)
	{
		$page = $this->pages->findOrFail($id);

		$this->layout->nest('content', "platform-publish::pages.show", compact('page'));
	}

	/**
	 * Show the form to edit a specific page.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id)
	{
		$page = $this->pages->findOrFail($id);

		$page->available_roles = $this->roles->lists('name', 'id');

		$page->selected_roles = $page->roles()->select('roles.id AS id')->lists('id');

		$this->layout->nest('content', "platform-publish::pages.edit", compact('page'));
	}

	/**
	 * Edit a specific page.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$page = $this->pages->findOrFail($id);

		$page->fill(Input::all());

		if (Input::get('password'))
		{
			$page->password = Input::get('password');
		}

		$this->validator->validate(Input::all(), $page);

		$page->save();

		$page->roles()->sync(Input::get('role_ids', []));

		Session::flash('success', 'Updated page successfully');

		return Redirect::action($this->namespaced("pageController@index"));
	}

	/**
	 * Delete a specific page record.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = $this->pages->findOrFail($id);

		$page->delete();

		Session::flash('success', 'Record deletion successful!');

		return Redirect::action($this->namespaced("pageController@index"));
	}
}