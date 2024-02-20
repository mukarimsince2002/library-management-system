<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust this as per your authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'profile_photo_path'=>'required|mimes:jpg,png,jpeg',
            // Add more validation rules as needed
        ];
    }
}
