<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiController;

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
