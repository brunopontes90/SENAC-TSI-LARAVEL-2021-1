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
            <th>Email</th>
        </tr>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                </tr>
            @endforeach
    </table>
</body>
</html>
