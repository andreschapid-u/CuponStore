<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
        // dd($this);
        return [
            'nombre' => 'required|string|unique:companies,name',
            'nit' => 'required|unique:companies,nit|numeric',
            'person_id' => 'required|exists:persons,id',
            'logo' => 'required|image',
            "direccion" => "required|string",
            "telefono" => "required|numeric|min:8",
            "ciudad" => "required|integer|exists:cities,id"
        ];
    }
}

// 'logo' => 'required|image|dimensions:ratio=2/3',