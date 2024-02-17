<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatogaryRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust this as per your authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add more validation rules as needed
        ];
    }
}
