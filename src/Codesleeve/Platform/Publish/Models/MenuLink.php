<?php namespace Codesleeve\Platform\Publish\Models;

use Eloquent;

class MenuLink extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'platform_menu_links';

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['menu_id', 'page_id', 'title', 'url'];

	/**
	 * Validation rules for the model attributes.
	 *
	 * @var bool
	 */
	public $rules = ['title' => 'required'];

	/**
	 * A menu link belongs to a menu.
	 *
	 * @return belongsTo
	 */
	public function menu()
	{
		return $this->belongsTo('Codesleeve\Platform\Publish\Models\Menu');
	}
}