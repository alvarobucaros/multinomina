<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AcumuladosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BancosController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\ConceptosController;
use App\Http\Controllers\CoopfondosController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\DiasHabilesController;
use App\Http\Controllers\EmbargosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\HorasExtrasController;
use App\Http\Controllers\HVidaController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\LicenciasController;
use App\Http\Controllers\LiquidacionesController;
use App\Http\Controllers\NovedadesController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\TiposVariosController;
use App\Http\Controllers\TercerosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VacacionesController;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/desarrollo', 'HomeController@desarrollo')->name('desarrollo');

    Route::view('/home/index', 'home')->name('home');

    Route::view('/home/importaXLS', 'home')->name('importaXLS');

    Route::get('acumulados', [AcumuladosController::class, 'index'])->name('acumulados'); 
    Route::post('acumulados/list/{id}', [AcumuladosController::class, 'list'])->name('acumulados/acumulados.list');
    Route::get('acumulados/createPDF/{id}', [AcumuladosController::class, 'createPDF'])->name('acumulados/acumulados.createPDF');


    Route::get('bancos', [BancosController::class, 'index'])->name('bancos'); 
    Route::get('bancos/create', [BancosController::class, 'create'])->name('bancos/bancos.create');
    Route::get('bancos/edit/{id}', [BancosController::class, 'edit'])->name('bancos/bancos.edit');
    Route::post('bancos/update/{id}', [BancosController::class, 'update'])->name('bancos/bancos.update');
    Route::get('bancos/show/{id}', [BancosController::class, 'show'])->name('bancos/bancos.show');
    Route::post('bancos/bancos/store', [BancosController::class, 'store'])->name('bancos/bancos.store');
    Route::delete('bancos/destroy/{id}', [BancosController::class, 'destroy'])->name('bancos/bancos.destroy');
    Route::get('bancos/export', [BancosController::class, 'export'])->name('bancos/bancos.export');
 
    Route::get('cargos', [CargosController::class, 'index'])->name('cargos'); 
    Route::get('cargos/create', [CargosController::class, 'create'])->name('cargos/cargos.create');
    Route::get('cargos/edit/{id}', [CargosController::class, 'edit'])->name('cargos/cargos.edit');
    Route::post('cargos/update/{id}', [CargosController::class, 'update'])->name('cargos/cargos.update');
    Route::get('cargos/show/{id}', [CargosController::class, 'show'])->name('cargos/cargos.show');
    Route::post('cargos/cargos/store', [CargosController::class, 'store'])->name('cargos/cargos.store');
    Route::delete('cargos/destroy/{id}', [CargosController::class, 'destroy'])->name('cargos/cargos.destroy');
    Route::get('cargos/export', [CargosController::class, 'export'])->name('cargos/cargos.export');
    Route::post('cargos/import', [CargosController::class, 'import'])->name('cargos/cargos.import');
    Route::get('cargos/cargaxls', [CargosController::class, 'cargaxls'])->name('cargos/cargos.cargaxls');

    Route::get('/conceptos', [ConceptosController::class, 'index'])->name('conceptos'); 
    Route::get('conceptos/create', [ConceptosController::class, 'create'])->name('conceptos/conceptos.create');
    Route::get('conceptos/edit/{id}', [ConceptosController::class, 'edit'])->name('conceptos/conceptos.edit');
    Route::post('conceptos/update/{id}', [ConceptosController::class, 'update'])->name('conceptos/conceptos.update');
    Route::get('conceptos/show/{id}', [ConceptosController::class, 'show'])->name('conceptos/conceptos.show');
    Route::post('conceptos/store', [ConceptosController::class, 'store'])->name('conceptos/conceptos.store');
    Route::delete('conceptos/destroy/{id}', [ConceptosController::class, 'destroy'])->name('conceptos/conceptos.destroy');
    Route::get('conceptos/export', [ConceptosController::class, 'export'])->name('conceptos/conceptos.export');
    Route::get('conceptos/import', [ConceptosController::class, 'import'])->name('conceptos/conceptos.import');
    Route::get('conceptos/cargaxls', [ConceptosController::class, 'cargaxls'])->name('conceptos/conceptos.cargaxls');

    Route::get('coopfondos', [CoopfondosController::class, 'index'])->name('coopfondos'); 
    Route::get('coopfondos/create', [CoopfondosController::class, 'create'])->name('coopfondos/coopfondos.create');
    Route::get('coopfondos/edit/{id}', [CoopfondosController::class, 'edit'])->name('coopfondos/coopfondos.edit');
    Route::post('coopfondos/update/{id}', [CoopfondosController::class, 'update'])->name('coopfondos/coopfondos.update');
    Route::get('coopfondos/show/{id}', [CoopfondosController::class, 'show'])->name('coopfondos/coopfondos.show');
    Route::post('coopfondos/coopfondos/store', [CoopfondosController::class, 'store'])->name('coopfondos/coopfondos.store');
    Route::delete('coopfondos/destroy/{id}', [CoopfondosController::class, 'destroy'])->name('coopfondos/coopfondos.destroy');
    Route::get('coopfondos/export', [CoopfondosController::class, 'export'])->name('coopfondos/coopfondos.export');
    Route::get('coopfondos/import', [ConceptosController::class, 'import'])->name('coopfondos/coopfondos.import');

    Route::get('dependencias', [DependenciasController::class, 'index'])->name('dependencias'); 
    Route::get('dependencias/create', [DependenciasController::class, 'create'])->name('dependencias/dependencias.create');
    Route::get('dependencias/edit/{id}', [DependenciasController::class, 'edit'])->name('dependencias/dependencias.edit');
    Route::post('dependencias/update/{id}', [DependenciasController::class, 'update'])->name('dependencias/dependencias.update');
    Route::get('dependencias/show/{id}', [DependenciasController::class, 'show'])->name('dependencias/dependencias.show');
    Route::post('dependencias/dependencias/store', [DependenciasController::class, 'store'])->name('dependencias/dependencias.store');
    Route::delete('dependencias/destroy/{id}', [DependenciasController::class, 'destroy'])->name('dependencias/dependencias.destroy');
    Route::get('dependencias/export', [DependenciasController::class, 'export'])->name('dependencias/dependencias.export');
    Route::post('dependencias/import', [DependenciasController::class, 'import'])->name('dependencias/dependencias.import');
    Route::get('dependencias/cargaxls', [DependenciasController::class, 'cargaxls'])->name('dependencias/dependencias.cargaxls');

    Route::get('diasHabiles', [diasHabilesController::class, 'index'])->name('diasHabiles'); 
    Route::get('diasHabiles/create', [diasHabilesController::class, 'create'])->name('diasHabiles/diasHabiles.create');
    Route::get('diasHabiles/edit/{id}', [diasHabilesController::class, 'edit'])->name('diasHabiles/diasHabiles.edit');
    Route::post('diasHabiles/update/{id}', [diasHabilesController::class, 'update'])->name('diasHabiles/diasHabiles.update');
    Route::get('diasHabiles/show/{id}', [diasHabilesController::class, 'show'])->name('diasHabiles/diasHabiles.show');
    Route::post('diasHabiles/diasHabiles/store', [diasHabilesController::class, 'store'])->name('diasHabiles/diasHabiles.store');
    Route::delete('diasHabiles/destroy/{id}', [diasHabilesController::class, 'destroy'])->name('diasHabiles/diasHabiles.destroy');
    Route::get('diasHabiles/export', [diasHabilesController::class, 'export'])->name('diasHabiles/diasHabiles.export');
    Route::get('diasHabiles/creaano', [diasHabilesController::class, 'creaano'])->name('diasHabiles/diasHabiles.creaano');
    Route::post('diasHabiles/nuevoano/{id}', [diasHabilesController::class, 'nuevoano'])->name('diasHabiles/diasHabiles.nuevoano');


    Route::get('embargos', [EmbargosController::class, 'index'])->name('embargos'); 
    Route::get('embargos/create', [EmbargosController::class, 'create'])->name('embargos/embargos.create');
    Route::get('embargos/edit/{id}', [EmbargosController::class, 'edit'])->name('embargos/embargos.edit');
    Route::post('embargos/update/{id}', [EmbargosController::class, 'update'])->name('embargos/embargos.update');
    Route::get('embargos/show/{id}', [EmbargosController::class, 'show'])->name('embargos/embargos.show');
    Route::post('embargos/embargos/store', [EmbargosController::class, 'store'])->name('embargos/embargos.store');
    Route::delete('embargos/destroy/{id}', [EmbargosController::class, 'destroy'])->name('embargos/embargos.destroy');
    Route::get('embargos/export', [EmbargosController::class, 'export'])->name('embargos/embargos.export');

    Route::get('empleados', [EmpleadosController::class, 'index'])->name('empleados'); 
    Route::get('empleados/create', [EmpleadosController::class, 'create'])->name('empleados/empleados.create');
    Route::get('empleados/edit/{id}', [EmpleadosController::class, 'edit'])->name('empleados/empleados.edit');
    Route::post('empleados/update/{id}', [EmpleadosController::class, 'update'])->name('empleados/empleados.update');
    Route::get('empleados/show/{id}', [EmpleadosController::class, 'show'])->name('empleados/empleados.show');
    Route::post('empleados/empleados/store', [EmpleadosController::class, 'store'])->name('empleados/empleados.store');
    Route::delete('empleados/destroy/{id}', [EmpleadosController::class, 'destroy'])->name('empleados/empleados.destroy');
    Route::get('empleados/export', [EmpleadosController::class, 'export'])->name('empleados/empleados.export');
    Route::post('empleados/import', [EmpleadosController::class, 'import'])->name('empleados/empleados.import');
    Route::get('empleados/cargaxls', [EmpleadosController::class, 'cargaxls'])->name('empleados/empleados.cargaxls');
  
    Route::get('/miempresa', [EmpresasController::class, 'miempresa'])->name('miempresa'); 
    Route::get('empresas', [EmpresasController::class, 'index'])->name('empresas'); 
    Route::get('empresas/create', [EmpresasController::class, 'create'])->name('empresas/empresas.create');
    Route::get('empresas/edit/{id}', [EmpresasController::class, 'edit'])->name('empresas/empresas.edit');
    Route::post('empresas/update/{id}', [EmpresasController::class, 'update'])->name('empresas/empresas.update');
    Route::get('empresas/show/{id}', [EmpresasController::class, 'show'])->name('empresas/empresas.show');
    Route::post('empresas/empresas/store', [EmpresasController::class, 'store'])->name('empresas/empresas.store');
    Route::delete('empresas/destroy/{id}', [EmpresasController::class, 'destroy'])->name('empresas/empresas.destroy');
  
    Route::get('horas_extras', [HorasExtrasController::class, 'index'])->name('horas_extras'); 
    Route::get('horas_extras/create', [HorasExtrasController::class, 'create'])->name('horas_extras/horas_extras.create');
    Route::get('horas_extras/edit/{id}', [HorasExtrasController::class, 'edit'])->name('horas_extras/horas_extras.edit');
    Route::post('horas_extras/update/{id}', [HorasExtrasController::class, 'update'])->name('horas_extras/horas_extras.update');
    Route::get('horas_extras/show/{id}', [HorasExtrasController::class, 'show'])->name('horas_extras/horas_extras.show');
    Route::post('horas_extras/horas_extras/store', [HorasExtrasController::class, 'store'])->name('horas_extras/horas_extras.store');
    Route::delete('horas_extras/destroy/{id}', [HorasExtrasController::class, 'destroy'])->name('horas_extras/horas_extras.destroy');
    Route::get('horas_extras/export', [HorasExtrasController::class, 'export'])->name('horas_extras/horas_extras.export');
    Route::get('horas_extras/liquida', [HorasExtrasController::class, 'liquida'])->name('horas_extras/horas_extras.liquida');

    Route::get('hvida', [HVidaController::class, 'index'])->name('hvida'); 
  
    Route::get('ingresos', [IngresosController::class, 'index'])->name('ingresos'); 
    Route::get('ingresos/create', [IngresosController::class, 'create'])->name('ingresos/ingresos.create');
    Route::get('ingresos/edit/{id}', [IngresosController::class, 'edit'])->name('ingresos/ingresos.edit');
    Route::post('ingresos/update/{id}', [IngresosController::class, 'update'])->name('ingresos/ingresos.update');
    Route::get('ingresos/show/{id}', [IngresosController::class, 'show'])->name('ingresos/ingresos.show');
    Route::post('ingresos/ingresos/store', [IngresosController::class, 'store'])->name('ingresos/ingresos.store');
    Route::delete('ingresos/destroy/{id}', [IngresosController::class, 'destroy'])->name('ingresos/ingresos.destroy');
    Route::get('ingresos/export', [IngresosController::class, 'export'])->name('ingresos/ingresos.export');

    Route::get('licencias', [LicenciasController::class, 'index'])->name('licencias'); 
    Route::get('licencias/create', [LicenciasController::class, 'create'])->name('licencias/licencias.create');
    Route::get('licencias/edit/{id}', [LicenciasController::class, 'edit'])->name('licencias/licencias.edit');
    Route::post('licencias/update/{id}', [LicenciasController::class, 'update'])->name('licencias/licencias.update');
    Route::get('licencias/show/{id}', [LicenciasController::class, 'show'])->name('licencias/licencias.show');
    Route::post('licencias/store', [LicenciasController::class, 'store'])->name('licencias/licencias.store');
    Route::delete('licencias/destroy/{id}', [LicenciasController::class, 'destroy'])->name('licencias/licencias.destroy');
    Route::delete('licencias/export', [LicenciasController::class, 'export'])->name('licencias/licencias.export');

    Route::get('liquidaciones', [LiquidacionesController::class, 'index'])->name('liquidaciones'); 
    Route::post('liquidaciones/edit', [LiquidacionesController::class, 'edit'])->name('liquidaciones/liquidaciones.edit');
    Route::get('liquidaciones/show/{id}', [LiquidacionesController::class, 'show'])->name('liquidaciones/liquidaciones.show');
    Route::get('liquidaciones/liquida/{id}', [LiquidacionesController::class, 'liquida'])->name('liquidaciones/liquidaciones.liquida');
    Route::get('liquidaciones/traeLiq/{id}', [LiquidacionesController::class, 'traeLiq'])->name('liquidaciones/liquidaciones.traeLiq');
    Route::get('/verLiquidacion/{id}', [LiquidacionesController::class, 'verLiquidacion'])->name('liquidaciones/liquidaciones.verLiquidacion');
    Route::get('/create/{id}', [LiquidacionesController::class, 'create'])->name('liquidaciones/liquidaciones.create');
    Route::post('liquidaciones/store', [LiquidacionesController::class, 'store'])->name('liquidaciones/liquidaciones.store');
    Route::post('verliquidaciones', [LiquidacionesController::class, 'verliquidaciones'])->name('liquidaciones/liquidaciones/verliquidaciones');
    Route::post('liquidaciones/liquidar', [LiquidacionesController::class, 'liquidar'])->name('liquidaciones/liquidaciones.liquidar');
    Route::get('verMovimientos/{id}', [LiquidacionesController::class, 'verMovimientos'])->name('liquidaciones/liquidaciones/verMovimientos');
    Route::get('liquidaciones/export', [CargosController::class, 'export'])->name('liquidaciones/liquidaciones.export');
    Route::get('liquidaciones/cargaxls', [CargosController::class, 'cargaxls'])->name('liquidaciones/liquidaciones.cargaxls');


    Route::get('/novedades', [NovedadesController::class, 'index'])->name('novedades'); 
    Route::get('/create', [NovedadesController::class, 'create'])->name('novedades/novedades.create');
    Route::get('/edit/{id}', [NovedadesController::class, 'edit'])->name('novedades/novedades.edit');
    Route::post('/update/{id}', [NovedadesController::class, 'update'])->name('novedades/novedades.update');
    Route::get('/show/{id}', [NovedadesController::class, 'show'])->name('novedades/novedades.show');
    Route::post('/store', [NovedadesController::class, 'store'])->name('novedades/novedades.store');
    Route::delete('/destroy/{id}', [NovedadesController::class, 'destroy'])->name('novedades/novedades.destroy');
    Route::get('novedades/export', [NovedadesController::class, 'export'])->name('novedades/novedades.export');
    Route::get('novedades/import', [NovedadesController::class, 'import'])->name('novedades/novedades.import');
    Route::get('novedades/cargaxls', [NovedadesController::class, 'cargaxls'])->name('novedades/novedades.cargaxls');

   Route::get('parametros', [ParametrosController::class, 'index'])->name('parametros'); 
   Route::get('parametros/create', [ParametrosController::class, 'create'])->name('parametros/parametros.create');
   Route::get('parametros/edit/{id}', [ParametrosController::class, 'edit'])->name('parametros/parametros.edit');
   Route::post('parametros/update/{id}', [ParametrosController::class, 'update'])->name('parametros/parametros.update');
   Route::get('parametros/show/{id}', [ParametrosController::class, 'show'])->name('parametros/parametros.show');
   Route::post('parametros/parametros/store', [ParametrosController::class, 'store'])->name('parametros/parametros.store');
   Route::delete('parametros/destroy/{id}', [ParametrosController::class, 'destroy'])->name('parametros/parametros.destroy');
 
    Route::get('/terceros', [TercerosController::class, 'index'])->name('terceros'); 
    Route::get('terceros/create', [TercerosController::class, 'create'])->name('terceros/terceros.create');
    Route::get('terceros/edit/{id}', [TercerosController::class, 'edit'])->name('terceros/terceros.edit');
    Route::post('terceros/update/{id}', [TercerosController::class, 'update'])->name('terceros/terceros.update');
    Route::get('terceros/show/{id}', [TercerosController::class, 'show'])->name('terceros/terceros.show');
    Route::post('terceros/store', [TercerosController::class, 'store'])->name('terceros/terceros.store');
    Route::delete('terceros/destroy/{id}', [TercerosController::class, 'destroy'])->name('terceros/terceros.destroy');
    Route::get('terceros/export', [TercerosController::class, 'export'])->name('terceros/terceros.export');
    Route::post('terceros/import', [TercerosController::class, 'import'])->name('terceros/terceros.import');
    Route::get('terceros/cargaxls', [TercerosController::class, 'cargaxls'])->name('terceros/terceros.cargaxls');
  
    Route::get('/user', [UsersController::class, 'index'])->name('user'); 
    Route::get('user/create', [UsersController::class, 'create'])->name('user/user.create');
    Route::get('user/edit/{id}', [UsersController::class, 'edit'])->name('user/user.edit');
    Route::post('user/update/{id}', [UsersController::class, 'update'])->name('user/user.update');
    Route::post('user/updatepwd/{id}', [UsersController::class, 'updatepwd'])->name('user/user.updatepwd');
 
    
    Route::get('user/show/{id}', [UsersController::class, 'show'])->name('user/user.show');
    Route::post('user/store', [UsersController::class, 'store'])->name('user/user.store');
    Route::delete('user/destroy/{id}', [UsersController::class, 'destroy'])->name('user/user.destroy');
    Route::delete('user/export', [UsersController::class, 'export'])->name('user/user.export');
    Route::get('user/changepwd/{id}', [UsersController::class, 'changepwd'])->name('user/user.changepwd');
    
    Route::get('vacaciones', [VacacionesController::class, 'index'])->name('vacaciones'); 
    Route::get('vacaciones/create/{id}', [VacacionesController::class, 'create'])->name('vacaciones/vacaciones.create');
    Route::post('vacaciones/edit', [VacacionesController::class, 'edit'])->name('vacaciones/vacaciones.edit');
    Route::post('vacaciones/update/{id}', [VacacionesController::class, 'update'])->name('vacaciones/vacaciones.update');
    Route::get('vacaciones/show/{id}', [VacacionesController::class, 'show'])->name('vacaciones/vacaciones.show');
    Route::post('vacaciones/store', [VacacionesController::class, 'store'])->name('vacaciones/vacaciones.store');
    Route::delete('vacaciones/destroy/{id}', [VacacionesController::class, 'destroy'])->name('vacaciones/vacaciones.destroy');
    Route::delete('vacaciones/export', [VacacionesController::class, 'export'])->name('vacaciones/vacaciones.export');


    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**   
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
