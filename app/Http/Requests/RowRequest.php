<?php

namespace App\Http\Requests;


use Modules\Row\Models\Row;

class RowRequest extends Request
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
            Row::DOCUMENT_ID => 'integer|required|min:0',
            Row::PRODUCT_ID => 'integer|required|min:0',
            Row::COUNT => 'integer|required|min:0',
            Row::PRICE => 'numeric|required|min:0',
        ];
    }
}