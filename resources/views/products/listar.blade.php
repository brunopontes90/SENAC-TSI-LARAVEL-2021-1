<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table border="1" bgcolor="#dedede">
        <tr>
            <th>Nome</th>
            <th>Endereço</th>
        </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->nome}}</td>
                    <td>{{$product->endereco}}</td>
                </tr>
            @endforeach
    </table>
</body>
</html>
