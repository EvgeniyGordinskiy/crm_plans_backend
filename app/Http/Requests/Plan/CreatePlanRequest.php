<?php

namespace App\Http\Requests\Plan;

use App\Http\Requests\BaseRequest;

class CreatePlanRequest extends BaseRequest
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


    protected function prepareForValidation()
    {
        $this->replace([
            'plan_name' => $this->sanitizeString('plan_name'),
            'plan_description' => $this->sanitizeString('plan_description'),
            'id' => $this->input('id'),
            'plan_difficulty' => $this->input('plan_difficulty'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'nullable|exists:plans,id',
            'plan_name' => 'required|string|max:190',
            'plan_description' => 'required|string|max:190',
            'plan_difficulty' => 'required|in:1,2,3'
        ];
    }
}
