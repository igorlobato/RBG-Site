<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- link da fonte da "logo" --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    {{-- Ícone Home --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a style="text-decoration:none;" class="rgb" href="{{route('site.index')}}">
                <span style="color: red;">R</span>
                <span style="color: green;">G</span>
                <span style="color: blue;">B</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mr-auto">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Digite algo..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                  </form>
            </ul>
        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            @auth
                <li>
                    <a href="#" class="nav-link text-secondary">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"></use></svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"></use></svg>
                                Dashboard
                    </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"></use></svg>
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"></use></svg>
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"></use></svg>
                            Customers
                        </a>
                    </li>
                </ul>
                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a href="{{--route('login.logout')--}}" class="dropdown-item">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{route('login.logout')}}" class="dropdown-item">Sair</a></li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login.entrar') }}" style="color:white;">Entrar</a>
                <span class="branco">/</span>
                <a href="{{ route('login.create') }}" style="color:white;">Cadastrar-se</a>
            @endauth
            </div>
        </div>
    </nav>

<div class="main">
    <div class="sidebar">
        <div class="flex-shrink-0 p-3 bg-black" style="width: 280px;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <svg class="bi me-2" width="30" height="24" style="vertical-align: middle;"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-5 fw-semibold d-flex align-items-center">
                    <span class="material-symbols-outlined" style="vertical-align: middle;">home</span>
                    Página inicial
                </span>
            </a>
            <ul class="list-unstyled ps-0">
            <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed branco align-center" data-toggle="collapse" data-target="#home-collapse" aria-expanded="false">
                    <span class="material-symbols-outlined">
                        computer
                        </span>
                      Topicos
                </button>
                <div class="collapse" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="dropdown-item branco">Overview</a></li>
                  </ul>
                </div>
            </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed branco align-center" data-toggle="collapse"
                data-target="#account-collapse" aria-expanded="false">
                    <span class="material-symbols-outlined">
                        person
                        </span>
                  Conta
                </button>
                <div class="collapse" id="account-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        @auth
                            <li><a href="{{--route('login.logout')--}}" class="dropdown-item branco">Perfil</a></li>
                            <li><a href="{{route('login.logout')}}" class="dropdown-item branco">Sair</a></li>
                        @else
                            <li><a href="{{ route('login.entrar') }}" class="dropdown-item branco">Entrar</a></li>
                            <li><a href="{{ route('login.create') }}" class="dropdown-item branco">Cadastrar-se</a></li>
                        @endauth
                    </ul>
                </div>
        </li>
        </ul>
          </div>
    </div>

        <div class="conteudo">
            @yield('conteudo')
        </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
