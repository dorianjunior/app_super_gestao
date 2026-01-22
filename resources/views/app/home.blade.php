@extends('app.layouts.basico')

@section('titulo', 'Dashboard')

@section('conteudo')
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-4">
                    <h3 class="mb-2">
                        <i class="fas fa-rocket text-primary me-2"></i>Bem-vindo ao Sistema de Gestão!
                    </h3>
                    <p class="text-muted mb-0">
                        Use o menu lateral para navegar entre as funcionalidades do sistema.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards de Estatísticas -->
    <div class="row g-4">
        <!-- Card Fornecedores -->
        <div class="col-lg-4 col-md-6">
            <div class="stat-card primary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-label mb-2">Total de Fornecedores</p>
                        <h2 class="stat-value text-primary">{{ $totalFornecedores ?? 0 }}</h2>
                        <a href="{{ route('app.fornecedores') }}" class="btn btn-sm btn-outline-primary mt-2">
                            <i class="fas fa-eye me-1"></i>Ver todos
                        </a>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="fas fa-truck text-white"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Produtos -->
        <div class="col-lg-4 col-md-6">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-label mb-2">Total de Produtos</p>
                        <h2 class="stat-value text-success">{{ $totalProdutos ?? 0 }}</h2>
                        <a href="{{ route('app.produtos') }}" class="btn btn-sm btn-outline-success mt-2">
                            <i class="fas fa-eye me-1"></i>Ver todos
                        </a>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #56ab2f 0%, #a8e063 100%);">
                        <i class="fas fa-box text-white"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Clientes -->
        <div class="col-lg-4 col-md-6">
            <div class="stat-card danger">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-label mb-2">Total de Clientes</p>
                        <h2 class="stat-value text-danger">{{ $totalClientes ?? 0 }}</h2>
                        <a href="{{ route('app.clientes') }}" class="btn btn-sm btn-outline-danger mt-2">
                            <i class="fas fa-eye me-1"></i>Ver todos
                        </a>
                    </div>
                    <div class="stat-icon" style="background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);">
                        <i class="fas fa-users text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ações Rápidas -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-gradient text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-bolt me-2"></i>Ações Rápidas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('app.fornecedores.create') }}" class="btn btn-primary w-100 py-3">
                                <i class="fas fa-plus-circle fa-lg mb-2 d-block"></i>
                                Novo Fornecedor
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('app.produtos.create') }}" class="btn btn-success w-100 py-3">
                                <i class="fas fa-plus-circle fa-lg mb-2 d-block"></i>
                                Novo Produto
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('app.clientes.create') }}" class="btn btn-danger w-100 py-3">
                                <i class="fas fa-plus-circle fa-lg mb-2 d-block"></i>
                                Novo Cliente
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('app.produtos') }}" class="btn btn-info w-100 py-3">
                                <i class="fas fa-chart-bar fa-lg mb-2 d-block"></i>
                                Relatórios
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
