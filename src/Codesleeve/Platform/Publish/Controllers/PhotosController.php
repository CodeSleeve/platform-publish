<?php namespace Codesleeve\Platform\Publish\Controllers;

use View, Input, Auth, Session, Redirect, Response, App, Validator;

use Codesleeve\Platform\Publish\Models\Photo;
use Codesleeve\Platform\Publish\Validators\PhotoValidator;

class PhotosController extends BaseController
{
	/**
	 * Create a new controller
	 */
	public function __construct(Photo $photos)
	{
		parent::__construct();

		$this->photos = $photos;
		//$this->validator = new PhotoValidator($this->namespaced("PhotoController"));
	}

	/**
	 * View all of the Photos.
	 *
	 * @return void
	 */
	public function index()
	{
		// $photos = $this->photos
		// 	->orderBy(Input::query('sort_by', 'id'), Input::query('sort_direction', 'ASC'))
		// 	->paginate();

		// $this->layout->nest('content', "platform-publish::Photos.index", compact('Photos'));
	}

	/**
	 * Show the form to create a new Photo.
	 *
	 * @return void
	 */
	public function create()
	{
		// $photo = $this->photos->fill(Input::old());
		// $this->layout->nest('content', "platform-publish::Photos.create", compact('Photo'));
	}

	/**
	 * Create a new Photo.
	 *
	 * @return Response
	 */
	public function store()
	{
		$photo = $this->photos;

		$photo->photo = Input::file('photo');

		$photo->save();

		$photo->url = $photo->photo->url();

		return $photo;
	}

	/**
	 * Show the Photo resource
	 *
	 * @param  int $id
	 * @return void
	 */
	public function show($id)
	{
		// return $this->edit($id);
	}

	/**
	 * Show the form to edit a specific Photo.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id)
	{
		// $photo = $this->photos->findOrFail($id);

		// $this->layout->nest('content', "platform-publish::Photos.edit", compact('Photo'));
	}

	/**
	 * Edit a specific Photo.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		// $photo = $this->photos->findOrFail($id);

		// $photo->fill(Input::all());

		// $this->validator->validate(Input::all(), $photo);

		// $photo->save();

		// Session::flash('success', 'Updated Photo successfully');

		// return Redirect::action($this->namespaced("PhotoController@index"));
	}

	/**
	 * Delete a specific Photo record.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// $photo = $this->photos->findOrFail($id);

		// $photo->delete();

		// Session::flash('success', 'Record deletion successful!');

		// return Redirect::action($this->namespaced("PhotoController@index"));
	}
}