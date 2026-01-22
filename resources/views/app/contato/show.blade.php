@extends('app.layouts.basico')

@section('titulo', 'Detalhes da Mensagem')

@section('conteudo')
    <!-- Botão Voltar -->
    <div class="mb-4">
        <a href="{{ route('app.contatos') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Voltar para Lista
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Card Principal da Mensagem -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-envelope-open-text me-2"></i>Mensagem de Contato
                    </h5>
                    <span class="badge bg-light text-dark">
                        ID: #{{ $contato->id }}
                    </span>
                </div>
                <div class="card-body">
                    <!-- Informações do Remetente -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-group">
                                <label><i class="fas fa-user me-2 text-primary"></i>Nome:</label>
                                <p class="fw-bold">{{ $contato->nome }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group">
                                <label><i class="fas fa-envelope me-2 text-primary"></i>E-mail:</label>
                                <p>
                                    <a href="mailto:{{ $contato->email }}" class="text-decoration-none">
                                        {{ $contato->email }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-group">
                                <label><i class="fas fa-phone me-2 text-primary"></i>Telefone:</label>
                                <p>
                                    <a href="tel:{{ $contato->telefone }}" class="text-decoration-none">
                                        {{ $contato->telefone }}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group">
                                <label><i class="fas fa-tag me-2 text-primary"></i>Motivo:</label>
                                <p>
                                    @if($contato->motivo_contato == 1)
                                        <span class="badge bg-primary">
                                            <i class="fas fa-question-circle me-1"></i>Dúvida
                                        </span>
                                    @elseif($contato->motivo_contato == 2)
                                        <span class="badge bg-success">
                                            <i class="fas fa-smile me-1"></i>Elogio
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="fas fa-exclamation-triangle me-1"></i>Reclamação
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Mensagem -->
                    <div class="info-group">
                        <label><i class="fas fa-comment-dots me-2 text-primary"></i>Mensagem:</label>
                        <div class="message-content p-3 bg-light rounded">
                            {{ $contato->mensagem }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ações -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-cog me-2"></i>Ações</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2">
                        <a href="mailto:{{ $contato->email }}?subject=Re: Contato - Super Gestão"
                           class="btn btn-success">
                            <i class="fas fa-reply me-2"></i>Responder por E-mail
                        </a>
                        <a href="tel:{{ $contato->telefone }}" class="btn btn-info">
                            <i class="fas fa-phone me-2"></i>Ligar
                        </a>
                        <form action="{{ route('app.contatos.destroy', $contato->id) }}"
                              method="POST"
                              style="display: inline;"
                              onsubmit="return confirm('Tem certeza que deseja excluir esta mensagem?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-2"></i>Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar com Informações Adicionais -->
        <div class="col-lg-4">
            <!-- Status -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Status da Mensagem</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('app.contatos.updateStatus', $contato->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Status Atual:</label>
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="novo" {{ $contato->status === 'novo' ? 'selected' : '' }}>
                                    🆕 Novo
                                </option>
                                <option value="lido" {{ $contato->status === 'lido' ? 'selected' : '' }}>
                                    👁️ Lido
                                </option>
                                <option value="respondido" {{ $contato->status === 'respondido' ? 'selected' : '' }}>
                                    ✅ Respondido
                                </option>
                            </select>
                        </div>
                    </form>

                    <div class="info-group mt-3">
                        <label><i class="fas fa-calendar me-2"></i>Recebido em:</label>
                        <p>{{ $contato->created_at->format('d/m/Y') }}</p>
                        <small class="text-muted">{{ $contato->created_at->format('H:i:s') }}</small>
                    </div>

                    <div class="info-group mt-3">
                        <label><i class="fas fa-clock me-2"></i>Há:</label>
                        <p>{{ $contato->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Links Rápidos -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-link me-2"></i>Links Rápidos</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="https://wa.me/55{{ preg_replace('/\D/', '', $contato->telefone) }}"
                           target="_blank"
                           class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                        <button onclick="copyEmail()" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-copy me-2"></i>Copiar E-mail
                        </button>
                        <button onclick="copyPhone()" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-copy me-2"></i>Copiar Telefone
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .info-group {
        margin-bottom: 1rem;
    }

    .info-group label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        display: block;
    }

    .info-group p {
        margin-bottom: 0;
        font-size: 1rem;
    }

    .message-content {
        white-space: pre-wrap;
        word-wrap: break-word;
        font-size: 1rem;
        line-height: 1.6;
        border: 1px solid #dee2e6;
    }

    .card {
        border: none;
    }

    .card-header {
        font-weight: 600;
    }
</style>
@endsection

@section('scripts')
<script>
    function copyEmail() {
        const email = "{{ $contato->email }}";
        navigator.clipboard.writeText(email).then(() => {
            alert('E-mail copiado: ' + email);
        });
    }

    function copyPhone() {
        const phone = "{{ $contato->telefone }}";
        navigator.clipboard.writeText(phone).then(() => {
            alert('Telefone copiado: ' + phone);
        });
    }
</script>
@endsection
