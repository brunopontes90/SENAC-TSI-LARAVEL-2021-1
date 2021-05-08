@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Produtos</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('clientes.create') }}"> + Novo Produto</a>
        </div>
    </div>
</div>

<br>

@if ($message = Session::get('success'))

<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>

@endif


<table class="table table-bordered">

 <tr>
   <th>ID</th>
   <th>Nome</th>
   <th>Descrição</th>
   <th>Preço</th>
   <th width="280px">Ação</th>
 </tr>

 @foreach ($data as $key => $product)

  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $product->nome }}</td>
    <td>{{ $product->desc }}</td>
    <td>{{ $product->preco }}</td>
    <td>

    <td>
       <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Mostrar</a>
       <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>

        {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

    </td>
  </tr>

 @endforeach

</table>

{!! $data->render() !!}

@endsection
