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
Route::group(['prefix' => 'clientes', 'usuarios'], function (){
    Route::get('/listar', [ClientesController::class, 'listar'])->middleware('auth');
});

Route::get('/listar', [App\Http\Controllers\UsuarioController::class, 'visualizar'])->middleware('auth');
