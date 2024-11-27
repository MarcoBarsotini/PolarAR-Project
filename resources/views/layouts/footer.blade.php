<style>
    .footer {
        background-color: #111827;
        color: white;
        padding: 20px 0;
        text-align: center;

        & a {
            color: #adb5bd;
            text-decoration: none;
        }
        & a:hover {
            color: white;
        }
    }
    .content-section {
        padding: 60px 0;

        & h2 {
            margin-bottom: 30px;
        }
    }
</style>
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 PolarAR. Todos os direitos reservados.</p>
        <p><a href="{{ route('terms.termos_servico') }}">Termos de Serviço</a> | <a href="{{ route('terms.politica_privacidade') }}">Política de Privacidade</a></p>
    </div>
</footer>