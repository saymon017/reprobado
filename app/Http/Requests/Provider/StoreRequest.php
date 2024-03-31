<?php

namespace App\Http\Requests\Provider;

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
            'name'=>'required|string|max:250',
            'email'=>'required|email|string|max:200|unique:providers',
            'ruc_number'=>'required|string|max:10|min:10 |unique:providers',
            'address'=>'nulleble|string|max:250',
            'phone'=>'required|string|max:10|min:10|unique:providers',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permiten 250 caracteres.',

            'email.required'=>'Este campo es requerido.',
            'email.email'=>'Ingrese un correo valiso.',
            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo se permiten 255 caracteres.',
            'email.unique'=>'Ya se encuentra registrado o el correo esta en uso.',

            'ruc_number.required'=>'Este campo es requerido.',
            'ruc_number.string'=>'El valor no es correcto.',
            'ruc_number.max'=>'Solo se permiten 10 caracteres',
            'ruc_number.min'=>'Solo se permiten 10 caracteres.',
            'ruc_number.unique'=>'Ya se encuentra registrado.',

            'address.max'=>'Solo se permiten 255 caracteres.',
            'address.string'=>'El valor no es correcto.',

            'phone.required'=>'Este campo es requerido.',
            'phone.string'=>'El valor no es correcto.',
            'phone.max'=>'Solo se permiten 10 caracteres',
            'phone.min'=>'Solo se permiten 10 caracteres.',
            'phone.unique'=>'El numero ya se encuentra registrado.',


        ];
    }
}
