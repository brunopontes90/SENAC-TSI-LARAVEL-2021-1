<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>
        @yield('title')
    </title>
</head>
<body class="container-fluid">
    @section('sidebar')
        <nav class="d-flex justify-content-around bg-secondary">
            <a href="#" class="text-white p-3">Link 1</a>
            <a href="#" class="text-white p-3">Link 2</a>
            <a href="#" class="text-white p-3">Link 3</a>

                @if ($saudacao == true)
                <p class="text-white p-3">Olá, {{$nome}}</p>
            @else
                <p class="text-danger p-3">Até logo, {{$nome}}</p>
            @endif

        </nav>

        <main>
            @if ($saudacao == true)
                <h1 class=" h2 text-muted text-uppercase text-center mt-5">Bem vindo!</h1>
            @else
                <h1 class=" h2 text-muted text-uppercase text-center mt-5">Até logo!</h1>
            @endif
        </main>

        @show
        <div class="container">
            @yield('content')
        </div>
</body>
</html>

