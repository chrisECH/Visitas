<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/56dc3e6550.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_login.css">

</head>
<body id="index-body"> 
    <div class="container index-container">
        <div class="row align-middle">
            <div class="col-md-4"> </div>
            <div class="col-md-4 col-sm-12 bg-light login-container">
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div id="login-title">
                        <div class="logo text-center">
                            <img src="files/tnm.png" alt="TNM Logo">
                        </div>
                        <p><i class="text-dark"><h3>Bienvenido al <span class="sgi">SGI</span></h3></i></p>
                        <h5>Ingrese sus datos de acceso</h5>
                        <br>
                    </div>
                    <p id="__mensaje"></p>
                    <div class="dropdown_diver"></div>
                    <div class="from-group">
                        <label for="exampleInputEmail1">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedat="emailHelp">
                    </div>
                    <div class="from-group">
                        <label for="exampleImputPassword1">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div id="btn-login">
                        <button type="submit" class="btn btn-primary btn-lg text-right active" role="button" aria-pressed="true">Ingresar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    
</body>
</html>