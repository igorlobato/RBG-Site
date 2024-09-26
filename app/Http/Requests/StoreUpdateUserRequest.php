<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //Usuário cadastrado pode cadastrar?
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nome' => 'required|min:3|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users' //email é unico na tabela users
            ],
            'senha' => [
                'required',
                'min:4',
                'max:20',
            ]
        ];

        if ($this->method() === 'PATCH'){
            $rules['email'] = [
                'required',
                'email',
                'max:255',
                //"unique:users,email,{$this->id},id" //unico na coluna usuarios, email verifica se o email é do id dele mesmo, na coluna id
                Rule::unique('users')->ignore($this->id), //alternativa para a linha de cima. O e-mail é unico a menos que seja do mesmo id.
            ];
            $rules['senha'] = [
                'nullable',
                'min:4',
                'max:20',
            ];
        }

        return $rules;
    }
}
