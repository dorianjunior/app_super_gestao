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
            <a class="nav-link {{ request()->routeIs('app.produtos') || request()->routeIs('app.produtos.create') || request()->routeIs('app.produtos.edit') || request()->routeIs('app.produtos.store') || request()->routeIs('app.produtos.update') || request()->routeIs('app.produtos.destroy') ? 'active' : '' }}" href="{{ route('app.produtos') }}">
                <i class="fas fa-box"></i>
                <span>Produtos</span>
            </a>
            <a class="nav-link {{ request()->routeIs('app.filiais*') ? 'active' : '' }}" href="{{ route('app.filiais') }}">
                <i class="fas fa-store"></i>
                <span>Filiais</span>
            </a>
            <a class="nav-link {{ request()->routeIs('app.produtos-filiais*') ? 'active' : '' }}" href="{{ route('app.produtos-filiais') }}">
                <i class="fas fa-boxes"></i>
                <span>Produtos por Filial</span>
            </a>
            <a class="nav-link {{ request()->routeIs('app.clientes*') ? 'active' : '' }}" href="{{ route('app.clientes') }}">
                <i class="fas fa-users"></i>
                <span>Clientes</span>
            </a>
            <a class="nav-link {{ request()->routeIs('app.contatos*') ? 'active' : '' }}" href="{{ route('app.contatos') }}">
                <i class="fas fa-envelope"></i>
                <span>Mensagens</span>
                @php
                    $totalNovos = \App\Models\SiteContato::where('status', 'novo')->count();
                @endphp
                @if($totalNovos > 0)
                    <span class="badge bg-danger rounded-pill ms-auto">{{ $totalNovos }}</span>
                @endif
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

        <!-- Alertas (agora gerenciados pelo SweetAlert2) -->

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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts Personalizados -->
    <script>
        // Substituir alertas de sessão por SweetAlert2
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#28a745',
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#dc3545'
            });
        @endif

        // Substituir confirmações de exclusão por SweetAlert2
        document.addEventListener('DOMContentLoaded', function() {
            // Para todos os formulários de exclusão
            const deleteForms = document.querySelectorAll('form[onsubmit*="confirm"]');

            deleteForms.forEach(form => {
                form.removeAttribute('onsubmit');

                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Tem certeza?',
                        text: "Esta ação não poderá ser revertida!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Sim, excluir!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    @yield('scripts')
</body>
</html>
