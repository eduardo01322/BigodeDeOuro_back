<?php

use App\Http\Middleware\IsAuthenticated;
use App\Http\Middleware\SetSanctumGuard;
use App\Http\Middleware\VerifyAdminGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\TipoDePagamentoController;

use App\Http\Controllers\AdiministradorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ProfissionalController;


//Clientes
route::post('clientes', [clientecontroller::class, 'clientes']);
route::get('clientes/nome', [clientecontroller::class, 'pesquisarPorNome']);
route::get('clientes/cpf', [clientecontroller::class, 'pesquisarPorCpf']);
route::get('clientes/celular', [clientecontroller::class, 'pesquisarPorCelular']);
route::get('clientes/email', [clientecontroller::class, 'pesquisarPorEmail']);
route::get('clientes/find/{id}', [clientecontroller::class, 'pesquisarPorId']);
route::delete('clientes/delete/{id}', [clientecontroller::class, 'excluir']);
route::put('clientes/update', [clientecontroller::class, 'update']);
route::get('clientes/visualizar', [clientecontroller::class, 'retornarTodos']);
Route::post('clientes/senha',[clientecontroller::class, 'redefinirSenha']);


//Adm
route::post('Adm', [AdiministradorController::class, 'adms']);
route::get('Adm/cpf', [AdiministradorController::class, 'pesquisarPorCpf']);
route::get('Adm/nome', [AdiministradorController::class, 'pesquisarPorNome']);
route::get('Adm/email', [AdiministradorController::class, 'pesquisarPorEmail']);
route::get('Adm/find/{id}', [AdiministradorController::class, 'pesquisarPorId']);
route::delete('Adm/delete/{id}', [AdiministradorController::class, 'excluir']);
route::put('Adm/update', [AdiministradorController::class, 'update']);
route::get('Adm/visualizar', [AdiministradorController::class, 'retornarTodos']);
Route::post('Adm/senha',[AdiministradorController::class, 'redefinirSenha']);
Route::post('Adm/login', [AdiministradorController::class, 'login']);
Route::get('Adm/teste', [AdiministradorController::class, 'verificaUsuarioLogado'])
->middleware(['auth:sanctum', SetSanctumGuard::class, IsAuthenticated::class]);


//Adm Profissional
route::post('Adm/profissional', [Profissionalcontroller::class, 'cadastroProfissional']);
route::get('Adm/profissional/nome', [Profissionalcontroller::class, 'pesquisarPorNome']);
route::get('Adm/profissional/cpf', [Profissionalcontroller::class, 'pesquisarPorCpf']);
route::get('Adm/profissional/celular', [Profissionalcontroller::class, 'pesquisarPorCelular']);
route::get('Adm/profissional/email', [Profissionalcontroller::class, 'pesquisarPorEmail']);
route::get('Adm/profissional/find/{id}', [Profissionalcontroller::class, 'pesquisarPorId']);
route::delete('Adm/profissional/delete/{id}', [Profissionalcontroller::class, 'excluir']);
route::put('Adm/profissional/update', [Profissionalcontroller::class, 'update']);
route::get('Adm/profissional/visualizar', [Profissionalcontroller::class, 'retornarTodos']);
Route::post('Adm/profissional/senha',[Profissionalcontroller::class, 'redefinirSenha']);


//Adm clientes
route::post('Adm/clientes', [clientecontroller::class, 'clientes']);
route::get('Adm/clientes/nome', [clientecontroller::class, 'pesquisarPorNome']);
route::get('Adm/clientes/cpf', [clientecontroller::class, 'pesquisarPorCpf']);
route::get('Adm/clientes/celular', [clientecontroller::class, 'pesquisarPorCelular']);
route::get('Adm/clientes/email', [clientecontroller::class, 'pesquisarPorEmail']);
route::get('Adm/clientes/find/{id}', [clientecontroller::class, 'pesquisarPorId']);
route::delete('Adm/clientes/delete/{id}', [clientecontroller::class, 'excluir']);
route::put('Adm/clientes/update', [clientecontroller::class, 'update']);
route::get('Adm/clientes/visualizar', [clientecontroller::class, 'retornarTodos']);
Route::post('Adm/clientes/senha',[clientecontroller::class, 'redefinirSenha']);


//Adm Serviços
route::post('Adm/servicos', [ServicoController::class, 'servicos']);
route::get('Adm/servicos/descricao', [ServicoController::class, 'pesquisarPorDescricao']);
route::get('Adm/servicos/nome', [ServicoController::class, 'pesquisarPorNome']);
route::get('Adm/servicos/find/{id}', [ServicoController::class, 'pesquisarPorId']);
route::delete('Adm/servicos/delete/{id}', [ServicoController::class, 'excluir']);
route::put('Adm/servicos/update', [ServicoController::class, 'update']);
route::get('Adm/servicos/visualizar', [ServicoController::class, 'retornarTodos']);


//ADM:CADASTROD DE agendamento
Route::post('Adm/agenda', [AgendaController::class, 'cadastroAgenda']);
Route::delete('Adm/agenda/delete/{id}', [AgendaController::class, 'excluir']);
Route::get('Adm/agenda/visualizar', [AgendaController::class, 'visualizarAgenda']);
Route::post('Adm/agenda/data/', [AgendaController::class, 'buscarPorData']);
Route::post('Adm/agenda/Profissional{profissional_id}', [AgendaController::class, 'buscarPorIdProfissional']);
route::get('Adm/agenda/find/{id}', [AgendaController::class, 'pesquisarPorId']);
route::put('Adm/agenda/update', [AgendaController::class, 'update']);


