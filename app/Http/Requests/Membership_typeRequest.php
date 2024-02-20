<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Membership_typeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust this as per your authorization logic
    }

    public function rules()
    {
        return
           [
                'name' => 'required',
                'description' => 'required',
                'duration' => 'required',
                'fee' => 'required',
        ];
    }
}
