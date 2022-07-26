<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Rule::unique('users')->ignore($user->id)
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'cin' => 'required',
            'date_of_birth' => 'required|before:today'
        ];
    }
}
