<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Http\Requests\ServicoFormRequestUpdate;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    //CADASTRO DE SERVICO 
    public function servicos(ServicoFormRequest $request)
    {
        $servico = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,
        ]);
        return response()->json([
            "success" => true,
            "message" =>  "Serviço cadastrado com sucesso",
            "data" => $servico
        ], 200);
    }
    //PESQUISA POR NOME
    public function pesquisarPorNome(Request $request)
    {
        $servico = Servico::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($servico)) {
            return response()->json([
                'status' => true,
                'data' => $servico

            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Nome não encontrada"
        ]);
    }
    //PESQUISA POR DESCRICAO
    public function pesquisarPorDescricao(Request $request)
    {
        $servico = Servico::where('descricao', 'like', '%' . $request->descricao . '%')->get();
        if (count($servico) > 0) {
            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Descricao não encontrado"
        ]);
    }
    //PESQUISA POR id
    public function pesquisarPorId($id)
    {
        $servico = Servico::find($id);
        if ($servico == null) {
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $servico
        ]);
    }
    //ATUALIZAÇÃO DE FICHA 
    public function update(ServicoFormRequestUpdate $request)
    {
        $servico = Servico::find($request->id);
        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => 'Serviço não encontrado'
            ]);
        }
        if (isset($request->nome)) {
            $servico->nome = $request->nome;
        }
        if (isset($request->descricao)) {
            $servico->descricao = $request->descricao;
        }
        if (isset($request->duracao)) {
            $servico->duracao = $request->duracao;
        }
        if (isset($request->preco)) {
            $servico->preco = $request->preco;
        }
        $servico->update();
        return response()->json([
            'status' => true,
            'message' => 'Serviço atualizado'
        ]);
    }
    //FUNÇÃO DE EXCLUIR
    public function excluir($servico)
    {
        $servico = Servico::find($servico);

        if (!isset($servico)) {
            return response()->josn([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }
        $servico->delete();

        return response()->json(([
            'status' => true,
            'message' =>  "Serviço excluido com sucesso"
        ]));
    }
    public function retornarTodos()
    {
        $servico =  Servico::all();
        if (!isset($servico)) {
            return response()->json([
                'status' => false,
                'message' => 'não há registros no sistema'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $servico
        ]);
    }
    public function pesquisarPorIdServico($id)
    {
        $servico =  Servico::find($id);
        if ($servico == null) {
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $servico
        ]);
    }
}
