<?php namespace Codesleeve\Platform\Publish\Models;

use Eloquent;
use Codesleeve\Stapler\Stapler;

class Photo extends Eloquent
{
	/**
	 * Stapler trait
	 */
	use Stapler;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'platform_photos';

	/**
	 * A photo has an attachment called photo.
	 *
	 * @param array $attributes [description]
	 */
	public function __construct($attributes = array())
	{
		$this->hasAttachedFile('photo', [
			'styles' => [
				'thumb' => '100x100#'
			],
			'url' => '/system/platform/:attachment/:id_partition/:style/:filename'
		]);

		parent::__construct($attributes);
	}
}