//ADM:Tipo de pagamento:
route::post('Adm/pagamento', [TipoDePagamentoController::class, 'pagamentos']);
route::get('Adm/pagamento/nome', [TipoDePagamentoController::class, 'pesquisarPorTipoPagamento']);
route::get('Adm/pagamento/find/{id}', [TipoDePagamentoController::class, 'pesquisarPorId']);
route::delete('Adm/pagamento/delete/{id}', [TipoDePagamentoController::class, 'excluir']);
route::put('Adm/pagamento/update', [TipoDePagamentoController::class, 'update']);
route::get('Adm/pagamento/visualizar', [TipoDePagamentoController::class, 'retornarTodos']);
route::get('Adm/pagamento/habilitados', [TipoDePagamentoController::class, 'retornarTodosHabilitados']);
route::get('Adm/pagamento/desabilitados', [TipoDePagamentoController::class, 'retornarTodosDesabilitados']);


//Profissional
route::post('profissional', [Profissionalcontroller::class, 'profissionais']);
route::get('profissional/nome', [Profissionalcontroller::class, 'pesquisarPorNome']);
route::get('profissional/cpf', [Profissionalcontroller::class, 'pesquisarPorCpf']);
route::get('profissional/celular', [Profissionalcontroller::class, 'pesquisarPorCelular']);
route::get('profissional/email', [Profissionalcontroller::class, 'pesquisarPorEmail']);
route::get('profissional/find/{id}', [Profissionalcontroller::class, 'pesquisarPorId']);
route::delete('profissional/delete/{id}', [Profissionalcontroller::class, 'excluir']);
route::put('profissional/update', [Profissionalcontroller::class, 'update']);
route::get('profissional/visualizar', [Profissionalcontroller::class, 'retornarTodos']);
Route::post('profissional/senha',[Profissionalcontroller::class, 'redefinirSenha']);


//profissional Clientes
route::post('profissional/clientes', [clientecontroller::class, 'clientes']);
route::get('profissional/clientes/nome', [clientecontroller::class, 'pesquisarPorNome']);
route::get('profissional/clientes/cpf', [clientecontroller::class, 'pesquisarPorCpf']);
route::get('profissional/clientes/celular', [clientecontroller::class, 'pesquisarPorCelular']);
route::get('profissional/clientes/email', [clientecontroller::class, 'pesquisarPorEmail']);
route::get('profissional/clientes/find/{id}', [clientecontroller::class, 'pesquisarPorId']);
route::delete('profissional/clientes/delete/{id}', [clientecontroller::class, 'excluir']);
route::put('profissional/clientes/update', [clientecontroller::class, 'update']);
route::get('profissional/clientes/visualizar', [clientecontroller::class, 'retornarTodos']);
Route::post('profissional/clientes/senha',[clientecontroller::class, 'redefinirSenha']);


//PROFISSIONAL: cadastro dE Horarios
Route::post('profissional/agenda', [AgendaController::class, 'cadastroAgenda']);
Route::delete('profissional/agenda/delete/{id}', [AgendaController::class, 'excluir']);
Route::get('profissional/agenda/visualizar', [AgendaController::class, 'visualizarAgenda']);
Route::post('profissional/agenda/data', [AgendaController::class, 'buscarPorData']);
Route::post('profissional/agenda/Profissional{profissional_id}', [AgendaController::class, 'buscarPorIdProfissional']);
route::get('profissional/agenda/find/{id}', [AgendaController::class, 'pesquisarPorId']);
route::put('profissional/agenda/update', [AgendaController::class, 'update']);



//Serviços
route::post('servicos', [ServicoController::class, 'servicos']);
route::get('servicos/descricao', [ServicoController::class, 'pesquisarPorDescricao']);
route::get('servicos/nome', [ServicoController::class, 'pesquisarPorNome']);
route::get('servicos/find/{id}', [ServicoController::class, 'pesquisarPorId']);
route::delete('servicos/delete/{id}', [ServicoController::class, 'excluir']);
route::put('servicos/update', [ServicoController::class, 'update']);
route::get('servicos/visualizar', [ServicoController::class, 'retornarTodos']);


//Tipo de pagamento:
route::post('pagamento', [TipoDePagamentoController::class, 'pagamentos']);
route::get('pagamento/nome', [TipoDePagamentoController::class, 'pesquisarPorTipoPagamento']);
route::get('pagamento/find/{id}', [TipoDePagamentoController::class, 'pesquisarPorId']);
route::delete('pagamento/delete/{id}', [TipoDePagamentoController::class, 'excluir']);
route::put('pagamento/update', [TipoDePagamentoController::class, 'update']);
route::get('pagamento/visualizar', [TipoDePagamentoController::class, 'retornarTodos']);


//CADASTRO DE Horarios
Route::post('agenda', [AgendaController::class, 'cadastroAgenda']);
Route::delete('agenda/delete/{id}', [AgendaController::class, 'excluir']);
Route::get('agenda/visualizar', [AgendaController::class, 'visualizarAgenda']);
Route::post('agenda/data', [AgendaController::class, 'buscarPorData']);
Route::post('agenda/Profissional{profissional_id}', [AgendaController::class, 'buscarPorIdProfissional']);
route::get('agenda/find/{id}', [AgendaController::class, 'pesquisarPorId']);
route::put('agenda/update', [AgendaController::class, 'update']);