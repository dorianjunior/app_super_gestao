<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
</head>

<body>
    <!-- Navbar Superior -->
    <nav class="navbar navbar-expand-lg navbar-admin fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('app.home') }}">
                <i class="fas fa-chart-line me-2"></i>Super Gestão
            </a>

            <div class="d-flex align-items-center">
                @auth
                    <span class="navbar-text me-3">
                        <i class="fas fa-user-circle me-2"></i>{{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-logout btn-sm">
                            <i class="fas fa-sign-out-alt me-1"></i>Sair
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-logout btn-sm">
                        <i class="fas fa-sign-in-alt me-1"></i>Login
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Sidebar Lateral -->
    <div class="sidebar">
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('app.home') ? 'active' : '' }}" href="{{ route('app.home') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a class="nav-link {{ request()->routeIs('app.fornecedores*') ? 'active' : '' }}" href="{{ route('app.fornecedores') }}">
                <i class="fas fa-truck"></i>
                <span>Fornecedores</span>
            </a>
            <a class="nav-link {{ request()->routeIs('app.produtos*') ? 'active' : '' }}" href="{{ route('app.produtos') }}">
                <i class="fas fa-box"></i>
                <span>Produtos</span>
            </a>
            <a class="nav-link {{ request()->routeIs('app.clientes*') ? 'active' : '' }}" href="{{ route('app.clientes') }}">
                <i class="fas fa-users"></i>
                <span>Clientes</span>
            </a>
        </nav>
    </div>

    <!-- Conteúdo Principal -->
    <div class="main-content" style="margin-top: 56px;">
        <!-- Header da Página -->
        <div class="page-header">
            <h1><i class="fas fa-{{ request()->routeIs('app.home') ? 'home' : (request()->routeIs('app.fornecedores*') ? 'truck' : (request()->routeIs('app.produtos*') ? 'box' : 'users')) }} me-2"></i>@yield('titulo')</h1>
            @yield('header-actions')
        </div>

        <!-- Alertas -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Atenção!</strong> Corrija os erros abaixo:
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Conteúdo da Página -->
        @yield('conteudo')
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>
</html>
