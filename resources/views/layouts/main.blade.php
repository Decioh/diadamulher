<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--CSS da aplicação-->
    <link rel="stylesheet" href={{asset('/estilo/style.css')}}>
    <!-- CSS bootstrap -->
    <!--Online
    <link rel="stylesheet" href="estilo/all.min.css">
    <link rel="stylesheet" href="estilo/bootstrap.min.css">-->
    <!--Offline-->
    <script src={{asset('/js/scripts.js')}}></script>
    <!-- Ion Icons -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <!--Admin LTE-->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Compiled and minified CSS -->
    <!--Chart JS-->
    <script src={{asset('public/js/chart.js')}}></script>

    <!--Fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abyssinica+SIL&family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="../public/img/favicon.ico" type="image/x-icon">

</head>
<body>
    <header>
        <a href="/"><img src="{{asset('/img/DP_DF-preto.png')}}" alt="logo-defensoria" height="59px" width="225px"></a>
        <nav class = 'menu'>
            <a href="/">Home</a>
            <a href="{{route('assistida.create')}}">Cadastrar</a>
            <a href="{{route('dashboard')}}">Estatísticas</a>
        </nav>
    </header>
        @yield('content')

    <footer class="fixed-bottom">
        <p>Produzido para a<a href="http://www.defensoria.df.gov.br/" target="_blank">Defensoria Pública - DF</a></p>
    </footer>
    
    <script src="js/all.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>