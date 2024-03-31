<?php

namespace App\Http\Requests\Client;

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
            'name'=>'string|required|max:255',
            'dni'=>'string|required|unique:clients, dni,'.$this->route('client')->id. ' |max:10',
            'ruc'=>'string|required|unique:clients, ruc,'.$this->route('client')->id. '|max:10',
            'address'=>'string|required|max:255',
            'phone'=>'string|required|unique:clients, phone,'.$this->route('client')->id. '|max:10',
            'email'=>'string|required|unique:clients, email,'.$this->route('client')->id. '|max:255|email:rfc,dns',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permiten 255 caracteres.',

            'dni.string'=>'El valor no es correcto.',
            'dni.required'=>'Este campo es requerido.',
            'dni.uniqued'=>'Este DNI ya se encuentra registrado.',
            'dni.min'=>'Se requieren almenos 10 caracteres.',
            'dni.max'=>'Se requieren un maximo de 10 caracteres.',

            'ruc.string'=>'El valor no es correcto.',
            'ruc.uniqued'=>'Este RUC ya se encuentra registrado.',
            'ruc.min'=>'Se requieren almenos 10 caracteres.',
            'ruc.max'=>'Se requieren un maximo de 10 caracteres.',

            'address.string'=>'El valor no es correcto.',
            'address.max'=>'Solo se permiten 255 caracteres.',

            'phone.string'=>'El valor no es correcto.',
            'phone.uniqued'=>'Este número de celular ya se encuentra registrado.',
            'ruc.min'=>'Se requieren almenos 10 caracteres.',
            'ruc.max'=>'Se requieren un maximo de 10 caracteres.',

            'email.string'=>'El valor no es correcto.',
            'email.uniqued'=>'La dirección de correo electrónico ya se encuentra registrado.',
            'email.max'=>'Se requiere 250 caracteres.',
            'email.email'=>'No es un correo electronico valido.',
        ];
    }
}
