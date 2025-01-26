<?php

namespace App\Http\Requests;

use App\Traits\ResponderTrait;
use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\ResponseTrait;

class loginRequests extends FormRequest
{
    use ResponderTrait;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8',
        ];
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) {
        throw new HttpResponseException($this->validation($validator->errors()));
    }
}
