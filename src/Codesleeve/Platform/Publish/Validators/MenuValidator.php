<?php namespace Codesleeve\Platform\Publish\Validators;

use Codesleeve\Platform\Validators\BaseValidator;

class MenuValidator extends BaseValidator
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
        ];

        $create = [
            'title' => 'required|max:256',
        ];

        return $type == 'update' ? $update : $create;
    }
}