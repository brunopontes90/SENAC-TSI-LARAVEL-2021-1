<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr; //Arr é de array
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash; // FUNÇÕES DE CRIPTOGRAFIA

class UserController extends Controller
{

    public function index(Request $request)
    {
        $qtd_por_pagina = 5;
        $data = User::orderBy('id', 'DESC')->paginate($qtd_por_pagina);
        return view('users.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $qtd_por_pagina);
    }


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all(); //PLUCK = ARRANCAR
        return view('users.create', compact($roles));
    }


    public function store(Request $request)
    {
        $this->validade($request, ['name' =>'require',
                                    'email' => 'required|email|unique:users,email',
                                    'senha' => 'required|same:confirm-password',
                                    'roles' => 'required']);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']); // CRIPTOGRAFA A SENHA NO BANCO
        $user = User::create($input);
        $user->assignRole($riquest->input('roles'));
        return redirect()->route('users.index')->with('sucess', 'Usuário cria com sucesso');
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Roles::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso');
    }
}
