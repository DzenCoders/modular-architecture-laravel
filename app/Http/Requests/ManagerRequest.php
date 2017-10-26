<?php

namespace App\Http\Requests;


use Modules\Manager\Models\Manager;
use Modules\Row\Models\Row;

class ManagerRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            Manager::NAME => 'string|required',
            Manager::LAST_NAME => 'string|required',
            Manager::PHONE => 'string|required',
        ];
    }
}