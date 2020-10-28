<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI | @yield('title')</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/56dc3e6550.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_admin.css')}}">
</head>
<body>
    <header>
        <nav class="navbar bd-navbar navbar-expand-lg navbar-light shadow">
            <a href="{{url('/admin')}}" class="navbar-brand">
                <img src="{{asset('files/tnm.png')}}" alt="TNM logo">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/usuarios')}}">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/rol')}}">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/departamentos')}}">Departamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/carreras')}}">Carreras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/empresas')}}">Empresas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/solicitudes')}}">Solicitudes</a>
                    </li>
                </ul>

                <ul class="navbar-nav" id="sign-out-btn">
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesión" ><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <span class="text-muted">&copy;  <strong>ITMorelia | TNM</strong></span>
        </div>
    </footer>
</body>
</html>