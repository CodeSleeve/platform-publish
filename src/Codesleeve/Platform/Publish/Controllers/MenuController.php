<?php namespace Codesleeve\Platform\Publish\Controllers;

use View, Input, Auth, Session, Redirect, Response, App, Validator;
use Codesleeve\Platform\Publish\Models\Menu;
use Codesleeve\Platform\Publish\Validators\MenuValidator;

class MenuController extends BaseController
{
	/**
	 * Create a new controller
	 */
	public function __construct(Menu $menus)
	{
		parent::__construct();

		$this->menus = $menus;
		$this->validator = new MenuValidator($this->namespaced("MenuController"));
	}

	/**
	 * View all of the menus.
	 *
	 * @return void
	 */
	public function index()
	{
		$menus = $this->menus
			->orderBy(Input::query('sort_by', 'id'), Input::query('sort_direction', 'ASC'))
			->paginate();

		$this->layout->nest('content', "platform-publish::menus.index", compact('menus'));
	}

	/**
	 * Show the form to create a new menu.
	 *
	 * @return void
	 */
	public function create()
	{
		$menu = $this->menus->fill(Input::old());

		$this->layout->nest('content', "platform-publish::menus.create", compact('menu'));
	}

	/**
	 * Create a new menu.
	 *
	 * @return Response
	 */
	public function store()
	{
		$menu = $this->menus->fill(Input::all());

		$this->validator->validate(Input::all(), $menu);

		$menu->save();

		Session::flash('success', 'Created menu succesfully');

		return Redirect::action($this->namespaced("MenuController@index"));
	}

	/**
	 * Show the menu resource
	 *
	 * @param  int $id
	 * @return void
	 */
	public function show($id)
	{
		return $this->edit($id);
	}

	/**
	 * Show the form to edit a specific menu.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id)
	{
		$menu = $this->menus->findOrFail($id);

		$this->layout->nest('content', "platform-publish::menus.edit", compact('menu'));
	}

	/**
	 * Edit a specific menu.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$menu = $this->menus->findOrFail($id);

		$menu->fill(Input::all());

		$this->validator->validate(Input::all(), $menu);

		$menu->save();

		Session::flash('success', 'Updated menu successfully');

		return Redirect::action($this->namespaced("MenuController@index"));
	}

	/**
	 * Delete a specific menu record.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$menu = $this->menus->findOrFail($id);

		$menu->delete();

		Session::flash('success', 'Record deletion successful!');

		return Redirect::action($this->namespaced("MenuController@index"));
	}
}