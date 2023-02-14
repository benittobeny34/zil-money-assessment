<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'willing_to_work' => ['required', 'string'],
            'languages_known' => ['required', 'array'],
            'languages_known.*' => ['required', 'string'],
        ];
    }

    public function languagesKnown()
    {
        return $this->languages_known ?? [];
    }
}
