<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;

use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    public function index()
    {
        return Funcionario::all();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $json = $request->getContent();
        return Funcionario::create(json_decode($json, JSON_OBJECT_AS_ARRAY));
    }


    public function show($id)
    {
        $funcionario = Funcionario::find($id);

        if($funcionario){
            return $funcionario;
        }else{
            return json_encode([$id => 'não existe']);
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);

        if($funcionario){
            $json = $request->getContent();
            $atualizacao = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $funcionario->nome = $atualizacao['nome'];

            $ret  = $funcionario->update() ? [$id => 'atualizado'] : [$id => 'erro'];
        }else{
            $ret = [$id = 'não existe'];
        }

        return json_encode($ret);
    }


    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        if($funcionario){
            $ret = $funcionario->delete() ? [$id => 'apagado'] : [$id => 'erro'];
        }else{
            $ret = [$id => 'não existe'];
        }

        return json_encode($ret);
    }
}
