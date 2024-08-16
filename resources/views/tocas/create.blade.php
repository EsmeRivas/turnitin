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
                        <div class="bs-stepper-content">
                            @csrf
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
                                            <label for="apellido1_acusado">Primer apellido</label>
                                            <input id="apellido1_acusado" type="text" class="form-control"
                                                   name="apellido1_acusado" onblur="convertirMayusculas(this)">
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="apellido2_acusado">Segundo apellido</label>
                                            <input id="apellido2_acusado" type="text" class="form-control"
                                                   name="apellido2_acusado" onblur="convertirMayusculas(this)">
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button id="btn-agregar-acusado" type="button" class="btn btn-success">AGREGAR</button>
                                        </div>
                                        <div class="table-responsive p-0 mt-2">
                                            <table class="table table-hover text-nowrap" id="itemsTableAcusado">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Nombre acusado</th>
                                                        <th>Primer apellido</th>
                                                        <th>Segundo apellido</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body-table-acusados">
                                                </tbody>
                                            </table>
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
                                        <div class="d-flex justify-content-end">
                                            <button id="btn-agregar-victimas" type="button" class="btn btn-success">AGREGAR</button>
                                        </div>
                                        <div class="table-responsive p-0 mt-2">
                                            <table class="table table-hover text-nowrap" id="itemsTableVictimas">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Nombre victima</th>
                                                        <th>Primer apellido</th>
                                                        <th>Segundo apellido</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body-table-victimas">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>  
                                </div>
                                <button type="button" class="btn btn-primary" onclick="stepper.previous()">
                                    Anterior
                                </button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Siguiente
                                </button>
                            </div>
                            <!--PASO 3-->
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
                                    <label for="tipo"> Tipo de vía </label>
                                    <select id="tipo" name="tipo" class="form-control" required>
                                        <option value="" disabled selected>Seleccione una opción</option>
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
                                
                                <div class="form-group clearfix">
                                    {{-- <label for="juez">Nombre Juez</label> --}}
                                    <div class="form-group clearfix">
                                        <label for="nombre_juez">Nombre Juez</label>
                                        <input id="nombre_juez" type="text" class="form-control"
                                               name="nombre_juez" onblur="convertirMayusculas(this)">
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="apellido1_juez">Primer apellido</label>
                                        <input id="apellido1_juez" type="text" class="form-control"
                                               name="apellido1_juez" onblur="convertirMayusculas(this)">
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="apellido2_juez">Segundo apellido</label>
                                        <input id="apellido2_juez" type="text" class="form-control"
                                               name="apellido2_juez" onblur="convertirMayusculas(this)">
                                    </div>
                                </div>
                                
                                <label for="personal_autorizado">Añadir personal autorizado</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button id="btn-agregar-personalautorizado" type="button" class="btn btn-success"><i
                                                class="fas fa-plus"></i> Agregar
                                        </button>
                                    </div>
                                    <input id="nombre-personal-autorizado" type="text" name="personal_autorizado"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <div class="list-group" id="body-table-personalautorizado">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.previous()">
                                    Anterior
                                </button>
                                <button id="btn-registrar-toca" class="btn btn-primary">
                                    <span id="spinnerCreateToca" class="spinner-border spinner-border-sm" aria-hidden="true" style="display: none"></span>
                                    <span role="status">Registrar Toca</span>
                                </button>
                            </div>
                        </div>
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
        /* Tipo de via*/
        document.getElementById('vias').addEventListener('change', function() {
            var tipoVia = document.getElementById('tipo');
            tipoVia.innerHTML = '<option value="" disabled selected>Seleccione una opción</option>';

            if (this.value !== '') {
                var selectedOption = this.options[this.selectedIndex];
                var esAuto = selectedOption.text === 'AUTO';

                if (esAuto) {
                    tipoVia.add(new Option('De forma prision', 'forma_prision'));
                    tipoVia.add(new Option('Vinculación a Proceso', 'vinculacion'));
                    tipoVia.add(new Option('No Vinculación a Proceso', 'no_vinculacion'));
                } else {
                    tipoVia.add(new Option('Condenatoria', 'condenatoria'));
                    tipoVia.add(new Option('Absolutoria', 'absoluto'));
                }
            }
        });

        // {{-- Acusados --}}
        let acusados = []
        let contadorAcusados = 0

        function renderTableAcusados(acusados) {
            const tableBody = document.getElementById('body-table-acusados');
            tableBody.innerHTML = ''; // Limpiar el contenido existente

            acusados.forEach(acusado => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><button data-id='${acusado.id}' type='button' class='btn btn-danger delete-btn-acusado btn-sm'><i data-id='${acusado.id}' class="fas fa-solid fa-trash delete-btn-acusado"></i></button></td>
                    <td>${acusado.nombre}</td>
                    <td>${acusado.apellido1}</td>
                    <td>${acusado.apellido2}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Renderizado inicial de la tabla
        document.addEventListener('DOMContentLoaded', () => {
            renderTableAcusados(acusados);
            document.querySelector('#itemsTableAcusado').addEventListener('click', handleDeleteAcusadoClick);
        });

        // event listener para agregar nuevos acusados a la tabla
        document.getElementById('btn-agregar-acusado').addEventListener('click', function() {
            // declaracion del nuevo acusado
            const nombreInput = document.getElementById('nombre_acusado')
            const apellido1Input = document.getElementById('apellido1_acusado')
            const apellido2Input = document.getElementById('apellido2_acusado')

            const nombre = nombreInput.value
            const apellido1 = apellido1Input.value
            const apellido2 = apellido2Input.value
            contadorAcusados++
            const nuevoAcusado = {id: contadorAcusados, nombre: nombre, apellido1: apellido1, apellido2: apellido2}

            acusados.push(nuevoAcusado)
            // Crea una nueva fila
            const tableBody = document.getElementById('body-table-acusados');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><button data-id='${nuevoAcusado.id}' type='button' class='btn btn-danger delete-btn-acusado btn-sm'><i data-id='${nuevoAcusado.id}' class="fas fa-solid fa-trash delete-btn-acusado"></i></button></td>
                <td>${nuevoAcusado.nombre}</td>
                <td>${nuevoAcusado.apellido1}</td>
                <td>${nuevoAcusado.apellido2}</td>
            `;
            tableBody.appendChild(newRow);

            // limpiamos los valores del formulario
            nombreInput.value = ''
            apellido1Input.value = ''
            apellido2Input.value = ''
        });

        function handleDeleteAcusadoClick(event) {
            if (!event.target.classList.contains('delete-btn-acusado')) return;
            const id = event.target.getAttribute('data-id');

            const row = event.target.closest('tr');
            row.remove();
        }

        // {{-- Victimas --}}
        let victimas = []
        let contadorVictimas = 0

        function renderTableVictimas(victimas) {
            const tableBody = document.getElementById('body-table-victimas');
            tableBody.innerHTML = ''; // Limpiar el contenido existente

            victimas.forEach(victima => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><button data-id='${victima.id}' id='btn-delete-victima-0' type='button' class='btn btn-danger btn-sm delete-btn-victima'><i data-id='${victima.id}' class="fas fa-solid fa-trash delete-btn-victima"></i></button></td>
                    <td>${victima.nombre}</td>
                    <td>${victima.apellido1}</td>
                    <td>${victima.apellido2}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Renderizado inicial de la tabla
        document.addEventListener('DOMContentLoaded', () => {
            renderTableVictimas(victimas);
            document.querySelector('#itemsTableVictimas').addEventListener('click', handleDeleteVictimaClick);
        });

        // event listener para agregar nuevos acusados a la tabla
        document.getElementById('btn-agregar-victimas').addEventListener('click', function() {
            // declaracion del nuevo acusado
            const nombreInput = document.getElementById('nombre_victima')
            const apellido1Input = document.getElementById('apellido1_victima')
            const apellido2Input = document.getElementById('apellido2_victima')

            const nombre = nombreInput.value
            const apellido1 = apellido1Input.value
            const apellido2 = apellido2Input.value
            contadorVictimas++
            const nuevaVictima = {id: contadorVictimas, nombre: nombre, apellido1: apellido1, apellido2: apellido2}

            victimas.push(nuevaVictima)
            // Crea una nueva fila
            const tableBody = document.getElementById('body-table-victimas');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><button data-id='${nuevaVictima.id}' type='button' class='btn btn-danger btn-sm delete-btn-victima'><i data-id='${nuevaVictima.id}' class="fas fa-solid fa-trash delete-btn-victima"></i></button></td>
                <td>${nuevaVictima.nombre}</td>
                <td>${nuevaVictima.apellido1}</td>
                <td>${nuevaVictima.apellido2}</td>
            `;
            tableBody.appendChild(newRow);

            // limpiamos los valores del formulario
            nombreInput.value = ''
            apellido1Input.value = ''
            apellido2Input.value = ''
        });

        // eliminar victima
        function handleDeleteVictimaClick(event) {
            if (!event.target.classList.contains('delete-btn-victima')) return;
            const id = event.target.getAttribute('data-id');

            const row = event.target.closest('tr');
            row.remove();
        }

        // {{-- Personal autorizado --}}
        let personalAutorizado = []
        let contadorPersonalAutorizado = 0

        function renderPersonalAutorizado(personalAutorizado) {
            const tableBody = document.getElementById('body-table-personalautorizado');
            tableBody.innerHTML = ''; // Limpiar el contenido existente

            personalAutorizado.forEach(persona => {
                const row = document.createElement('div')
                row.innerHTML = `
                    <a class="list-group-item list-group-item-action" aria-current="true">
                        <button data-id='1' type='button' class='btn btn-danger btn-sm delete-btn-personalautorizado'><i data-id='1' class="fas fa-solid fa-trash delete-btn-personalautorizado"></i></button>
                        ${persona.nombre}
                    </a>
                `;
                tableBody.appendChild(row);
            });
        }

        // Renderizado inicial de la tabla
        document.addEventListener('DOMContentLoaded', () => {
            renderPersonalAutorizado(personalAutorizado);
            document.querySelector('#body-table-personalautorizado').addEventListener('click', handleDeletePersonalAutorizadoClick);
        });

        // event listener para agregar nuevos acusados a la tabla
        document.getElementById('btn-agregar-personalautorizado').addEventListener('click', function() {
            // declaracion del nuevo acusado
            const inputNombrePersonalAutorizado = document.getElementById('nombre-personal-autorizado')

            const nombrePersonalAutorizado = inputNombrePersonalAutorizado.value
            contadorPersonalAutorizado++
            const nuevoPersonalAutorizado = {id: contadorPersonalAutorizado, nombre: nombrePersonalAutorizado}

            personalAutorizado.push(nuevoPersonalAutorizado)
            // Crea una nueva fila
            const tableBody = document.getElementById('body-table-personalautorizado');
            const newRow = document.createElement('div');
            newRow.innerHTML = `
                <a class="list-group-item list-group-item-action" aria-current="true">
                    <button data-id='${nuevoPersonalAutorizado.id}' type='button' class='btn btn-danger btn-sm delete-btn-personalautorizado'><i data-id='${nuevoPersonalAutorizado.id}' class="fas fa-solid fa-trash delete-btn-personalautorizado"></i></button>
                    ${nuevoPersonalAutorizado.nombre}
                </a>
            `;
            tableBody.appendChild(newRow);

            // limpiamos los valores del formulario
            inputNombrePersonalAutorizado.value = ''
        });
        
        // eliminar personal autorizado
        function handleDeletePersonalAutorizadoClick(event) {
            if (!event.target.classList.contains('delete-btn-personalautorizado')) return;
            const id = event.target.getAttribute('data-id');

            const row = event.target.closest('div'); 
            row.remove();
        }

        // REGISTRAR TOCA
        document.getElementById('btn-registrar-toca').addEventListener('click', function() {
            const btnCreateToca = document.getElementById('btn-registrar-toca')
            const spinnerCreateToca = document.getElementById('spinnerCreateToca')
            btnCreateToca.disabled = true
            spinnerCreateToca.style.display = 'inline-block'

            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content')
            
            const inputNumeroToca = document.getElementById('numero_toca')
            const inputNumeroExpediente = document.getElementById('numero_expediente')
            const inputMesaID = document.getElementById('mesa_id')
            const inputAreaID = document.getElementById('ctg_area_id')
            const inputPonencias = document.getElementById('ponencias')
            const inputDelito = document.getElementById('delitos')
            const inputDistrito = document.getElementById('distrito')
            const inputVia = document.getElementById('vias')
            const inputTipo = document.getElementById('tipo')
            const inputJuez = document.getElementById('nombre_juez')
            const inputApellido1Juez = document.getElementById('apellido1_juez')
            const inputApellido2Juez = document.getElementById('apellido2_juez')
            const inputApelos = document.getElementById('apelos')

            const numeroToca = inputNumeroToca.value
            const numeroExpediente = inputNumeroExpediente.value
            const mesaID = inputMesaID.value
            const areaID = inputAreaID.value
            const ponencia = inputPonencias.value
            const delito = inputDelito.value
            const distrito = inputDistrito.value
            const via = inputVia.value
            const tipo = inputTipo.value
            const nombreJuez = inputJuez.value
            const apellido1Juez = inputApellido1Juez.value
            const apellido2Juez = inputApellido2Juez.value
            const apelos = inputApelos.value

            const tocaData = 
            {
                acusados: acusados,
                victimas: victimas,
                personalAutorizado: personalAutorizado,
                tocaInfo: 
                {
                    numeroToca: numeroToca,
                    numeroExpediente: numeroExpediente,
                    mesaID: mesaID,
                    areaID: areaID,
                    ponencia: ponencia,
                    delito: delito,
                    distrito: distrito,
                    via: via,
                    tipo: tipo,
                    nombreJuez: nombreJuez,
                    apellido1Juez: apellido1Juez,
                    apellido2Juez: apellido2Juez,
                    apelos: apelos,
                    estatus: 'EN PROCESO'
                }
            }

            fetch('/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ tocaData })
            })
            .then(response => {
                if (response.status === 200) {
                    toastr.options = {
                        "progressBar": true,
                        "closeButton": true
                    }
                    toastr.success("Se ha registrado el amparo", '', {timeOut: 7000})

                    btnCreateToca.disabled = false
                    spinnerCreateToca.style.display = 'none'
                    window.location.href = '/'
                }
            })
        })
    </script>

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
