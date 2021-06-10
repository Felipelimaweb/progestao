<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PrestadoresController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\ConsumiveisController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\NotafiscalController;
use App\Models\Contrato;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**Rota Visualização Despesas */
Route::get('Despesas', [ConsumiveisController::class, 'show'])->name('showdespesa');

/* Rotas do cliente */
Route::post('cadastrocliente/novo', [ClientesController::class, 'store'])->name('salvar_cliente');
Route::get('cadastrocliente/del/{id}', [ClientesController::class, 'destroy'])->name('excluir_cliente');
Route::get('cadastrocliente/{id}', [ClientesController::class, 'edit'])->name('editar_cliente');
Route::post('cadastrocliente/{id}', [ClientesController::class, 'update'])->name('atualizar_cliente');
/* Rotas do prestador */
Route::post('cadastroprestador/novo', [PrestadoresController::class, 'store'])->name('salvar_prestador');
Route::get('cadastroprestador/del/{id}', [PrestadoresController::class, 'destroy'])->name('excluir_prestador');
Route::get('cadastroprestador/{id}', [PrestadoresController::class, 'edit'])->name('editar_prestador');
Route::post('cadastroprestador/{id}', [PrestadoresController::class, 'update'])->name('atualizar_prestador');
/* Rotas do fornecedor */
Route::post('cadastrofornecedor/novo', [FornecedoresController::class, 'store'])->name('salvar_fornecedor');
Route::get('cadastrofornecedor/del/{id}', [FornecedoresController::class, 'destroy'])->name('excluir_fornecedor');
Route::get('cadastrofornecedor/{id}', [FornecedoresController::class, 'edit'])->name('editar_fornecedor');
Route::post('cadastrofornecedor/{id}', [FornecedoresController::class, 'update'])->name('atualizar_fornecedor');
/* Rotas do funcionario */
Route::post('cadastrofuncionario/novo', [FuncionariosController::class, 'store'])->name('salvar_funcionario');
Route::get('cadastrofuncionario/del/{id}', [FuncionariosController::class, 'destroy'])->name('excluir_funcionario');
Route::get('cadastrofuncionario/{id}', [FuncionariosController::class, 'edit'])->name('editar_funcionario');
Route::post('cadastrofuncionario/{id}', [FuncionariosController::class, 'update'])->name('atualizar_funcionario');
/* Rotas do consumivel */
Route::post('cadastroconsumivel/novo', [ConsumiveisController::class, 'store'])->name('salvar_consumivel');
Route::get('cadastroconsumivel/del/{id}', [ConsumiveisController::class, 'destroy'])->name('excluir_consumivel');
Route::put('cadastroconsumivel/up/{id}', [ConsumiveisController::class, 'update'])->name('update_consumivel');
/* Rotas do contrato */
Route::get('Contratos', [ContratosController::class, 'show'])->name('contrato');
Route::post('cadastrocontrato/novo', [ContratosController::class, 'store'])->name('salvar_contrato');
Route::get('cadastrocontrato/del/{id}', [ContratosController::class, 'destroy'])->name('excluir_contrato');
Route::get('cadastrocontrato/{id}', [ContratosController::class, 'edit'])->name('editar_contrato');
Route::post('cadastrocontrato/{id}', [ContratosController::class, 'update'])->name('atualizar_contrato');
/* Rotas da notafiscal */
//Route::post('cadastronotafiscal/{id}', [NotafiscalController::class, 'create'])->name('salvar_notafiscal');
Route::get('cadastronotafiscal/del/{id}', [NotafiscalController::class, 'destroy'])->name('excluir_notafiscal');
Route::get('cadastronotafiscals/{id}', [NotafiscalController::class, 'create'])->name('incluir_notafiscal');
Route::post('cadastronotafiscal/novo', [NotafiscalController::class, 'store'])->name('salvar_notafiscal');
Route::get('cadastronotafiscal/{id}', [NotafiscalController::class, 'edit'])->name('editar_notafiscal');
Route::post('cadastronotafiscal/{id}', [NotafiscalController::class, 'update'])->name('atualizar_notafiscal');

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	

	Route::get('Pagamento-Depesas', [NotafiscalController::class, 'shownotaspendentes'])->name('pagamentodespesa');

	Route::get('Registro-De-Receitas', function () {
		return view('pages.registroreceita');
	})->name('registroreceita');

	
	Route::get('Cadastro', [ContratosController::class, 'show123'])->name('register');
	
	Route::get('Notas-Fiscais', [NotafiscalController::class, 'shownotafiscal'])->name('notafiscal');

	Route::get('Receitas', [NotafiscalController::class, 'shownotasclientes'])->name('showreceita');

	Route::get('Cadastro-Cliente', [ClientesController::class, 'show'])->name('registercliente');
	
	Route::get('Cadastro-Fornecedor', [FornecedoresController::class, 'show'])->name('registerfornecedor');

	Route::get('Cadastro-Prestador', [PrestadoresController::class, 'show'])->name('registerprestador');

	Route::get('Cadastro-Contrato', function () {
		return view('pages.cadastro.registercontrato');
	})->name('registercontrato');

	Route::get('Cadastro-Funcionario', [FuncionariosController::class, 'show'])->name('registerfuncionario');

	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});



