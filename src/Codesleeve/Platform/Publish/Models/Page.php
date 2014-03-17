<?php namespace Codesleeve\Platform\Publish\Models;

use Eloquent;

class Page extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'platform_pages';

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['slug', 'content', 'title', 'home_page'];

}

