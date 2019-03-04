<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PersonStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo_envio' => 'required|string|email|max:255|unique:persons,shipping_email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ];

        if (Auth::check() && Auth::user()->isAdmin()) {
            $rules = array_merge($rules,['rol' => 'required|exists:roles,id']);
        }
        return $rules;
    }
}
