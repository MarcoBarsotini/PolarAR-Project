<header class="header" data-header>
    <div class="container">
        <a href="{{ route('dashboard') }}" class="text-white">
            Polar AR
        </a>
        <nav class="navbar" data-navbar>
            <ul class="navbar-list">
            <li class="navbar-item">
                <a href="#home" class="navbar-link hover-underline active">
                    <div class="separator"></div>
                    <span class="span">Home</span>
                </a>
            </li>
            <li class="navbar-item">
                <a href="{{ route('catalogo.index') }}" class="navbar-link hover-underline">
                    <div class="separator"></div>
                    <span class="span">Serviços</span>
                </a>
            </li>
            <li class="navbar-item">
                <a href="#about" class="navbar-link hover-underline">
                    <div class="separator"></div>
                    <span class="span">Saiba Mais</span>
                </a>
            </li>
            <li class="navbar-item">
                <a href="{{ route('contato') }}" class="navbar-link hover-underline">
                    <div class="separator"></div>
                    <span class="span">Contato</span>
                </a>
            </li>
            </ul>
        </nav>
        <a href="{{ route('login') }}" class="btn btn-secondary">
            <span class="text text-1">Entrar</span>
            <span class="text text-2" aria-hidden="true">Entrar</span>
        </a>
    </div>
</header>