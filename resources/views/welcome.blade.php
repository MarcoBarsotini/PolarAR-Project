<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PolarArcondicionados</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">

        <!-- Fontes (Google) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body id="top">
        @include('layouts.home.home_header')

        <div class="preload" data-preaload>
            <div class="circle"></div>
            <p class="text">Polar Arcondicionados</p>
        </div>

        <main>
            <article>
                <section class="hero text-center" aria-label="home" id="home">
                    <ul class="hero-slider" data-hero-slider>
                        <li class="slider-item active" data-hero-slider-item>
                            <div class="slider-bg">
                                <img src="#" width="1880" height="950" alt="" class="img-cover">
                            </div>
                            <p class="label-2 section-subtitle slider-reveal">Polar Arcondicionados</p>
                            <h1 class="display-1 hero-title slider-reveal">Manutenção</h1>
                            <p class="body-2 hero-text slider-reveal">Profissionais de Excelência.</p>
                            <a href="{{ route('catalogo.index') }}" class="btn btn-primary slider-reveal">
                                <span class="text text-1">Ver Profissionais</span>
                                <span class="text text-2" aria-hidden="true">Ver Profissionais</span>
                            </a>
                        </li>

                        <li class="slider-item" data-hero-slider-item>
                            <div class="slider-bg">
                                <img src="#" width="1880" height="950" alt="" class="img-cover">
                            </div>
                            <p class="label-2 section-subtitle slider-reveal">Polar Arcondicionados</p>
                            <h1 class="display-1 hero-title slider-reveal">Compra de Equipamentos</h1>
                            <p class="body-2 hero-text slider-reveal">Compra segura e rápida de equipamentos para sua casa!</p>
                            <a href="{{ route('manutencao') }}" class="btn btn-primary slider-reveal">
                                <span class="text text-1">Ver Produtos</span>
                                <span class="text text-2" aria-hidden="true">Ver Produtos</span>
                            </a>
                        </li>

                        <li class="slider-item" data-hero-slider-item>
                            <div class="slider-bg">
                                <img src="#" width="1880" height="950" alt="" class="img-cover">
                            </div>
                            <p class="label-2 section-subtitle slider-reveal">Polar Arcondicionados</p>
                            <h1 class="display-1 hero-title slider-reveal">Qualidade</h1>
                            <p class="body-2 hero-text slider-reveal">Fim da preocupação ao procurar bons profissionais.</p>
                            <a href="{{ route('catalogo.index') }}" class="btn btn-primary slider-reveal">
                                <span class="text text-1">Ver Profissionais</span>
                                <span class="text text-2" aria-hidden="true">Ver Profissionais</span>
                            </a>
                        </li>
                    </ul>

                    <button class="slider-btn prev" aria-label="slide to previous" data-prev-btn>
                        <ion-icon name="chevron-back"></ion-icon>
                    </button>

                    <button class="slider-btn next" aria-label="slide to next" data-next-btn>
                        <ion-icon name="chevron-forward"></ion-icon>
                    </button>

                </section>
            </article>
        </main>

        <!-- Back To Top -->
        <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
            <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
        </a>

        @include('layouts.home.home_footer')

        <!-- Links Bootstrap e Icons -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <script src="{{ asset('js/home.js') }}"></script>
    </body>
</html>
