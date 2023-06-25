<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'user_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:5|max:10',
            'address' => 'required|string',
            'role' => 'required|string',
            'zone' => 'required|string',
            'status' => 'required|string',
        ];
    }
}
