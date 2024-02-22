<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Http\Requests\ProfissionalFormRequestUpdate;
use App\Models\Agenda;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    //CADASTRO DE PROFISSIONAL
    public function cadastroProfissional(ProfissionalFormRequest $request)
    {
        $profissional = Profissional::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'password' => Hash::make($request->password),
            'salario' => $request->salario
        ]);
        return response()->json([
            "success" => true,
            "message" => "Profissional cadastrado com sucesso",
            "data" => $profissional
        ], 200);
    }
    //PESQUISA POR NOME
    public function pesquisarPorNome(Request $request)
    {
        $profissional = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($profissional)) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Profissional não encontrado"
        ]);
    }
    //PESQUISA POR CPF
    public function pesquisarPorCpf(Request $request)
    {
        $profissional = Profissional::where('cpf', 'like', '%' . $request->cpf . '%')->get();
        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Cpf não encontrado"
        ]);
    }
    //PESQUISA POR CELULAR
    public function PesquisarPorCelular(Request $request)
    {
        $profissional = Profissional::where('celular', 'like', '%' . $request->celular . '%')->get();
        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Celular não encontrado"
        ]);
    }
    //PESQUISA POR E-MAIL
    public function PesquisarPorEmail(Request $request)
    {
        $profissional = Profissional::where('email', 'like', '%' . $request->email . '%')->get();

        if (count($profissional) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "E-mail não encontrado"
        ]);
    }
    //ATUALIZAÇÃO DO PROFISSIONAL
    public function update(ProfissionalFormRequestUpdate $request)
    {
        $profissional = Profissional::find($request->id);
        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => 'Profissional não encontrado'
            ]);
        }
        if (isset($request->nome)) {
            $profissional->nome = $request->nome;
        }
        if (isset($request->email)) {
            $profissional->email = $request->email;
        }
        if (isset($request->cpf)) {
            $profissional->cpf = $request->cpf;
        }
        if (isset($request->senha)) {
            $profissional->senha = $request->senha;
        }
        if (isset($request->dataNascimento)) {
            $profissional->dataNascimento = $request->dataNascimento;
        }
        if (isset($request->cep)) {
            $profissional->cep = $request->cep;
        }
        if (isset($request->celular)) {
            $profissional->celular = $request->celular;
        }
        if (isset($request->numero)) {
            $profissional->numero = $request->numero;
        }
        if (isset($request->estado)) {
            $profissional->estado = $request->estado;
        }
        if (isset($request->cidade)) {
            $profissional->cidade = $request->cidade;
        }
        if (isset($request->complemento)) {
            $profissional->complemento = $request->complemento;
        }
        if (isset($request->bairro)) {
            $profissional->bairro = $request->bairro;
        }
        if (isset($request->rua)) {
            $profissional->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $profissional->numero = $request->numero;
        }
        if (isset($request->salario)) {
            $profissional->salario = $request->salario;
        }
        $profissional->update();
        return response()->json([
            'status' => true,
            'message' => 'Profissional ataulizado'
        ]);
    }
    //FUNÇÃO DE EXCLUIR
    public function  excluir($id)
    {
        $profissional = Profissional::find($id);
        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }
        $profissional_agendamento = Agenda::where('profissional_id', $id)->get();
        if (count($profissional_agendamento) > 0) {
            return response()->json([
                'status' => false,
                'message' => "Não foi possível excluir, pois o profissional possui agendamentos registrados."
            ]);
        }
        $profissional->delete();
        return response()->json([
            'status' => true,
            'message' => "Profissional excluído com sucesso"
        ]);
    }

    public function visualizarProfissional()
    {
        $profissional = Profissional::all();

        if (!isset($profissional)) {

            return response()->json([
                'status' => false,
                'message' => ' não há registros no sistema'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $profissional
        ]);
    }
    public function pesquisarPorIdProficional($id)
    {
        $profissional = Profissional::find($id);
        if ($profissional == null) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $profissional
        ]);
    }
    public function redefinirSenha(Request $request)
    {
        $profissional = Profissional::where('email', $request->email)->first();
        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }

        $profissional = Profissional::where('cpf', $request->cpf)->first();
        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }

        $novaSenha = $request->novaSenha; //  campo no formulário  chamado de "novaSenha"
        $profissional->password = Hash::make($novaSenha);
        $profissional->update();
        return response()->json([
            'status' => true,
            'message' => "Sua senha foi atualizada"
        ]);
    }
}
