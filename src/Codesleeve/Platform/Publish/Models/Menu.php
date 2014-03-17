<?php namespace Codesleeve\Platform\Publish\Models;

use Eloquent;

class Menu extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'platform_menus';

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'url'];

	/*
     * A menu has many menu links.
     *
     * @return hasMany
     */
    public function menuLinks()
    {
        return $this->hasMany('Codesleeve\Platform\Publish\Models\MenuLink', 'menu_id');
    }
}