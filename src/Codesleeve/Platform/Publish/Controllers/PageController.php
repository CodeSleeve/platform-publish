<?php namespace Codesleeve\Platform\Publish\Controllers;

use View, Input, Auth, Session, Redirect, Response, App, Validator;
use Codesleeve\Platform\Publish\Models\Page;
use Codesleeve\Platform\Publish\Validators\PageValidator;

class PageController extends BaseController
{
	/**
	 * Create a new controller
	 */
	public function __construct(Page $pages)
	{
		parent::__construct();

		$this->pages = $pages;
		$this->validator = new PageValidator($this->namespaced("PageController"));
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
		return Redirect::action($this->namespaced("PageController@edit"), [$id]);
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

		$this->validator->validate(Input::all(), $page);

		$page->save();

		Session::flash('success', 'Updated page successfully');

		return Redirect::action($this->namespaced("PageController@index"));
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

		return Redirect::action($this->namespaced("PageController@index"));
	}
}