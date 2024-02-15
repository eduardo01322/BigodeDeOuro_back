<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdiministradorFormRequestUpdate extends FormRequest
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
            'nome' => 'required|max:120|min:5',
            'email' => 'required|max:120||unique:adiministradors,email,'. $this->id,
            'cpf' => 'required|max:11|min:11|unique:adiministradors,cpf,'. $this->id,
        ];
    }

    public function failedValidation(Validator $validator)
        {
                throw new HttpResponseException(response()->json([
                        'success' => false,
                        'error' => $validator->errors()
                ]));
        }
        public function messages()
        {
                return [
                        'nome.required' => 'O campo nome é obrigatorio',
                        'nome.max' => 'O campo nome deve conter  no maximo 120 caracteres',
                        'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',
                        'email.required' => 'O email celular é obrigatorio',
                        'email.unique' => 'Email já cadastrado informe outro email',
                        'email.max' => 'O email celular de conter 120 caracteres',
                        'cpf.required' => 'O campo cpf é obrigatorio',
                        'cpf.max' => 'O campo cpf deve ter no maximo 11 caracteres',
                        'cpf.min' => 'O campo cpf deve ter no mainimo 11 caracteres',
                        'cpf.unique' => 'Cpf já cadastrado, informe outro cpf',
                ];
        }
}
