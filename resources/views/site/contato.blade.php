@extends('site.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')
    <section class="content-page">
        <div class="container">
            <div class="page-title">
                <h1><i class="fas fa-envelope me-3"></i>Entre em Contato Conosco</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="content-box">
                        @if(session('success'))
                            <div class="alert alert-success alert-modern" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-modern" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <strong>Atenção!</strong> Corrija os erros abaixo:
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @component('site.layouts._components.form_contato', ['classe' => 'form-modern'])
                            <div class="alert alert-info alert-modern mb-4">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Informação:</strong> Nossa equipe analisará sua mensagem e retornará o mais brevemente possível.
                                <br>
                                <small>Tempo médio de resposta: 48 horas</small>
                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('site.layouts._partials.footer')
@endsection
