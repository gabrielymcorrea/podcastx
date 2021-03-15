<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podcast</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="assets/css/app.css">
    
    <style>
        .dropdown-item:active{
            background: none;
        }
    </style>
    
</head>
<body>
    {{--NAVEGAÇÃOO--}}
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand  ml-5  " href="/"><img src="{{asset('assets/img/PodcastX.svg')}}"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto mr-5 mt-3 ">
            <a class="nav-link mr-4" href="/categorias">Podcast</a>
            <a class="nav-link mr-4" href="/sobre">Sobre</a>
           
            @if(session()->has('name'))
                @foreach ($user as $u)
                    <div class="dropdown">
                        <p type="button" class=" nav-link mr-4 dropdown-toggle" data-toggle="dropdown">
                            {{session('name')['name']}}
                        </p>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('edit', $u)}}">Perfil</a>
                            <a class="dropdown-item" href="{{route('sair')}}">Sair</a>
                        </div>
                    </div>
                @endforeach
          
            @else
                <a class="nav-link mr-4" href="/entrar">Entrar</a>
            @endif

        </div>
        </div>
    </nav>

    @yield('conteudo')

    <script src=" {{ asset('assets/jquery.min.js') }} "></script>
    <script src=" {{ asset('assets/bootstrap/bootstrap.bundle.min.js') }} "></script>
</body>
</html>