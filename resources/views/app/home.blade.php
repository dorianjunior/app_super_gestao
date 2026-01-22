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
                        Olá, <strong>{{ auth()->user()->name }}</strong>!
                        @if(auth()->user()->isAdmin())
                            <span class="badge bg-danger ms-2">Administrador</span>
                        @elseif(auth()->user()->isGerente())
                            <span class="badge bg-warning ms-2">Gerente</span>
                        @else
                            <span class="badge bg-secondary ms-2">Usuário</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards de Estatísticas Principais -->
    <div class="row g-4 mb-4">
        <!-- Card Fornecedores -->
        <div class="col-lg-3 col-md-6">
            <div class="stat-card primary">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="stat-label mb-2">Fornecedores</p>
                        <h2 class="stat-value text-primary">{{ $totalFornecedores }}</h2>
                    </div>
                    <div class="stat-icon-small bg-primary bg-opacity-10">
                        <i class="fas fa-truck text-primary"></i>
                    </div>
                </div>
                <a href="{{ route('app.fornecedores') }}" class="btn btn-sm btn-outline-primary w-100">
                    <i class="fas fa-eye me-1"></i>Ver todos
                </a>
            </div>
        </div>

        <!-- Card Produtos -->
        <div class="col-lg-3 col-md-6">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="stat-label mb-2">Produtos</p>
                        <h2 class="stat-value text-success">{{ $totalProdutos }}</h2>
                    </div>
                    <div class="stat-icon-small bg-success bg-opacity-10">
                        <i class="fas fa-box text-success"></i>
                    </div>
                </div>
                <a href="{{ route('app.produtos') }}" class="btn btn-sm btn-outline-success w-100">
                    <i class="fas fa-eye me-1"></i>Ver todos
                </a>
            </div>
        </div>

        <!-- Card Clientes -->
        <div class="col-lg-3 col-md-6">
            <div class="stat-card danger">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="stat-label mb-2">Clientes</p>
                        <h2 class="stat-value text-danger">{{ $totalClientes }}</h2>
                    </div>
                    <div class="stat-icon-small bg-danger bg-opacity-10">
                        <i class="fas fa-users text-danger"></i>
                    </div>
                </div>
                <a href="{{ route('app.clientes') }}" class="btn btn-sm btn-outline-danger w-100">
                    <i class="fas fa-eye me-1"></i>Ver todos
                </a>
            </div>
        </div>

        <!-- Card Usuários -->
        <div class="col-lg-3 col-md-6">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="stat-label mb-2">Usuários</p>
                        <h2 class="stat-value text-warning">{{ $totalUsuarios }}</h2>
                    </div>
                    <div class="stat-icon-small bg-warning bg-opacity-10">
                        <i class="fas fa-user-shield text-warning"></i>
                    </div>
                </div>
                <span class="badge bg-warning bg-opacity-10 text-warning w-100 py-2">
                    <i class="fas fa-info-circle me-1"></i>Sistema
                </span>
            </div>
        </div>
    </div>

    <!-- Estatísticas Detalhadas -->
    <div class="row g-4 mb-4">
        <!-- Valor Total em Estoque -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">
                        <i class="fas fa-chart-line text-success me-2"></i>Estatísticas de Estoque
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-center border-end">
                            <p class="text-muted mb-2">Total em Estoque</p>
                            <h4 class="text-success mb-0">{{ number_format($totalEstoque, 0, ',', '.') }}</h4>
                            <small class="text-muted">unidades</small>
                        </div>
                        <div class="col-6 text-center">
                            <p class="text-muted mb-2">Valor Total</p>
                            <h4 class="text-primary mb-0">R$ {{ number_format($valorTotalEstoque, 2, ',', '.') }}</h4>
                            <small class="text-muted">estimado</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top 5 Fornecedores -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">
                        <i class="fas fa-trophy text-warning me-2"></i>Top 5 Fornecedores (Produtos)
                    </h6>
                </div>
                <div class="card-body">
                    @if($produtosPorFornecedor->count() > 0)
                        <ul class="list-unstyled mb-0">
                            @foreach($produtosPorFornecedor as $fornecedor)
                                <li class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                    <span><i class="fas fa-building text-muted me-2"></i>{{ $fornecedor->nome }}</span>
                                    <span class="badge bg-primary">{{ $fornecedor->produtos_count }} produtos</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted mb-0 text-center">Nenhum fornecedor com produtos cadastrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Relatórios Adicionais -->
    <div class="row g-4 mb-4">
        <!-- Clientes por Estado -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">
                        <i class="fas fa-map-marker-alt text-danger me-2"></i>Clientes por Estado
                    </h6>
                </div>
                <div class="card-body">
                    @if($clientesPorEstado->count() > 0)
                        @foreach($clientesPorEstado as $estado)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold">{{ $estado->uf }}</span>
                                <div class="d-flex align-items-center">
                                    <div class="progress me-2" style="width: 100px; height: 10px;">
                                        <div class="progress-bar bg-danger" style="width: {{ ($estado->total / $totalClientes) * 100 }}%"></div>
                                    </div>
                                    <span class="badge bg-danger">{{ $estado->total }}</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted mb-0 text-center">Sem dados</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Fornecedores por Estado -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">
                        <i class="fas fa-map-marked-alt text-primary me-2"></i>Fornecedores por Estado
                    </h6>
                </div>
                <div class="card-body">
                    @if($fornecedoresPorEstado->count() > 0)
                        @foreach($fornecedoresPorEstado as $estado)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold">{{ $estado->uf }}</span>
                                <div class="d-flex align-items-center">
                                    <div class="progress me-2" style="width: 100px; height: 10px;">
                                        <div class="progress-bar bg-primary" style="width: {{ ($estado->total / $totalFornecedores) * 100 }}%"></div>
                                    </div>
                                    <span class="badge bg-primary">{{ $estado->total }}</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted mb-0 text-center">Sem dados</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Últimos Clientes -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">
                        <i class="fas fa-user-plus text-success me-2"></i>Últimos Clientes
                    </h6>
                </div>
                <div class="card-body">
                    @if($ultimosClientes->count() > 0)
                        <ul class="list-unstyled mb-0">
                            @foreach($ultimosClientes as $cliente)
                                <li class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                    <div>
                                        <div class="fw-bold">{{ $cliente->nome }}</div>
                                        <small class="text-muted">{{ $cliente->cidade }} - {{ $cliente->uf }}</small>
                                    </div>
                                    <small class="text-muted">{{ $cliente->created_at->diffForHumans() }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted mb-0 text-center">Nenhum cliente cadastrado</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Ações Rápidas -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">
                        <i class="fas fa-bolt text-warning me-2"></i>Ações Rápidas
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('app.fornecedores.create') }}" class="btn btn-primary w-100 py-3">
                                <i class="fas fa-plus-circle fa-lg mb-2 d-block"></i>
                                Novo Fornecedor
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('app.produtos.create') }}" class="btn btn-success w-100 py-3">
                                <i class="fas fa-plus-circle fa-lg mb-2 d-block"></i>
                                Novo Produto
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('app.clientes.create') }}" class="btn btn-danger w-100 py-3">
                                <i class="fas fa-plus-circle fa-lg mb-2 d-block"></i>
                                Novo Cliente
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
