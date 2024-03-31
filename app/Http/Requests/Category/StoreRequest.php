<?php

namespace App\Http\Requests\Category;

use Faker\Guesser\Name;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|string|max:50',
            'description'=>'required|string|max:250',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permiten 50 caracteres.',
            'description.required'=>'Este campo es requerido.',
            'description.string'=>'El valor no es correcto.',
            'description.max'=>'Solo se permiten 255 caracteres.',
        ];
    }
}
