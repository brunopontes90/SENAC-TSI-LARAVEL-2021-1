<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    // ESSA É UAM FORMA DE CONTROLAR O ACESSO
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function Listar(){
        // RECEBE A MODEL CLIENTES (TODOS)
        $clientes = Clientes::all();
        return view('clientes.listar', ['clientes' => $clientes]);
    }
}
