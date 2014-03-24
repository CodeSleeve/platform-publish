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

	}

	/**
	 * Show the form to create a new Photo.
	 *
	 * @return void
	 */
	public function create()
	{

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

	}

	/**
	 * Show the form to edit a specific Photo.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id)
	{

	}

	/**
	 * Edit a specific Photo.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{

	}

	/**
	 * Delete a specific Photo record.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}
}