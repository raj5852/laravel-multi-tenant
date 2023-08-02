<?php

namespace App\Http\Requests;

use App\Rules\UserCreateRule;
use App\Rules\ValidUsername;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'username' => ['required',new ValidUsername()],
            'email'=>['required','email', new UserCreateRule()],
            'password' => 'required|string|min:8|confirmed',
            'domain'=>'nullable'
        ];

    }


    public  function prepareForValidation()
    {
        $this->merge([
            'domain'=> $this->username . '.'. config('tenancy.central_domains')[1],
        ]);
    }
}
