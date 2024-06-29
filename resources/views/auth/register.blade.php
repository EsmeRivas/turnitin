@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">REGISTRO DE USUARIO</h3>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif                                           
                <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <div class="card-header">
                    <h3 class="card-title">Datos Generales</h3>
                </div>
                <br>

                <label for="username">Nombre de usuario:</label>
                <div>
                    <input type="text" id="username" name="username" required class="form-control">
                </div>
                <label for="password">Contraseña:</label>
                <div>
                    <input type="password" id="password" name="password" required class="form-control">
                </div>
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <div>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
                </div>
                    
                <label for="rol_id">Asignar Rol del Usuario:</label><br>
                    <select id="rol_id" name="rol_id" class="form-control">
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                        @endforeach
                    </select><br>

                
                <label for="ctg_area_id">Área:</label>
                    <select id="ctg_area_id" name="ctg_area_id" required class="form-control">
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre_centro_trabajo }}</option>
                        @endforeach
                    </select>

                        <div class="card-header">
                            <h3 class="card-title">Información de la Persona</h3>
                        </div>
                        <br>

                        <label for="nombre">Nombre:</label>
                        <div>
                            <input type="text" id="nombre" name="nombre" required class="form-control" onblur="convertirMayusculas(this)">
                        </div>
                        <label for="apellido1">Primer Apellido:</label>
                        <div>
                            <input type="text" id="apellido1" name="apellido1" required class="form-control" onblur="convertirMayusculas(this)">
                        </div>
                        <label for="apellido2">Segundo Apellido:</label>
                        <div>
                            <input type="text" id="apellido2" name="apellido2" required class="form-control" onblur="convertirMayusculas(this)">
                        </div>
                        <label for="es_fisica">¿Es persona física?</label>
                        <div>
                            <select id="es_fisica" name="es_fisica" required class="form-control">
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        
                <br>
                <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                </form>     
                
            </div>
        </div>
    </div>
</div>
</html>

    <script>
        //convertir a mayúsculas el texto ingresado en formulario
        function convertirMayusculas(input) {
            input.value = input.value.toUpperCase();
        }
    </script>
    
    <script>
        //convertir a mayúsculas el texto ingresado en formulario
        function convertirMayusculas(input) {
            input.value = input.value.toUpperCase();
        }
    </script>
@endsection