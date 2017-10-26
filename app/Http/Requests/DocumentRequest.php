<?php

namespace App\Http\Requests;

use Modules\Document\Models\Document;

class DocumentRequest extends Request
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
            Document::PARENT_ID => 'required|integer|min:0',
            Document::TYPE => 'required|in:' . implode(',', Document::$allowedTypes),
            Document::STATE => 'required|in:' . implode(',', Document::$allowedStates),
            Document::WAREHOUSE_ID => 'required|integer|min:0',
            Document::CONTRACTOR_ID => 'required|integer|min:0',
            Document::CHARGE => 'required|numeric|min:0',
            Document::MANAGER_ID => 'required|integer|min:0',
        ];
    }
}