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

    public function __construct(){
        $this->middleware('permission:user-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $qtd_por_pagina = 5;
        $data = User::orderBy('id', 'DESC')->paginate($qtd_por_pagina);
        return view('users.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $qtd_por_pagina);
    }


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all(); //PLUCK = ARRANCAR
        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate($request,
        ['name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
        'roles' => 'required']);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']); // CRIPTOGRAFA A SENHA NO BANCO
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
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
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,
        ['name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
        'roles' => 'required']);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, ['password']); // RETIRA O INDICE DO VETOR INPUT
        }
        $user = User::find($id);
        $user->update($input);

        //USANDO CONSULTA POR ELOQUENTE
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assigRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'Usuario atualizado com sucesso');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso');

    }
}
