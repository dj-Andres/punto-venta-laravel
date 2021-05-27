    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Punto de Venta</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!---Estilos del graficos--->
        <link rel="stylesheet" href="{{asset('css/Chart.min.css')}}">
        <!---Estilos del pagima de compras--->
        <link rel="stylesheet" href="{{asset('css/compra.css')}}">
        
        <link rel="shortcut icon" href="{{asset('img/LogoSample_ByTailorBrands.ico')}}" type="image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
        <!---sweetaler2---->
        <link rel="stylesheet" href="{{asset('css/sweetalert2.css')}}">
        <!---selecet2---->
        <link rel="stylesheet" href="{{asset('css/select2.css')}}">
        <!---datepicker---->
        <link rel="stylesheet" href="{{asset('css/jquery-ui-1.9.2.custom.min.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            @include('layout.partials.navegacion')

            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        @yield('contenido')
                    </div>
                </section>

            @include('layout.partials.footer')    
            
            @include('layout.partials.js')
            
    </body>

    </html>
