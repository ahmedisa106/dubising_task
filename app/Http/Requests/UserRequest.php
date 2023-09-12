<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'bio' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date_format:Y/m/d']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw  new HttpResponseException(final_response('error', 'an error has been occurred', $validator->errors()->first(), 402), 402);
    }
}
