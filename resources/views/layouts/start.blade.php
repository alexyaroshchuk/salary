<?php
    use App\Role;
    $role = new Role();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Salary Company</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="/css/starter-template.css" rel="stylesheet">    
    <link href="/css/app.css" rel="stylesheet">
</head>
<body style = "margin-top: 50px">
    <div id ="app">
    @if (session('message'))
    <div class="alert alert-success">
     {{ session('message') }} 
    </div>
    @endif
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="position: fixed; top: 0;">
            <a class="navbar-brand" href="/">CompanY</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    @guest
                        <li class="nav-item active">
                            <a class="nav-link " href="/"> Домашяя страница <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">Про компанию</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/workers"> Сотрудники </a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                    
                    @else
                    <li class="dropdown">
                        <a href="#"  data-toggle="dropdown" role="button" aria-expanded="false"  v-pre>
                        {{Auth::user()->name}} <span class="caret"></span>
                        </a>
                        
                        <ul class="dropdown-menu">
                        <li class="nav-item">
                                <a href="/home"> Домашняя страница <span class="sr-only">(current)</span></a>
                        </li>
                        @if($role->isAdmin())
                            <li class="nav-item">
                                <a href="{{ route('addUser') }}">Добавить сотрудника</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('refreshUser') }}" >Изменить информацию о сотруднике</a>
                            </li>
                        @endif
                            <li class="nav-item">
                                <a href="/about">Про компанию</a>
                            </li>
                        @if($role->isAdmin()||$role->isAccountant())
                            <li class="nav-item">
                                <a href="/workers"> Сотрудники </a> 
                            </li>
                            <li class="nav-item">
                                <a href="/typeTaxes"> Налоги </a>
                            </li>
                        @endif
                            <li class="nav-item">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div> 
        </nav>
    @yield('content')
    </div>
     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
</body>
</html>