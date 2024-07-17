<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestión Documental</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Material Design Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    @yield('styles')
</head>

<body class="hold-transition login-page">
<div class="login-box">
   

    <div class="login-logo">
        <a href=""><img src="/images/login.png" alt="Logo"></a>
    </div>

    
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><b>SISTEMA DE GESTIÓN DOCUMENTAL</p>
            <p class="login-box-msg">INICIO DE SESIÓN </p>

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <label for="password">USUARIO</label>
                <div class="input-group mb-3">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Nombre de usuario" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <label for="password">CONTRASEÑA</label>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                {{-- Mensaje de error para las credenciales --}}
                @if (session('error'))
                    <div id="error-message" class="alert alert-warning" role="alert">
                        {{ session('error') }}
                    </div>
                    @php
                        session()->forget('error');
                    @endphp
                @endif
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script>
    // Se busca el elemento, si se encuentra se establace su estilo de visualizacion para ocutarlo despues de 5 segundos
    setTimeout(function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 5000);
</script>

</body>

</html>
