<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Punto de Venta</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <header>
            <nav>
                <div class="containerLinks">
                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/home') }}" class="butones">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Acceder</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrar</a>
                            @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </nav>
        </header>
        <main>
            <div class="containerHeader">
                <div id="particles-js"></div>
                <div class="containerMain contanedor">
                    <div class="item">
                        <h1>Sistema de Punto de Venta</h1>
                        <p>
                           El sistema está realizado con el Framework Laravel 8 y el SGBD MySQL los modulos que tiene que son:
                           Gestión de Usuarios,Gestión de Ventas,Gestión de Ingresos, Gestión de Categorias. 
                        </p>
                        <button>Saber Más</button>
                    </div>
                    <div class="item">
                        <img src="img/undraw_profile_image_re_ic2f.svg" alt="" srcset="">
                    </div>
                </div>
            </div>
        </main>

        <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script src="{{ asset('js/main.js')}}"></script>
    </body>
</html>
