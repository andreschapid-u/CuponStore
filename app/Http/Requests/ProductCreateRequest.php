<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
        return [
            'nombre' => 'required|string|unique:products,name',
            'descripcion' => 'string',
            'marca' => 'required|exists:brands,id',
            'categoria' => 'required|exists:categories,id',
            'imagen' => 'required|image|max:2048|dimensions:ratio=1/1',
        ];
    }
}
