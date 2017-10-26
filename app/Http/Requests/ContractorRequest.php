<?php

namespace App\Http\Requests;


use Modules\Contractor\Models\Contractor;

class ContractorRequest extends Request
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
            Contractor::NAME => 'string|required',
            Contractor::TYPE => 'string|in:' .implode(',' , Contractor::$allowedTypes),
            Contractor::CITY_ID => 'integer|required|min:0',
            Contractor::ADDRESS => 'string|required',
            Contractor::PHONE => 'string|required',
            Contractor::CONTACT_PERSON => 'string|required',
            Contractor::INFO => 'string|required',
            Contractor::FETCH_SCHEDULE => 'integer|required',
        ];
    }
}