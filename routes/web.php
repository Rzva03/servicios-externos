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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name(
    'home'
);
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
/* -------------------------------------------------------------------------- */
/*                            rutas asesor interno                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AsesorInternoController;

Route::resource('asesor-interno', AsesorInternoController::class);
/* -------------------------------------------------------------------------- */
/*                            rutas        Periodo                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\PeriodoController;

Route::resource('periodo', PeriodoController::class);
/* -------------------------------------------------------------------------- */
/*                            rutas        Carrera                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\CarreraController;

Route::resource('carrera', CarreraController::class);
/* -------------------------------------------------------------------------- */
/*                                rutas alumno                                */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AlumnoController;

Route::resource('alumno', AlumnoController::class);
/* -------------------------------------------------------------------------- */
/*                               rutas proyecto                               */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\ProyectoController;

Route::resource('proyecto', ProyectoController::class);
/* -------------------------------------------------------------------------- */
/*                             rutas tipo convenio                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\TipoConvenioController;

Route::resource('tipo-convenio', TipoConvenioController::class);
/* -------------------------------------------------------------------------- */
/*                             rutas      convenio                            */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\ConvenioController;

Route::resource('convenio', ConvenioController::class);
/* -------------------------------------------------------------------------- */
/*                                rutas indicador                               */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\IndicadorController;

Route::resource('indicador', IndicadorController::class);
/* -------------------------------------------------------------------------- */
/*                                 rutas alcance                                 */
/* -------------------------------------------------------------------------- */

use App\Http\Controllers\AlcanceController;

Route::resource('alcance', AlcanceController::class);
/* -------------------------------------------------------------------------- */
/*                           ruta consulta indicador                          */
/* -------------------------------------------------------------------------- */
use App\Http\Controllers\ConsultaIndicadorController;

Route::resource('consulta-indicador', ConsultaIndicadorController::class);

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