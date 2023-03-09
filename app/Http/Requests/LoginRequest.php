<?php

namespace App\Http\Requests;

use App\Rules\LoginRule;
use App\Rules\PasswordRule;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "username" => ["required", new LoginRule()],
            //pass must be needed and alos min8 chars 
            "password" => ["required", "min:8", "max:12", new PasswordRule()],

            "email" => "required|email"
        ];
    }
}
