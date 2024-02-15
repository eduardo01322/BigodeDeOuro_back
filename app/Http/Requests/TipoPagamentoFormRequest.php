<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class TipoPagamentoFormRequest extends FormRequest
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
                        'nome' => 'required|unique:tipo_pagamentos,nome|max:120|min:2',
                        'taxa' => 'required|max:120|min:3',
                        'status' => 'required|max:120|min:3',
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
                        'nome.min' => 'O campo nome deve conter no minimo 2 caracteres',
                        'nome.unique' => 'nome já foi cadastrado, informe outro.',
                        'status.required' => 'O compo status é obrigatorio.',
                        'taxa.required' => 'O campo taxa  é obrigatorio',
                        'taxa.max' => 'O campo  taxa  deve conter 120 caracteres',
                ];
        }
}
