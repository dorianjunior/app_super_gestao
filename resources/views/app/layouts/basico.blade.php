<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .topo-admin {
            background-color: #2c3e50;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topo-admin h1 {
            margin: 0;
            font-size: 24px;
        }

        .topo-admin .user-info {
            font-size: 14px;
        }

        .menu-lateral {
            width: 250px;
            background-color: #34495e;
            min-height: calc(100vh - 60px);
            float: left;
            padding: 0;
        }

        .menu-lateral ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .menu-lateral ul li {
            border-bottom: 1px solid #2c3e50;
        }

        .menu-lateral ul li a {
            display: block;
            padding: 15px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: background 0.3s;
        }

        .menu-lateral ul li a:hover,
        .menu-lateral ul li a.active {
            background-color: #2c3e50;
        }

        .conteudo-admin {
            margin-left: 250px;
            padding: 30px;
            background-color: #ecf0f1;
            min-height: calc(100vh - 60px);
        }

        .titulo-pagina-admin {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .titulo-pagina-admin h1 {
            margin: 0;
            color: #2c3e50;
            font-size: 28px;
        }

        .conteudo-pagina-admin {
            background-color: white;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-success {
            background-color: #2ecc71;
            color: white;
        }

        .btn-success:hover {
            background-color: #27ae60;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
        }

        .btn-warning:hover {
            background-color: #d68910;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #34495e;
            color: white;
            font-weight: bold;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #2c3e50;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
        }

        .actions {
            display: inline-flex;
            gap: 5px;
        }
    </style>
</head>

<body>
    <div class="topo-admin">
        <h1>Super Gestão - Área Administrativa</h1>
        <div class="user-info">
            @auth
                {{ Auth::user()->name }} |
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; cursor: pointer; text-decoration: underline;">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="color: white;">Login</a>
            @endauth
        </div>
    </div>

    <div class="menu-lateral">
        <ul>
            <li><a href="{{ route('app.home') }}" class="{{ request()->routeIs('app.home') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('app.fornecedores') }}" class="{{ request()->routeIs('app.fornecedores*') ? 'active' : '' }}">Fornecedores</a></li>
            <li><a href="{{ route('app.produtos') }}" class="{{ request()->routeIs('app.produtos*') ? 'active' : '' }}">Produtos</a></li>
            <li><a href="{{ route('app.clientes') }}" class="{{ request()->routeIs('app.clientes*') ? 'active' : '' }}">Clientes</a></li>
        </ul>
    </div>

    <div class="conteudo-admin">
        <div class="titulo-pagina-admin">
            <h1>@yield('titulo')</h1>
        </div>

        <div class="conteudo-pagina-admin">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('conteudo')
        </div>
    </div>
</body>

</html>
