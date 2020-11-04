<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI @yield('title')</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/56dc3e6550.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_demo.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_sections.css')}}">
</head>
<body>
    <div class="d-flex">
        <div id="sidebar-container" class="bg-primary">
            <div class="logo d-flex justify-content-center align-content-center">
                <a href="{{url('/')}}" class="navbar-brand justify-content-center">
                    <img src="{{asset('files/tnm.png')}}" alt="TNM logo">
                </a>
            </div>
            <div class="menu">
                <a href="{{url('/')}}" class="d-block text-light p-3"><i class="icon ion-md-home mr-2 lead"></i>Inicio</a>
                <a href="" class="d-block text-light p-3"><i class="icon ion-md-stats mr-2 lead"></i>Estadisticas</a>
                <a href="{{url('/admin/usuarios')}}" class="d-block text-light p-3"><i class="icon ion-md-people mr-2 lead"></i>Administrar Usuarios</a>
                <a href="{{url('/admin/rol')}}" class="d-block text-light p-3"><i class="icon ion-md-person mr-2 lead"></i>Administrar Roles</a>
                <a href="{{url('/admin/departamentos')}}" class="d-block text-light p-3"><i class="icon ion-md-list mr-2 lead"></i>Administrar Departamentos</a>
                <a href="{{url('/admin/carreras')}}" class="d-block text-light p-3"><i class="icon ion-md-school mr-2 lead"></i>Administrar Carreras</a>
                <a href="{{url('/admin/empresas')}}" class="d-block text-light p-3"><i class="icon ion-md-business mr-2 lead"></i>Administrar Empresas</a>
                <a href="{{url('/admin/solicitudes')}}" class="d-block text-light p-3"><i class="icon ion-md-document mr-2 lead"></i>Administrar Solicitudes</a>
                <a href="" class="d-block text-light p-3"><i class="icon ion-md-person mr-2 lead"></i>Pefil</a>
                <a href="" class="d-block text-light p-3"><i class="icon ion-md-settings mr-2 lead"></i>Configuración</a>
            </div>
        </div>

        <div class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <img src="" class="img-fluid rounded-circle mr-2 avatar" alt="">  
                         Christian
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="#">Configuracion</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Cerrar sesión</a>
                        </div>
                        </li>
                    </ul>
                    
                    </div>
                </div>
              </nav>

              
                @yield('content')
              
        </div>
        
    </div>
</body>
</html>