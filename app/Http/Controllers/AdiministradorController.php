<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdiministradorUserRequestUpdate;
use App\Http\Requests\AdiministradorUserRequest;
use App\Models\Adiministrador;
use Illuminate\Support\Facades\Hash;
class AdiministradorController extends Controller
{
    public function adms(AdiministradorUserRequest $request)
    {
        $Adiministrador = Adiministrador::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => Hash::make( $request->password)
        ]);
        return response()->json([
            "success" => true,
            "message" => "Adiministrador cadastrado com sucesso",
            "data" => $Adiministrador
        ], 200);
    }

//PESQUISA POR NOME
public function pesquisarPorAdiministrador(Request $request)
{
    $Adiministrador = Adiministrador::where('nome', 'like', '%' . $request->nome . '%')->get();
    if (count($Adiministrador)) {
        return response()->json([
            'status' => true,
            'data' => $Adiministrador
        ]);
    }
    return response()->json([
        'status' => false,
        'data' => "Adiministrador não encontrado"
    ]);
}
//PESQUISA POR CPF
public function pesquisarPorCpf(Request $request)
{
    $Adiministrador = Adiministrador::where('cpf', 'like', '%' . $request->cpf . '%')->get();
    if (count($Adiministrador) > 0) {
        return response()->json([
            'status' => true,
            'data' => $Adiministrador
        ]);
    }
    return response()->json([
        'status' => false,
        'data' => "Cpf não encontrado"
    ]);
}
//PESQUISA POR E-MAIL
public function PesquisarPorEmailAdiministrador(Request $request)
{
    $Adiministrador = Adiministrador::where('email', 'like', '%' . $request->email . '%')->get();
    if (count($Adiministrador) > 0) {
        return response()->json([
            'status' => true,
            'data' => $Adiministrador
        ]);
    }
    return response()->json([
        'status' => false,
        'data' => "E-mail não encontrado"
    ]);
}
//ATUALIZAÇÃO DE Adiministrador
public function updateAdiministrador(AdiministradorUserRequestUpdate $request)
{
$Adiministrador = Adiministrador::find($request->id);
if (!isset($Adiministrador)) {
    return response()->json([
        'status' => false,
        'message' => 'Adiministrador não encontrado'
    ]);
}
if (isset($request->nome)) {
    $Adiministrador->nome = $request->nome;
}
if (isset($request->email)) {
    $Adiministrador->email = $request->email;
}
if (isset($request->cpf)) {
    $Adiministrador->cpf = $request->cpf;
}
$Adiministrador->update();
return response()->json([
    'status' => true,
    'message' => 'Adiministrador atualizado'
]);
}
//FUNÇÃO DE EXCLUIR
public function excluir($Adiministrador)
{
 $Adiministrador = Adiministrador::find($Adiministrador);
 if (!isset($Adiministrador)) {
     return response()->json([
         'status' => false,
         'message' => "Adiministrador não encontrado"
     ]);
 }
 $Adiministrador->delete();
 return response()->json(([
     'status' => true,
     'message' =>  "Adiministrador excluido com sucesso"
 ]));
}
public function visualizarCadastroAdiministrador()
{
 $Adiministrador = Adiministrador::all();
 if (!isset($Adiministrador)) {
     return response()->json([
         'status' => false,
         'message' => 'não há registros no sistema'
     ]);
 }
 return response()->json([
     'status' => true,
     'data' => $Adiministrador
 ]);
}
public function pesquisarPorIdAdiministrador($id)
{
$Adiministrador = Adiministrador::find($id);
 if ($Adiministrador == null) {
     return response()->json([
         'status' => false,
         'message' => "Adiministrador não encontrado"
     ]);
 }
 return response()->json([

     'status' => true,
     'data' => $Adiministrador
 ]);
}
public function redefinirSenhaAdiministrador(Request $request){
$Adiministrador = Adiministrador::where('email', $request->email)->first();
if (!isset($Adiministrador)){
    return response()->json([
        'status' => false,
        'message' => "Adiministrador não encontrado"
    ]);
}
$Adiministrador->password = Hash::make($Adiministrador->cpf);
$Adiministrador->update();    
return response()->json([
    'status' => false,
    'message' => "Sua senha foi atualizada"
]);
}
public function redefinirSenha(Request $request){
    $profissional = Adiministrador::where('email', $request->email)->first();
    if (!isset($profissional)){
        return response()->json([
            'status' => false,
            'message' => "Adiministrador não encontrado"
        ]);
    }
    $novaSenha = $request->novaSenha; //  campo no formulário  chamado de "novaSenha"
    $profissional->password = $novaSenha;
    $profissional->update();    
    return response()->json([
        'status' => true,
        'message' => "Sua senha foi atualizada"
    ]);
}
}
