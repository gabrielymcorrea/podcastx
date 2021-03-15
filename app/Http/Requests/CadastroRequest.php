<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CadastroRequest extends FormRequest
{
    public function rules()
    {
        $regras =  [
            'email' => 'required|email|unique:usuarios',
            'name' => 'required|unique:usuarios',
            'password' => 'required'
        ];

        if ($this->method() === "POST") {
            $regras['email'] = [
                'required',
                Rule::unique('usuarios')->ignore($this->request->get('email'), 'email')
            ];
            
        } 
         // update
        else {
            $regras['email'] = [
                'required',
                Rule::unique('usuarios')
            ];
        }
       
        return $regras;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome usuario obrigatorio',
            'name.unique' => 'Usuario já cadastrado',
            'email.unique' => 'Email já cadastrado',
            'email.required' => 'Email obrigatorio',
            'password.required' => 'Senha obrigatorio'
        ];
    }
}
