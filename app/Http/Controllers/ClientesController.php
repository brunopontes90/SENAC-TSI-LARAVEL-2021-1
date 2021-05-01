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
        $this->middleware('permission:cliente-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:cliente-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:cliente-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:cliente-delete', ['only' => ['destroy']]);
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
        $roles = Role::pluck('name', 'name')->all(); //PLUCK = ARRANCAR
        return view('clientes.create', compact($roles));
    }


    public function store(Request $request)
    {
        $this->validade($request, ['nome' =>'require',
                                    'email' => 'required|email|unique:users,email',
                                    'roles' => 'required']);

        $input = $request->all();
        $user = Clientes::create($input);
        $user->assignRole($riquest->input('roles'));
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
        $roles = Roles::pluck('name', 'name')->all();
        $clienteRole = $cliente->roles->pluck('name', 'name')->all();
        return view('clientes.edit', compact('cliente', 'roles', 'clienteRole'));
    }


    public function update(Request $request, $id)
    {
        $this->validade($request, ['nome' =>'require',
                                    'email' => 'required|email|unique:users,email',
                                    'roles' => 'required']);
        $input = $request->all();
        $cliente = Clientes::find($id);
        $cliente->update($input);

        //USANDO CONSULTA POR ELOQUENTE
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $cliente->assigRole($request->input('roles'));
        return redirect()->route('cliente.index')->with('success', 'Cliente atualizado com sucesso');
    }


    public function destroy($id)
    {
        Clientes::find($id)->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente removido com sucesso');

    }

}
