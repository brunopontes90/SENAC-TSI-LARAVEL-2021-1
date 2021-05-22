<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function visualizar(){
        $usuario = User::all();
        return view('usuarios.listar', ['usuarios' => $usuario]);
    }
}
