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
// Auth::routes();
Auth::routes([
    'register' => false, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                             rutas sector                             */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\SectorController;

Route::resource('sector', SectorController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                              rutas tipo sector                             */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\TipoSectorController;

Route::resource('tipo-sector', TipoSectorController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                                rutas tamanio                               */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\TamanioController;

Route::resource('tamanio', TamanioController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                           rutas area conocimiento                          */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AreaConocimientoController;

Route::resource(
    'area-conocimiento',
    AreaConocimientoController::class
)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                                 rutas giro                                 */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\GiroController;

Route::resource('giro', GiroController::class)->middleware('auth');

/* -------------------------------------------------------------------------- */
/*                               rutas instancia                              */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\InstanciaController;

Route::resource('instancia', InstanciaController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                            rutas asesor externo                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AsesorExternoController;

Route::resource('asesor-externo', AsesorExternoController::class)->middleware(
    'auth'
);
/* -------------------------------------------------------------------------- */
/*                            rutas asesor interno                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AsesorInternoController;

Route::resource('asesor-interno', AsesorInternoController::class)->middleware(
    'auth'
);
/* -------------------------------------------------------------------------- */
/*                            rutas        Periodo                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\PeriodoController;

Route::resource('periodo', PeriodoController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                            rutas        Carrera                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\CarreraController;

Route::resource('carrera', CarreraController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                                rutas alumno                                */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AlumnoController;

Route::resource('alumno', AlumnoController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                               rutas proyecto                               */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\ProyectoController;

Route::resource('proyecto', ProyectoController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                             rutas tipo convenio                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\TipoConvenioController;

Route::resource('tipo-convenio', TipoConvenioController::class)->middleware(
    'auth'
);
/* -------------------------------------------------------------------------- */
/*                             rutas      convenio                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\ConvenioController;

Route::resource('convenio', ConvenioController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                                rutas indicador                             */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\IndicadorController;

Route::resource('indicador', IndicadorController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                                 rutas alcance                              */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AlcanceController;

Route::resource('alcance', AlcanceController::class)->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                           ruta consulta indicador                          */
/* -------------------------------------------------------------------------- */
use App\Http\Controllers\ConsultaIndicadorController;

Route::resource(
    'consulta-indicador',
    ConsultaIndicadorController::class
)->middleware('auth');

/* -------------------------------------------------------------------------- */
/*                          ruta consulta obtener pdf                         */
/* -------------------------------------------------------------------------- */

// use App\Http\Controllers\ConsultasController;

// Route::get('/consulta', [ConsultasController::class, 'index'])->name(
//     'consulta.index'
// );

// Route::get('/consultas/pdf', [ConsultasController::class, 'getPDF'])->name(
//     'consulta.getPDF'
// );
/* -------------------------------------------------------------------------- */
/*                           ruta consulta proyecto                           */
/* -------------------------------------------------------------------------- */
use App\Http\Controllers\ConsultaProyectoController;
Route::get('/consulta-proyecto', [ConsultaProyectoController::class, 'index'])
    ->name('consulta-proyecto.index')
    ->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                      ruta consulta convenios vigentes                      */
/* -------------------------------------------------------------------------- */
use App\Http\Controllers\ConsultaConvenioController;
Route::get('/consulta-convenio', [ConsultaConvenioController::class, 'index'])
    ->name('consulta-convenio.index')
    ->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                    ruta consulta convenio vigentes todos                   */
/* -------------------------------------------------------------------------- */
Route::get('/consulta-convenio-vigentes', [
    ConsultaConvenioController::class,
    'convenioVigenteTodos',
])
    ->name('consulta-convenio-vigentes.convenioVigenteTodos')
    ->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                     ruta consulta convenio finalizados                     */
/* -------------------------------------------------------------------------- */
Route::get('/consulta-convenio-finalizado', [
    ConsultaConvenioController::class,
    'convenioVencidoTodos',
])
    ->name('consulta-convenio-finalizado.convenioVencidoTodos')
    ->middleware('auth');