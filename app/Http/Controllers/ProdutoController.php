<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function __construct(){
        $this->middleware('permission:produto-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:produto-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:produto-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:produto-delete', ['only' => ['destroy']]);
    }

    public function Listar(){
        // RECEBE A MODEL CLIENTES (TODOS)
        $produtos = Produto::all();
        return view('product.listar', ['produto' => $produtos]);
    }

    public function index()
    {
        $qtd_por_pagina = 5;
        $data = Clientes::orderBy('id', 'desc', 'preco')->paginate($qtd_por_pagina);
        return view('clientes.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $qtd_por_pagina);
    }


    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, ['nome' =>'required',
        'desc' => 'required|desc|unique:products,desc']);

        $input = $request->all();
        Produto::create($input);
        return redirect()->route('products.index')->with('sucess', 'Produto criado com sucesso');
    }


    public function show($id)
    {
        $produto = Produto::find($id);
        return view('products.show', compact('products'));
    }


    public function edit($id)
    {
        $cliente = Product::find($id);
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, ['nome' =>'required',
        'desc' => 'required|desc|unique:products,desc']);

        $input = $request->all();
        Produto::create($input);
        return redirect()->route('products.index')->with('sucess', 'Produto criado com sucesso');
    }


    public function destroy($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('products.index')->with('success', 'Cliente removido com sucesso');
    }
}
