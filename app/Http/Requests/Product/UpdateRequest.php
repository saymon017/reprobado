<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|unique:products, name,'.$this->route('product')->id. '|max:10',
            'image'=>'required|dimensions:min_width=100,min_height=200',
            'sell_price'=>'',
            'category_id'=>'integer|required|exists:App\Models\Category,id',
            'provider_id'=>'integer|required|exists:App\Models\Provider,id',
        ];
    }

    public function messages()
    {
        return [
            'name.string'=>'El valor no es correcto.',
            'name.required'=>'Este campo es requerido.',
            'name.unique'=>'El producto ya esta registrado.',
            'name.max'=>'Solo se permiten 255 caracteres.',

            'image.required'=>'Este campo es requerido.',
            'image.dimensions'=>'solo se permiten imagenes de 100x200 px.',

            'sell_price.required'=>'Este campo es requerido.',

            'category_id.integer'=>'El valor tiene que ser entero.',
            'category_id.required'=>'Este campo es requerido.',
            'category_id.exists'=>'La categoria no existe.',

            'provider_id.integer'=>'l valor tiene que ser entero.',
            'provider_id.required'=>'Este campo es requerido.',
            'provider_id.exists'=>'El proveeder no existe.',
        ];
    }
}
