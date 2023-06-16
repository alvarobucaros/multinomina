<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\CargosController;
use App\Http\Controllers\ConceptosController;
use App\Http\Controllers\CoopfondosController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\EmbargosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\HorasExtrasController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\TiposVariosController;
use App\Http\Controllers\TercerosController;
use App\Http\Controllers\UsersController;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/desarrollo', 'HomeController@desarrollo')->name('desarrollo');

    Route::view('/home/index', 'home')->name('home');

 
    Route::get('cargos', [CargosController::class, 'index'])->name('cargos'); 
    Route::get('cargos/create', [CargosController::class, 'create'])->name('cargos/cargos.create');
    Route::get('cargos/edit/{id}', [CargosController::class, 'edit'])->name('cargos/cargos.edit');
    Route::post('cargos/update/{id}', [CargosController::class, 'update'])->name('cargos/cargos.update');
    Route::get('cargos/show/{id}', [CargosController::class, 'show'])->name('cargos/cargos.show');
    Route::post('cargos/cargos/store', [CargosController::class, 'store'])->name('cargos/cargos.store');
    Route::delete('cargos/destroy/{id}', [CargosController::class, 'destroy'])->name('cargos/cargos.destroy');
    Route::get('cargos/export', [CargosController::class, 'export'])->name('cargos/cargos.export');

    Route::get('coopfondos', [CoopfondosController::class, 'index'])->name('coopfondos'); 
    Route::get('coopfondos/create', [CoopfondosController::class, 'create'])->name('coopfondos/coopfondos.create');
    Route::get('coopfondos/edit/{id}', [CoopfondosController::class, 'edit'])->name('coopfondos/coopfondos.edit');
    Route::post('coopfondos/update/{id}', [CoopfondosController::class, 'update'])->name('coopfondos/coopfondos.update');
    Route::get('coopfondos/show/{id}', [CoopfondosController::class, 'show'])->name('coopfondos/coopfondos.show');
    Route::post('coopfondos/coopfondos/store', [CoopfondosController::class, 'store'])->name('coopfondos/coopfondos.store');
    Route::delete('coopfondos/destroy/{id}', [CoopfondosController::class, 'destroy'])->name('coopfondos/coopfondos.destroy');
    Route::get('coopfondos/export', [CoopfondosController::class, 'export'])->name('coopfondos/coopfondos.export');


    Route::get('dependencias', [dependenciasController::class, 'index'])->name('dependencias'); 
    Route::get('dependencias/create', [dependenciasController::class, 'create'])->name('dependencias/dependencias.create');
    Route::get('dependencias/edit/{id}', [dependenciasController::class, 'edit'])->name('dependencias/dependencias.edit');
    Route::post('dependencias/update/{id}', [dependenciasController::class, 'update'])->name('dependencias/dependencias.update');
    Route::get('dependencias/show/{id}', [dependenciasController::class, 'show'])->name('dependencias/dependencias.show');
    Route::post('dependencias/dependencias/store', [dependenciasController::class, 'store'])->name('dependencias/dependencias.store');
    Route::delete('dependencias/destroy/{id}', [dependenciasController::class, 'destroy'])->name('dependencias/dependencias.destroy');
    Route::get('dependencias/export', [dependenciasController::class, 'export'])->name('dependencias/dependencias.export');
 
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

    Route::get('/user', [UsersController::class, 'index'])->name('user'); 
    Route::get('user/create', [UsersController::class, 'create'])->name('user/user.create');
    Route::get('user/edit/{id}', [UsersController::class, 'edit'])->name('user/user.edit');
    Route::post('user/update/{id}', [UsersController::class, 'update'])->name('user/user.update');
    Route::get('user/show/{id}', [UsersController::class, 'show'])->name('user/user.show');
    Route::post('user/store', [UsersController::class, 'store'])->name('user/user.store');
    Route::delete('user/destroy/{id}', [UsersController::class, 'destroy'])->name('user/user.destroy');
    Route::delete('user/export', [UsersController::class, 'export'])->name('user/user.export');
    Route::get('user/changepwd/{id}', [UsersController::class, 'changepwd'])->name('user/user.changepwd');
    

   Route::get('parametros', [ParametrosController::class, 'index'])->name('parametros'); 
   Route::get('parametros/create', [ParametrosController::class, 'create'])->name('parametros/parametros.create');
   Route::get('parametros/edit/{id}', [ParametrosController::class, 'edit'])->name('parametros/parametros.edit');
   Route::post('parametros/update/{id}', [ParametrosController::class, 'update'])->name('parametros/parametros.update');
   Route::get('parametros/show/{id}', [ParametrosController::class, 'show'])->name('parametros/parametros.show');
   Route::post('parametros/parametros/store', [ParametrosController::class, 'store'])->name('parametros/parametros.store');
   Route::delete('parametros/destroy/{id}', [ParametrosController::class, 'destroy'])->name('parametros/parametros.destroy');
 
    Route::get('/tiposvarios', [TiposVariosController::class, 'index'])->name('tiposvarios'); 
    Route::get('tiposvarios/create', [TiposVariosController::class, 'create'])->name('tiposvarios/tiposvarios.create');
    Route::get('tiposvarios/edit/{id}', [TiposVariosController::class, 'edit'])->name('tiposvarios/tiposvarios.edit');
    Route::post('tiposvarios/update/{id}', [TiposVariosController::class, 'update'])->name('tiposvarios/tiposvarios.update');
    Route::get('tiposvarios/show/{id}', [TiposVariosController::class, 'show'])->name('tiposvarios/tiposvarios.show');
    Route::post('tiposvarios/store', [TiposVariosController::class, 'store'])->name('tiposvarios/tiposvarios.store');
    Route::delete('tiposvarios/destroy/{id}', [TiposVariosController::class, 'destroy'])->name('tiposvarios/tiposvarios.destroy');
    Route::get('tiposvarios/export', [TiposVariosController::class, 'export'])->name('tiposvarios/tiposvarios.export');


    Route::get('/terceros', [TercerosController::class, 'index'])->name('terceros'); 
    Route::get('terceros/create', [TercerosController::class, 'create'])->name('terceros/terceros.create');
    Route::get('terceros/edit/{id}', [TercerosController::class, 'edit'])->name('terceros/terceros.edit');
    Route::post('terceros/update/{id}', [TercerosController::class, 'update'])->name('terceros/terceros.update');
    Route::get('terceros/show/{id}', [TercerosController::class, 'show'])->name('terceros/terceros.show');
    Route::post('terceros/store', [TercerosController::class, 'store'])->name('terceros/terceros.store');
    Route::delete('terceros/destroy/{id}', [TercerosController::class, 'destroy'])->name('terceros/terceros.destroy');
    Route::get('terceros/export', [TercerosController::class, 'export'])->name('terceros/terceros.export');

    Route::get('/conceptos', [ConceptosController::class, 'index'])->name('conceptos'); 
    Route::get('/create', [ConceptosController::class, 'create'])->name('conceptos/conceptos.create');
    Route::get('/edit/{id}', [ConceptosController::class, 'edit'])->name('conceptos/conceptos.edit');
    Route::post('/update/{id}', [ConceptosController::class, 'update'])->name('conceptos/conceptos.update');
    Route::get('/show/{id}', [ConceptosController::class, 'show'])->name('conceptos/conceptos.show');
    Route::post('/store', [ConceptosController::class, 'store'])->name('conceptos/conceptos.store');
    Route::delete('/destroy/{id}', [ConceptosController::class, 'destroy'])->name('conceptos/conceptos.destroy');
    Route::get('conceptos/export', [ConceptosController::class, 'export'])->name('conceptos/conceptos.export');

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
