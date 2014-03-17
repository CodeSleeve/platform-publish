<?php namespace Codesleeve\Platform\Publish\Validators;

use Codesleeve\Platform\Validators\BaseValidator;

class PageValidator extends BaseValidator
{
	/**
	 * Return rules for a user
	 *
	 * @return array
	 */
    public function rules($input, $model, $type)
    {
        $update = [
            'title' => 'required|max:256',
            'slug'  => 'required|max:256',
            'content' => 'required',
        ];

        $create = [
            'title' => 'required|max:256',
            'slug'  => 'required|max:256',
            'content' => 'required',
        ];

        return $type == 'update' ? $update : $create;
    }
}