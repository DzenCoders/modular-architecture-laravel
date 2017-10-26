<?php

namespace App\Http\Requests;

use Modules\Storage\Models\Storage;

class StorageRequest extends Request
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
            Storage::ID => 'integer',
            Storage::PRODUCT_ID => 'required|integer',
            Storage::WAREHOUSE_ID => 'required|integer',
            Storage::COUNT => 'required|integer',
            Storage::SELF_COST => 'required|numeric',
        ];
    }
}