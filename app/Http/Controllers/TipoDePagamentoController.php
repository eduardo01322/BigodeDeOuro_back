<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoPagamentoFormRequest;
use App\Models\TipoPagamento;


use App\Http\Requests\TipoPagamentoFormRequestUpdate;

use Illuminate\Http\Request;

class TipoDePagamentoController extends Controller
{

    public function pagamentos(TipoPagamentoFormRequest $request)
    {
        $pagamento = TipoPagamento::create([
            'nome' => $request->nome,
            'taxa' => $request->taxa,
            'status' => $request->status
        ]);
        return response()->json([
            "success" => true,
            "message" => "Tipo de pagamento cadastrado com sucesso",
            "data" => $pagamento
        ], 200);
    }
    //PESQUISA POR NOME
    public function pesquisarPorTipoPagamento(Request $request)
    {
        $pagamento = TipoPagamento::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($pagamento)) {
            return response()->json([
                'status' => true,
                'data' => $pagamento
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Tipo de pagamento não encontrado"
        ]);
    }

    public function pesquisarPorId($id){
        $pagamento = TipoPagamento::find($id);
        if($pagamento == null){
            return response()->json([
                'status'=> false,
                'message' => "Não encontrado"
            ]);     
        }
        return response()->json([
            'status'=> true,
            'data'=> $pagamento
        ]);
    }

    //FUNÇÃO DE EXCLUIR
    public function excluir($pagamento)
    {
        $pagamento = TipoPagamento::find($pagamento);
        if (!isset($pagamento)) {
            return response()->json([
                'status' => false,
                'message' => "Tipo de pagamento não encontrado"
            ]);
        }
        $pagamento->delete();
        return response()->json(([
            'status' => true,
            'message' =>  "Tipo de pagamento excluido com sucesso"
        ]));
    }
    //ATUALIZAÇÃO DE pagamento
    public function update(TipoPagamentoFormRequestUpdate $request)
{
    $pagamento = TipoPagamento::find($request->id);
    if (!$pagamento) {
        return response()->json([
            'status' => false,
            'message' => 'Tipo de pagamento não encontrado'
        ]);
    }

    // Verifica se o novo nome está em uso por outro registro ou pelo mesmo ID
    if (isset($request->nome) && $request->nome !== $pagamento->nome) {
        $existingPayment = TipoPagamento::where('nome', $request->nome)
            ->where(function ($query) use ($request) {
                $query->where('id', '!=', $request->id)
                    ->orWhereNull('id');
            })->first();

        if ($existingPayment) {
            if ($existingPayment->id) {
                return response()->json([
                    'status' => false,
                    'message' => 'O nome especificado já está em uso por outro tipo de pagamento'
                ]);
            } else {
                // Lidar com o caso em que o registro existente tem um ID nulo
            }
        }
        $pagamento->nome = $request->nome;
    }

    // Atualiza os outros campos
    if (isset($request->taxa)) {
        $pagamento->taxa = $request->taxa;
    }
    if (isset($request->status)) {
        $pagamento->status = $request->status;
    }

    // Salva a atualização no banco de dados
    $pagamento->update();

    return response()->json([
        'status' => true,
        'message' => 'Tipo de pagamento atualizado'
    ]);
}
    public function retornarTodos()
    {
        $pagamento = TipoPagamento::all();
        if (count($pagamento)<=0) {
            return response()->json([
                'status' => false,
                'message' => 'Não há registros no sitema'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $pagamento
        ]);
    }
    //Visualizar Cadastro Tipo Pagamentob Habilitado
    public function retornarTodosHabilitados()
    {
        $pagamento = TipoPagamento::where('status', 'habilitado')->get();
        if ($pagamento->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => $pagamento
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há registros no sitema'
        ]);
    }
    //Visualizar Tipo Pagamento Desabilitado
    public function retornarTodosDesabilitados()
    {
        $pagamento = TipoPagamento::where('status', 'desabilitado')->get();
        if ($pagamento->count() > 0) {
            return response()->json([
                'status' => true,
                'data' => $pagamento
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há registros no sitema'
        ]);
    }
}
