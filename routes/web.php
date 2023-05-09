<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReclamoController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\HomeController;

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

///////////////////////////////////////////////////
// USUARIOS
///////////////////////////////////////////////////
Auth::routes();

///////////////////////////////////////////////////
// FIN DE: USUARIOS
///////////////////////////////////////////////////

///////////////////////////////////////////////////
// PACIENTES (invitados)
///////////////////////////////////////////////////
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\ReclamoController::class, 'create'])->name('reclamo.create');

//Route::get('/admin_login', [App\Http\Controllers\ReclamoController::class, 'index']);

Route::prefix('paciente')->group(function () {
	Route::post('/reclamo', [App\Http\Controllers\ReclamoController::class, 'store'])->name('reclamo.store');
	Route::post('/reclamo/evidencia', [App\Http\Controllers\ReclamoController::class, 'store_evidencia'])->name('reclamo.store-evidencia');
});

Route::post('documentos/store/{reclamo_id}', [App\Http\Controllers\DocumentoController::class, 'store'])->name('documentos.store');

///////////////////////////////////////////////////
// FIN DE: PACIENTES
///////////////////////////////////////////////////

///////////////////////////////////////////////////
// ADMINISTRADOR
///////////////////////////////////////////////////
Route::middleware('auth')->prefix('admin')->group(function () {
	// reclamos
	
	Route::get('/reclamos', [App\Http\Controllers\ReclamoController::class, 'index'])->name('reclamos.index');
	Route::get('/reclamos/dashboard', [App\Http\Controllers\ReclamoController::class, 'dashboard'])->name('dashboard');
	Route::get('/reclamos/load_data', [App\Http\Controllers\ReclamoController::class, 'load_data'])->name('reclamos.load-data');
	Route::get('/reclamos/show/{reclamo}', [App\Http\Controllers\ReclamoController::class, 'show'])->name('reclamos.show');
	Route::get('/reclamos/edit/{reclamo}', [App\Http\Controllers\ReclamoController::class, 'edit'])->name('reclamos.edit');
	Route::put('reclamos/{reclamo}', [App\Http\Controllers\ReclamoController::class, 'update'])->name('reclamos.update');	
	Route::delete('/reclamos/{reclamo}', [App\Http\Controllers\ReclamoController::class, 'destroy'])->name('reclamos.destroy');
	
	Route::get('/reclamos/tramas', [App\Http\Controllers\ReclamoController::class, 'tramas'])->name('reclamos.tramas');
	
	Route::get('/reclamos/tramasadop', [App\Http\Controllers\ReclamoController::class, 'tramasadop'])->name('reclamos.tramasadop');
	
	// documentos
	Route::get('documentos/load/{reclamo_id}', [App\Http\Controllers\DocumentoController::class, 'load'])->name('reclamos.get-documents');
	Route::get('documentos/download/{documento}', [App\Http\Controllers\DocumentoController::class, 'file_download'])->name('reclamos.file-download');
	Route::delete('documentos/{documento}', [App\Http\Controllers\DocumentoController::class, 'destroy'])->name('documentos.destroy');

	// tipos de reclamos
	Route::get('/tipos', [App\Http\Controllers\TipoController::class, 'index'])->name('tipos.index');
	Route::get('/tipos/load_data', [App\Http\Controllers\TipoController::class, 'load_data'])->name('tipos.load-data');
	Route::post('/tipos', [App\Http\Controllers\TipoController::class, 'store'])->name('tipos.store');
	Route::put('/tipos/{tipo}', [App\Http\Controllers\TipoController::class, 'update'])->name('tipos.update');
	Route::delete('/tipos/{tipo}', [App\Http\Controllers\TipoController::class, 'destroy'])->name('tipos.destroy');

	// derechos en salud de los pacientes
	Route::get('/paciente/derechos', [App\Http\Controllers\DerechoController::class, 'index'])->name('derechos.index');
	Route::get('/paciente/derechos/load_data', [App\Http\Controllers\DerechoController::class, 'load_data'])->name('derechos.load-data');
	Route::post('/paciente/derechos', [App\Http\Controllers\DerechoController::class, 'store'])->name('derechos.store');
	Route::put('/paciente/derechos/{derecho}', [App\Http\Controllers\DerechoController::class, 'update'])->name('derechos.update');
	Route::delete('/paciente/derechos/{derecho}', [App\Http\Controllers\DerechoController::class, 'destroy'])->name('derechos.destroy');
	
	// causas de los reclamos
	Route::get('/causas', [App\Http\Controllers\CausaController::class, 'index'])->name('causas.index');
	Route::get('/causas/load_data', [App\Http\Controllers\CausaController::class, 'load_data'])->name('causas.load-data');
	Route::post('causas/get_by_id/{causa}', [App\Http\Controllers\CausaController::class, 'get_by_id'])->name('causas.get-by-id');
	Route::post('/causas', [App\Http\Controllers\CausaController::class, 'store'])->name('causas.store');
	Route::put('/causas/{causa}', [App\Http\Controllers\CausaController::class, 'update'])->name('causas.update');
	Route::delete('/causas/{causa}', [App\Http\Controllers\CausaController::class, 'destroy'])->name('causas.destroy');

	// origen de los reclamos
	Route::get('/origenes', [App\Http\Controllers\OrigenController::class, 'index'])->name('origenes.index');
	Route::get('/origenes/load_data', [App\Http\Controllers\OrigenController::class, 'load_data'])->name('origenes.load-data');
	Route::get('/origenes/load_datar', [App\Http\Controllers\OrigenController::class, 'load_datar'])->name('origenes.load-datar');
	Route::post('/origenes', [App\Http\Controllers\OrigenController::class, 'store'])->name('origenes.store');
	Route::put('/origenes/{origen}', [App\Http\Controllers\OrigenController::class, 'update'])->name('origenes.update');
	Route::delete('/origenes/{origen}', [App\Http\Controllers\OrigenController::class, 'destroy'])->name('origenes.destroy');

	// estados de los reclamos
	Route::get('/estados', [App\Http\Controllers\EstadoController::class, 'index'])->name('estados.index');
	Route::get('/estados/load_data', [App\Http\Controllers\EstadoController::class, 'load_data'])->name('estados.load-data');
	Route::post('/estados', [App\Http\Controllers\EstadoController::class, 'store'])->name('estados.store');
	Route::put('/estados/{estado}', [App\Http\Controllers\EstadoController::class, 'update'])->name('estados.update');
	Route::delete('/estados/{estado}', [App\Http\Controllers\EstadoController::class, 'destroy'])->name('estados.destroy');

	// usuarios
	Route::get('/usuarios/list', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
	Route::get('/usuarios/load_data', [App\Http\Controllers\UserController::class, 'load_data'])->name('user.load-data');
	Route::post('/usuarios/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
	Route::delete('/usuarios/{usuario}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

	// imprimir desistimiento
	Route::get('reclamos/desistimiento/{reclamo}', [App\Http\Controllers\ReclamoController::class, 'desistimiento'])->name('reclamos.desistimiento');
});

///////////////////////////////////////////////////
// FIN DE: ADMINISTRADOR
///////////////////////////////////////////////////

///////////////////////////////////////////////////
// PACIENTE Y ADMINISTRADOR
///////////////////////////////////////////////////

//Route::post('documentos/store/{reclamo_id}', [App\Http\Controllers\DocumentoController::class, 'store'])->name('documentos.store');

///////////////////////////////////////////////////
// FIN DE: PACIENTE Y ADMINISTRADOR
///////////////////////////////////////////////////
