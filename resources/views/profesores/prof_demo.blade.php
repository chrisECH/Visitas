<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI @yield('title')</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/56dc3e6550.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
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
                <a href="{{route('profe.index')}}" class="navbar-brand justify-content-center">
                    <img src="{{asset('files/tnm.png')}}" alt="TNM logo">
                </a>
            </div>
            <div class="menu">
                <a href="{{route('profe.index')}}" class="d-block text-light p-3"><i class="icon ion-md-home mr-2 lead"></i>Inicio</a>
                <a href="{{route('profe.perfil',Auth::user()->id)}}" class="d-block text-light p-3"><i class="icon ion-md-contact mr-2 lead"></i>Pefil</a>
                <a href="{{route('profe.crear_solicitud')}}" class="d-block text-light p-3"><i class="icon ion-md-document mr-2 lead"></i>Crear Solicitud</a>
                <a href="{{route('profe.status_solicitud')}}" class="d-block text-light p-3"><i class="icon ion-md-document mr-2 lead"></i>Consultar estado de solicitudes</a>
                <a href="{{route('profe.solicitudes')}}" class="d-block text-light p-3"><i class="icon ion-md-document mr-2 lead"></i>Ver solicitudes creadas</a>
                <a href="{{route('profe.editarPerfil',Auth::user()->id)}}" class="d-block text-light p-3"><i class="icon ion-md-settings mr-2 lead"></i>Editar perfil</a>
                <a href="{{route('usuario.logout')}}" class="d-block text-light p-3"><i class="icon ion-md-arrow-back mr-2 lead"></i>Cerrar sesiòn</a>
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
                            
                            <img src="{{asset('files/no-photo.png')}}" class="img-fluid rounded-circle mr-2 avatar" alt="">  
                            {{auth()->user()->nombre}}</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Inicio</a>
                                <a class="dropdown-item" href="{{route('profe.perfil',Auth::user()->id)}}">Perfil</a>
                                <a class="dropdown-item" href="{{route('profe.crear_solicitud')}}">Crear solicitud</a>
                                <a class="dropdown-item" href="{{route('profe.status_solicitud')}}">Consultar estado de solicitudes</a>
                                <a class="dropdown-item" href="{{route('profe.solicitudes')}}">Ver solicitudes creadas</a>
                                
                                <a class="dropdown-item" href="{{route('profe.editarPerfil',Auth::user()->id)}}">Editar perfil</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{route('user.logout')}}">
                                    @csrf
                                    <button class="dropdown-item" >Cerrar sesión</button>
                                </form>
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