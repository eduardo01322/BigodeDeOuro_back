<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequestUpdate extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'max:80|min:5,',
            'preco' => 'decimal:2',
            'duracao' => 'numeric',
            'descricao' => 'max:200|min:5',
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
            'nome.max' => 'O campo nome deve conter no maximo 80 caracteres',
            'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',
            'preco.required' => 'Preço obrigatorio',

            'duracao.required' => 'Duracao obrigatorio',
            'duracao.required' => 'Duracao é só pode conter número',

            'descricao.required' => 'Descrição obrigatorio',
            'descricao.max' => 'Descricao deve conter no maximo 200 caracteres',
            'descricao.min' => 'Descricao deve conter no manimo 10 caracteres'

        ];
    }
}
