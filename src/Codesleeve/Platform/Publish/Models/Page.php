<?php namespace Codesleeve\Platform\Publish\Models;

use DirectoryIterator, Eloquent;

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
	protected $fillable = ['slug', 'content', 'title', 'layout'];

	/**
	 * Returns all possible page layouts we could assign to a page. This is useful
	 * if we want to override the layout for a very specific page.
	 *
	 * @return string
	 */
	public function getLayoutsAttribute()
	{
		$available = array('none' => 'None');

		$directory = base_path() . '/app/views/pages';

		$pages = file_exists($directory) ? new DirectoryIterator($directory) : [];

		foreach ($pages as $page)
		{
			if ($page->getExtension() == 'php')
			{
				$name = 'pages.' . $page->getBaseName('.php');
				$available[$name] = $name;
			}
		}

		return $available;
	}

	/**
	 * Return a page by it's alias
	 *
	 * @param  string $slug
	 * @return Page
	 */
	public function findBySlug($id)
	{
		$page = $this->where('slug', $id)->first();

		if (!$page)
		{
			$page = $this->findOrFail($id);
		}

		return $page;
	}
}

