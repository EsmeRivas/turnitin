@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">REGISTRO DE TOCA</h3>
                </div>
                
                <div class="card-body p-0">
                    <div class="bs-stepper linear">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#informacion_toca">
                                <button type="button" class="step-trigger" role="tab"
                                        aria-controls="informacion_toca"
                                        id="informacion_toca-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Toca</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#informacion_partes">
                                <button type="button" class="step-trigger" role="tab"
                                        aria-controls="informacion_partes"
                                        id="informacion_partes-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Partes</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#informacion_general">
                                <button type="button" class="step-trigger" role="tab"
                                        aria-controls="informacion_general"
                                        id="informacion_general-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">General</span>
                                </button>
                            </div>
                        </div>
                        <form method="post" action="{{route('view.toca.store')}}">
                            @csrf
                            <!--PASO 1-->
                            <div class="bs-stepper-content">
                                <div id="informacion_toca" class="content" role="tabpanel"
                                     aria-labelledby="informacion_toca-trigger" >
                                     
                                    <div class="form-group">
                                    <label for="num_toca">Numero de Toca</label>
                                    <input type="text" class="form-control" id="numero_toca"
                                    placeholder="Introduce el numero de la toca" name="numero_toca">
                                    </div>

                                    <div class="form-group">
                                    <label for="num_proceso">Numero de proceso (expediente)</label>
                                    <input type="text" class="form-control" id="numero_expediente"
                                    placeholder="Introduce el numero de expediente" name="numero_expediente">
                                    </div>
                                    

                                    <div class="form-group">
                                    <label for="mesa_id">¿A que mesa se asignará?</label>
                                    <select id="mesa_id" name="mesa_id" class="form-control">
                                    <option value="" disabled selected>Seleccione una opción</option>
                                        @foreach($mesas as $mesa)
                                            <option value="{{$mesa->id}}">{{$mesa->nombre_mesa}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="mesa_id">¿A que area se asignará?</label>
                                    <select id="ctg_area_id" name="ctg_area_id" required class="form-control">
                                    <option value="" disabled selected>Seleccione una opción</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->nombre_centro_trabajo }}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="ponencias"> ¿A qué ponencia pertenece? </label>
                                    <select id="ponencias" name="ponencias" class="form-control" required>
                                    <option value="" disabled selected>Seleccione una opción</option>
                                        @foreach($ponencias as $ponencia)
                                            <option value="{{$ponencia->id}}">{{$ponencia->nombre_ponencia}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <button type="button" class="btn btn-primary" onclick="stepper.next()">Siguiente
                                    </button>  
                                </div>
                                <!--PASO 2-->
                                <div id="informacion_partes" class="content" role="tabpanel"
                                     aria-labelledby="informacion_partes-trigger">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4>IMPUTADO (EN CONTRA DE):</h4>
                                            <div class="form-group clearfix">
                                                <label for="nombre_acusado">Nombre Acusado</label>
                                                <input id="nombre_acusado" type="text" class="form-control"
                                                       name="nombre_acusado" onblur="convertirMayusculas(this)">
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="apellido1_acusado">Primero apellido</label>
                                                <input id="apellido1_acusado" type="text" class="form-control"
                                                       name="apellido1_acusado" onblur="convertirMayusculas(this)">
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="apellido2_acusado">Segundo apellido</label>
                                                <input id="apellido2_acusado" type="text" class="form-control"
                                                       name="apellido2_acusado" onblur="convertirMayusculas(this)">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>VICTIMA</h4>
                                            <div class="form-group clearfix">
                                                <label for="nombre_victima">Nombre victima</label>
                                                <input id="nombre_victima" type="text" class="form-control"
                                                       name="nombre_victima" onblur="convertirMayusculas(this)">
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="apellido1_victima">Primer apellido</label>
                                                <input id="apellido1_victima" type="text" class="form-control"
                                                       name="apellido1_victima" onblur="convertirMayusculas(this)">
                                            </div>
                                            <div class="form-group clearfix">
                                                <label for="apellido2_victima">Segundo apellido</label>
                                                <input id="apellido2_victima" type="text" class="form-control"
                                                       name="apellido2_victima" onblur="convertirMayusculas(this)">
                                            </div>
                                        </div>  
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="stepper.previous()">
                                        Anterior
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="stepper.next()">Siguiente
                                    </button>
                                </div>
                                <div id="informacion_general" class="content" role="tabpanel"
                                     aria-labelledby="informacion_general-trigger">

                                    <!--PASO 3-->
                                    <div class="form-group">
                                        <label for="delitos"> Tipo de Delito</label>
                                        <select id="delitos" name="delitos" class="form-control" required>
                                            @foreach($delitos as $delito)
                                                <option value="{{$delito->id}}">{{$delito->nombre_delito}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="distrito">Distrito</label>
                                        <select id="distrito" class="form-control" name="distrito" required>
                                        <option value="" disabled selected>Seleccione una opción</option>
                                            @foreach($distritos as $distrito)
                                                <option
                                                    value="{{$distrito->id}}">{{$distrito->nombre_distrito}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="vias"> ¿Qué vía es? </label>
                                    <select id="vias" name="vias" class="form-control" required>
                                    <option value="" disabled selected>Seleccione una opción</option>
                                        @foreach($vias as $via)
                                            <option value="{{$via->id}}">{{$via->es_auto ? 'AUTO' : 'SENTENCIA'}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="apelos"> ¿Quien apeló? </label>
                                        <select id="apelos" name="apelos" class="form-control" required>
                                        <option value="" disabled selected>Seleccione una opción</option>
                                            @foreach($apelos as $apelo)
                                                <option value="{{$apelo->id}}">{{$apelo->nombre_tipo_apelo}}</option>
                                            @endforeach
                                        </select>
                                    </div>          
                                    
                                    <label for="personal_autorizado">Añadir personal autorizado</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-success"><i
                                                    class="fas fa-plus"></i> Agregar
                                            </button>
                                        </div>
                                        <input id="personal_autorizado" type="text" name="personal_autorizado"
                                               class="form-control">
                                    </div>                                   

                                    <button type="button" class="btn btn-primary" onclick="stepper.previous()">
                                        Anterior
                                    </button>
                                    <button type="submit" class="btn btn-primary">Registrar Toca</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))

            $('.select2').select2()
        })
    </script>

    <script>
        //convertir a mayúsculas el texto ingresado en formulario
        function convertirMayusculas(input) {
            input.value = input.value.toUpperCase();
        }
    </script>
@endsection
