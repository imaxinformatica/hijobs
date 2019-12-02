<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:candidates',
            'password' => 'required|min:6|confirmed',
            // 'cpf' => 'required|unique:candidates',
            // 'state' => 'required',
            // 'marital_status' => 'required',
            // 'birthdate' => 'required',
            // 'sex' => 'required',
            // 'travel' => 'required',
            // 'change' => 'required',
            // 'journey_id' => 'required',
            // 'contract_type_id' => 'required',
            // 'min_hierarchy_id' => 'required',
            // 'max_hierarchy_id' => 'required',
            // 'salary' => 'required',
        ];
    }
}
