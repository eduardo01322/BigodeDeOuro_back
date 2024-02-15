<?php

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

Route::post('adm/agenda/cadastroAgenda', [AgendaController::class, 'cadastroAgenda']);
Route::delete('adm/agenda/deleteAgenda/{id}', [AgendaController::class, 'excluir']);
Route::get('adm/agenda/visualizarAgenda', [AgendaController::class, 'visualizarAgenda']);
Route::post('adm/agenda/buscarPorData/', [AgendaController::class, 'buscarPorData']);
Route::post('adm/agenda/buscarPorIdProfissional{profissional_id}', [AgendaController::class, 'buscarPorIdProfissional']);
route::get('adm/agenda/find/agendamento/{id}', [AgendaController::class, 'pesquisarPorId']);
route::put('adm/agenda/update/agendamento', [AgendaController::class, 'update']);

//ADM:Tipo de pagamento:
Route::put('adm/tipo/pagamento/editar/tipo/pagamento', [TipoDePagamentoController::class,  'updatepagamento']);
Route::post('adm/tipo/pagamento/cadastro/pagamento', [TipoDePagamentoController::class, 'cadastroTipoPagamento']);
Route::post('adm/tipo/pagamento/pesquisar/nome/pagamento', [TipoDePagamentoController::class, 'pesquisarPorTipoPagamento']);
Route::post('adm/tipo/pagamento/excluir/pagamento', [TipoDePagamentoController::class, 'deletarpagamento']);
Route::delete('adm/tipo/pagamento/delete/pagamento/{id}', [TipoDePagamentoController::class, 'deletarpagamento']);
Route::get('adm/tipo/pagamento/visualizar/pagamento', [TipoDePagamentoController::class, 'visualizarCadastroTipoPagamento']);
Route::get('adm/tipo/pagamento/visualizar/pagamento/habilitado', [TipoDePagamentoController::class, 'visualizarCadastroTipoPagamentoHabilitado']);
Route::get('adm/tipo/pagamento/visualizar/pagamento/desabilitado', [TipoDePagamentoController::class, 'visualizarCadastroTipoPagamentoDesabilitado']);


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
Route::post('profissional/cadastroAgenda', [AgendaController::class, 'cadastroAgenda']);
Route::delete('profissional/deleteAgenda/{id}', [AgendaController::class, 'excluir']);
Route::get('profissional/visualizarAgenda', [AgendaController::class, 'visualizarAgenda']);
Route::post('profissional/buscarPorData/', [AgendaController::class, 'buscarPorData']);
Route::post('profissional/buscarPorIdProfissional{profissional_id}', [AgendaController::class, 'buscarPorIdProfissional']);
route::get('profissional/find/agendamento/{id}', [AgendaController::class, 'pesquisarPorId']);
route::put('profissional/update/agendamento', [AgendaController::class, 'update']);



//Serviços
route::post('servicos', [ServicoController::class, 'servicos']);
route::get('servicos/descricao', [ServicoController::class, 'pesquisarPorDescricao']);
route::get('servicos/nome', [ServicoController::class, 'pesquisarPorNome']);
route::get('servicos/find/{id}', [ServicoController::class, 'pesquisarPorId']);
route::delete('servicos/delete/{id}', [ServicoController::class, 'excluir']);
route::put('servicos/update', [ServicoController::class, 'update']);
route::get('servicos/visualizar', [ServicoController::class, 'retornarTodos']);


//Tipo de pagamento:
Route::put('editar/tipo/pagamento', [TipoDePagamentoController::class,  'updatepagamento']);
Route::post('cadastro/pagamento', [TipoDePagamentoController::class, 'cadastroTipoPagamento']);
Route::post('pesquisar/nome/pagamento', [TipoDePagamentoController::class, 'pesquisarPorTipoPagamento']);
Route::post('excluir/pagamento', [TipoDePagamentoController::class, 'deletarpagamento']);
Route::delete('delete/pagamento/{id}', [TipoDePagamentoController::class, 'deletarpagamento']);
Route::get('visualizar/pagamento', [TipoDePagamentoController::class, 'visualizarCadastroTipoPagamento']);
Route::get('visualizar/pagamento/habilitado', [TipoDePagamentoController::class, 'visualizarCadastroTipoPagamentoHabilitado']);
Route::get('visualizar/pagamento/desabilitado', [TipoDePagamentoController::class, 'visualizarCadastroTipoPagamentoDesabilitado']);


//CADASTROD DE Horarios
Route::post('cadastroAgenda', [AgendaController::class, 'cadastroAgenda']);
Route::delete('deleteAgenda/{id}', [AgendaController::class, 'excluir']);
Route::get('visualizarAgenda', [AgendaController::class, 'visualizarAgenda']);
Route::post('buscarPorData/', [AgendaController::class, 'buscarPorData']);
Route::post('buscarPorIdProfissional{profissional_id}', [AgendaController::class, 'buscarPorIdProfissional']);
route::get('find/agendamento/{id}', [AgendaController::class, 'pesquisarPorId']);
route::put('update/agendamento', [AgendaController::class, 'update']);