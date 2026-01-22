@extends('site.layouts.basico')

@section('titulo', 'Home')
@section('conteudo')
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="hero-content">
                        <h1>Sistema Super Gestão</h1>
                        <p>Software para gestão empresarial ideal para sua empresa</p>

                        <div class="feature-item">
                            <img src="{{ asset('img/check.png') }}" alt="Check">
                            <span>Gestão completa e descomplicada</span>
                        </div>
                        <div class="feature-item">
                            <img src="{{ asset('img/check.png') }}" alt="Check">
                            <span>Sua empresa na nuvem</span>
                        </div>

                        <div class="video-preview mt-4">
                            <img src="{{ asset('img/player_video.jpg') }}" alt="Vídeo" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-card">
                        <h2><i class="fas fa-envelope-open-text me-2"></i>Entre em Contato</h2>
                        <p>Caso tenha qualquer dúvida, entre em contato com nossa equipe pelo formulário abaixo.</p>
                        @component('site.layouts._components.form_contato', ['classe' => 'form-modern'])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('site.layouts._partials.footer')
@endsection
