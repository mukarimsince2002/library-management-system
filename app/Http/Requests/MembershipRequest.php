<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust this as per your authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'membership_type_id' => 'required|exists:membership_types,id',
        ];
    }
}
