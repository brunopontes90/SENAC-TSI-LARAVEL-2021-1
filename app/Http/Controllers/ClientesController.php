<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class ClientesController extends Controller
{
    use HasFactory;
    use hasRoles;

    // ESSA É UAM FORMA DE CONTROLAR O ACESSO
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function __construct(){
        $this->middleware('permission:Cliente-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:Cliente-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Cliente-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Cliente-delete', ['only' => ['destroy']]);
    }

    public function Listar(){
        // RECEBE A MODEL CLIENTES (TODOS)
        $clientes = Clientes::all();
        return view('clientes.listar', ['clientes' => $clientes]);
    }

    public function index(Request $request)
    {
        $qtd_por_pagina = 5;
        $data = Clientes::orderBy('id', 'DESC')->paginate($qtd_por_pagina);
        return view('clientes.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $qtd_por_pagina);
    }


    public function create()
    {

        return view('clientes.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, ['nome' =>'required',
                                    'email' => 'required|email|unique:users,email']);

        $input = $request->all();
        Clientes::create($input);
        return redirect()->route('clientes.index')->with('sucess', 'Cliente criado com sucesso');
    }


    public function show($id)
    {
        $cliente = Clientes::find($id);
        return view('clientes.show', compact('cliente'));
    }


    public function edit($id)
    {
        $cliente = Clientes::find($id);
        return view('clientes.edit', compact('cliente'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, ['nome' =>'required',
                                    'email' => 'required|email|unique:users,email']);
        $input = $request->all();
        $cliente = Clientes::find($id);
        $cliente->update($input);

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso');
    }


    public function destroy($id)
    {
        Clientes::find($id)->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso');

    }

}
