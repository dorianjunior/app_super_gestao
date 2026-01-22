@extends('app.layouts.basico')

@section('titulo', 'Mensagens de Contato')

@section('conteudo')
    <!-- Estatísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stat-card stat-card-warning">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-details">
                    <h3>{{ $totalNovos }}</h3>
                    <p>Mensagens Novas</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card stat-card-info">
                <div class="stat-icon">
                    <i class="fas fa-inbox"></i>
                </div>
                <div class="stat-details">
                    <h3>{{ $contatos->total() }}</h3>
                    <p>Total de Mensagens</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtros e Ações -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <button class="btn btn-outline-secondary" onclick="selectAll()">
                <i class="fas fa-check-double me-2"></i>Selecionar Tudo
            </button>
            <button class="btn btn-outline-danger" onclick="deleteSelected()">
                <i class="fas fa-trash me-2"></i>Excluir Selecionados
            </button>
        </div>
    </div>

    <!-- Tabela de Contatos -->
    <div class="table-wrapper">
        <form id="deleteMultipleForm" action="{{ route('app.contatos.destroyMultiple') }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px;">
                                <input type="checkbox" id="selectAllCheckbox" onclick="toggleAll(this)">
                            </th>
                            <th style="width: 80px;">Status</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th style="width: 130px;">Telefone</th>
                            <th>Motivo</th>
                            <th style="width: 150px;">Data</th>
                            <th style="width: 150px;" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contatos as $contato)
                            <tr class="{{ $contato->status === 'novo' ? 'table-warning' : '' }}">
                                <td>
                                    <input type="checkbox" name="ids[]" value="{{ $contato->id }}" class="contact-checkbox">
                                </td>
                                <td>
                                    @if($contato->status === 'novo')
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-star me-1"></i>Novo
                                        </span>
                                    @elseif($contato->status === 'lido')
                                        <span class="badge bg-info">
                                            <i class="fas fa-eye me-1"></i>Lido
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>Respondido
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $contato->nome }}</strong>
                                </td>
                                <td>
                                    <a href="mailto:{{ $contato->email }}" class="text-decoration-none">
                                        <i class="fas fa-envelope me-1"></i>{{ $contato->email }}
                                    </a>
                                </td>
                                <td>
                                    <a href="tel:{{ $contato->telefone }}" class="text-decoration-none">
                                        <i class="fas fa-phone me-1"></i>{{ $contato->telefone }}
                                    </a>
                                </td>
                                <td>
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
                                </td>
                                <td>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $contato->created_at->format('d/m/Y H:i') }}
                                    </small>
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('app.contatos.show', $contato->id) }}"
                                           class="btn btn-info btn-sm"
                                           title="Visualizar">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-danger btn-sm"
                                                title="Excluir"
                                                onclick="deleteContact({{ $contato->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="table-empty-state">
                                        <i class="fas fa-inbox"></i>
                                        <p>Nenhuma mensagem de contato recebida.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <!-- Paginação -->
    @if($contatos->hasPages())
        <div class="pagination-wrapper">
            {{ $contatos->links() }}
        </div>
    @endif
@endsection

@section('scripts')
<script>
    function toggleAll(source) {
        const checkboxes = document.querySelectorAll('.contact-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = source.checked;
        });
    }

    function selectAll() {
        const checkboxes = document.querySelectorAll('.contact-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = true;
        });
        document.getElementById('selectAllCheckbox').checked = true;
    }

    function deleteSelected() {
        const checkboxes = document.querySelectorAll('.contact-checkbox:checked');
        if (checkboxes.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Atenção!',
                text: 'Selecione pelo menos uma mensagem para excluir.',
                confirmButtonColor: '#ffc107'
            });
            return;
        }

        Swal.fire({
            title: 'Tem certeza?',
            text: `Você está prestes a excluir ${checkboxes.length} mensagem(ns). Esta ação não poderá ser revertida!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteMultipleForm').submit();
            }
        });
    }

    function deleteContact(id) {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta mensagem será excluída permanentemente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Criar formulário dinâmico para exclusão
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/app/contatos/${id}`;

                // Token CSRF
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);

                // Method DELETE
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
