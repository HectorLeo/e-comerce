<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
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
            'nombre' => 'required|max:50',
            'paterno' => 'required|max:50',
            'materno' => 'required|max:50',
            'email' => 'required|max:100|unique:usuarios,email,' . $this->route('id_usuario'),
            'telefono' => 'required|max:50',
            'password' => 'required|min:5',
            're_password' => 'required|same:password'
        ];
    }
}
