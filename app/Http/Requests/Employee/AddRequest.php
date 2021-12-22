<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first-name' => ['required'],
            'middle-name' => ['nullable'],
            'last-name' => ['nullable'],
            'username' => ['bail', 'required', 'unique:employee,employee_username'],
            'password' => [],
            'email' => ['bail', 'required', 'email:rfc,dns']
        ];
    }
}
