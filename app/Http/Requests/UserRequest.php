<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $usuarioId = optional($this->route('usuario'))->id;

        return [
            'cedula' => 'required|min:7|max:10|regex:/^[0-9]+$/i|unique:usuarios,cedula,' . $usuarioId,
            'nombres' => 'required|min:3|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/i',
            'apellidos' => 'required|min:3|max:50|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/i',
            'correo' => 'required|email|max:50|unique:usuarios,correo,' . $usuarioId,
            'telefono' => 'required|min:7|max:10|regex:/^[0-9]+$/i'
        ];
    }
}
