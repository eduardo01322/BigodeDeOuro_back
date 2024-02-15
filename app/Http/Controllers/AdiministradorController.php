<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdiministradorFormRequest;
use App\Http\Requests\AdiministradorFormRequestUpdate;
use Illuminate\Http\Request;
use App\Models\Adiministrador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdiministradorController extends Controller
{
    public function adms(AdiministradorFormRequest $request)
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
public function pesquisarPorNome(Request $request)
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
public function PesquisarPorEmail(Request $request)
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
public function update(AdiministradorFormRequestUpdate $request)
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
public function retornarTodos()
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
public function pesquisarPorId($id)
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

public function redefinirSenha(Request $request){
    $profissional = Adiministrador::where('email', $request->email)->first();
    if (!isset($profissional)){
        return response()->json([
            'status' => false,
            'message' => "Adiministrador não encontrado"
        ]);
    }
    $novaSenha = $request->novaSenha;
    $profissional->password = $novaSenha;
    $profissional->update();    
    return response()->json([
        'status' => true,
        'message' => "Sua senha foi atualizada"
    ]);
}

public function store(AdiministradorFormRequest $request)
    {
        try {
            $data = $request->all();

            $data['password'] = Hash::make($request->password);

            $response = Adiministrador::create($data)->createToken($request->server('HTTP_USER_AGENT'))->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Admin cadastrado com sucesso',
                'token' => $response
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            if (Auth::guard('admins')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                $user = Auth::guard('admins')->user();

                /** @var UserContract $user */

                $token = $user->createToken($request->server('HTTP_USER_AGENT', ['admins']))->plainTextToken;
                return response()->json([
                    'status' => true,
                    'message' => 'Login efetuado com sucesso',
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Credenciais incorretas'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function verificaUsuarioLogado(Request $request)
    {
        return 'Logado';
    }
    
}
