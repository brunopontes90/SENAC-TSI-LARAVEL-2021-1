<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\UsuarioController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/avisos', function () {
    return view('avisos', ['nome' => 'Bruno',
                           'mostrar' => true,
                           'avisos' => [['id' => 1,
                                        'texto' => 'Feriados agora'],
                                       ['id' => 2,
                                        'texto' => 'Feriado semana que vem']]]);
});

Route::get('/inicial', function(){
    return view('inicial', ['nome' => 'Bruno',
                            'saudacao' => true,
                            'avisos' => [['id' => 1,
                            'texto' => 'Olá'],
                                        ['id' => 2,
                                         'texto' => 'Ate logo!']]]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => 'clientes', 'usuarios'], function (){

//     // Route::get('/listar', [App\Http\Controllers\ClientesController::class, 'listar'])->middleware('auth');

// });


Route::group(['middleware' => ['auth']], function(){

    Route::resource('/clientes', App\Http\Controllers\ClientesController::class);

});

Route::group(['middleware' => ['auth']], function(){

    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/roles', App\Http\Controllers\RoleController::class);

});
