<?php

/*
|--------------------------------------------------------------------------
| Default routes for Platform
|--------------------------------------------------------------------------
|
| Out of the box platform handles user authentication, password recovery and
| role management. These are typical in most applications. so they are part
| of the base setup. They are meant to be tweaked to your liking as most
| applications have different attributes for users.
|
*/
Route::group(Config::get('platform::routing'), function()
{
	Route::group(['before' => 'platform.auth'], function()
	{
		$namespace = "Codesleeve\Platform\Publish\Controllers";

		// pages
		Route::resource('pages', "{$namespace}\PageController");

		// menus
		Route::resource('menus', "{$namespace}\MenuController");

		// photos
		Route::post('pages/{id}/photo', ['uses' => "{$namespace}\PhotosController@store", 'as' => 'pages.edit.photos']);
		Route::post('pages/photo', ['uses' => "{$namespace}\PhotosController@store", 'as' => 'pages.create.photos']);
	});
});