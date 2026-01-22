@extends('site.layouts.basico')

@section('titulo', 'Sobre')

@section('conteudo')
    <section class="content-page">
        <div class="container">
            <div class="page-title">
                <h1><i class="fas fa-info-circle me-3"></i>Sobre o Super Gestão</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="content-box">
                        <div class="text-center mb-4">
                            <i class="fas fa-building" style="font-size: 4rem; color: #007bff;"></i>
                        </div>

                        <h3 class="text-center mb-4" style="color: #495057;">Olá, eu sou o Super Gestão</h3>

                        <p class="lead text-center" style="font-size: 1.1rem; line-height: 1.8; color: #6c757d;">
                            O Super Gestão é o sistema online de controle administrativo que pode transformar e potencializar os negócios da sua empresa.
                        </p>

                        <p class="text-center" style="font-size: 1.1rem; line-height: 1.8; color: #6c757d;">
                            Desenvolvido com a mais alta tecnologia para você cuidar do que é mais importante: <strong>seus negócios!</strong>
                        </p>

                        <div class="row mt-5">
                            <div class="col-md-4 text-center mb-4">
                                <i class="fas fa-chart-line" style="font-size: 3rem; color: #28a745;"></i>
                                <h5 class="mt-3">Crescimento</h5>
                                <p style="color: #6c757d;">Aumente seus resultados</p>
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <i class="fas fa-shield-alt" style="font-size: 3rem; color: #007bff;"></i>
                                <h5 class="mt-3">Segurança</h5>
                                <p style="color: #6c757d;">Seus dados protegidos</p>
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <i class="fas fa-clock" style="font-size: 3rem; color: #ffc107;"></i>
                                <h5 class="mt-3">Eficiência</h5>
                                <p style="color: #6c757d;">Economize tempo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('site.layouts._partials.footer')
@endsection
