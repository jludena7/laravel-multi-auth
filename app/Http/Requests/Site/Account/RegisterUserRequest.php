<?php

namespace App\Http\Requests\Site\Account;

use App\Models\Site\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required|string|max:60',
            'email' => 'required|string|email|max:60|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
