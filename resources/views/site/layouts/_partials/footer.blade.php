<footer class="footer-site">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-section">
                <h3><i class="fas fa-share-alt me-2"></i>Redes Sociais</h3>
                <p>Conecte-se conosco nas redes sociais</p>
                <div class="social-icons">
                    <img src="{{ asset('img/facebook.png') }}" alt="Facebook">
                    <img src="{{ asset('img/linkedin.png') }}" alt="LinkedIn">
                    <img src="{{ asset('img/youtube.png') }}" alt="YouTube">
                </div>
            </div>

            <div class="col-md-4 footer-section">
                <h3><i class="fas fa-phone-alt me-2"></i>Contato</h3>
                <p><i class="fas fa-phone me-2"></i>(11) 3333-4444</p>
                <p><i class="fas fa-envelope me-2"></i>supergestao@dominio.com.br</p>
                <p><i class="fas fa-clock me-2"></i>Seg - Sex: 8h às 18h</p>
            </div>

            <div class="col-md-4 footer-section">
                <h3><i class="fas fa-map-marker-alt me-2"></i>Localização</h3>
                <p>Florianópolis - SC, Brasil</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Super Gestão. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>
