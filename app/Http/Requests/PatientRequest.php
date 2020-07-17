<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:patients,email',
            'gender' => [
                'required',
                Rule::in(['male', 'female']),
            ],
            'birth_date' => 'required|date',
            'mobile' => 'required|numeric',
            'country' => 'required',
            'occupation' => 'required',
        ];
    }
}
