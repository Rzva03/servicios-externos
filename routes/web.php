<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* -------------------------------------------------------------------------- */
/*                             rutas sector                             */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\SectorController;

Route::resource('sector', SectorController::class);
/* -------------------------------------------------------------------------- */
/*                              rutas tipo sector                             */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\TipoSectorController;

Route::resource('tipo-sector', TipoSectorController::class);
/* -------------------------------------------------------------------------- */
/*                                rutas tamanio                               */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\TamanioController;

Route::resource('tamanio', TamanioController::class);
/* -------------------------------------------------------------------------- */
/*                           rutas area conocimiento                          */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AreaConocimientoController;

Route::resource('area-conocimiento', AreaConocimientoController::class);
/* -------------------------------------------------------------------------- */
/*                                 rutas giro                                 */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\GiroController;

Route::resource('giro', GiroController::class);
/* -------------------------------------------------------------------------- */
/*                               rutas instancia                              */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\InstanciaController;

Route::resource('instancia', InstanciaController::class);
/* -------------------------------------------------------------------------- */
/*                            rutas asesor externo                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AsesorExternoController;

Route::resource('asesor-externo', AsesorExternoController::class);