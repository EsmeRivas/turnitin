@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TOCAS</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="search" id="table_search" oninput="searchTable()" name="table_search" class="form-control float-right" placeholder="Search">
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0" style="height: 400px">
                <table id="my_table" class="table table-hover text-nowrap table-fixed">
                    <thead>
                    <tr>
                        <th></th>

                        <th>No.Toca</th>

                        <th>No.Proceso<br>(expediente)</th>

                        <th>Imputado(en contra de)</th>

                        <th>Victima(s)</th>

                        <th>Delito(s)</th>

                        <th>Distrito</th>

                        <th>Via</th>

                        <th>Tipo</th>

                        <th>Apeló</th>

                        <th>Ponencia</th>

                        <th>Ponente</th>

                        <th>Mesa Asignada</th>                       
                        
                        <th>Status</th>

                    </tr>
                    </thead>

                    <tbody>
                    @csrf
                    @foreach($tocas as $toca)
                        <tr>
                            <td>
                                <button id='{{$toca->numero_toca}}' value="{{ $toca->status }}" 
                                    type='button' class='btn btn-success toca-finalizado btn-sm' 
                                    data-bs-toggle="tooltip" title="Finalizar toca" onclick="updateStatusTocaFinalizado(event, this)"
                                    @if ($toca->status == 'FINALIZADO')
                                        @disabled(true)
                                    @endif>
                                    <i id='{{$toca->numero_toca}}' class="fas fa-check toca-finalizado"></i>
                                </button>
                                <button id="{{$toca->id}}" data-id='{{$toca->numero_toca}}' type='button' 
                                    class='btn btn-warning registrar-amparo btn-sm' data-bs-toggle="tooltip" 
                                    title="Registrar amparo" data-toggle="modal"  onclick="abrirModal(event, this)"
                                    @if ($toca->status == 'FINALIZADO')
                                        @disabled(true)
                                    @endif>
                                    <i id="{{$toca->id}}" data-id='{{$toca->numero_toca}}' class="fas fa-file registrar-amparo"></i>
                                </button>
                            </td>
                            <td>{{$toca->numero_toca}}</td>
                            <td>{{$toca->numero_expediente}}</td>
                            <td class="ajuste-texto">{{$toca->imputado}}</td>
                            <td class="ajuste-texto">{{$toca->victima}}</td>
                            <td>{{$toca->delito}}</td>
                            <td>{{$toca->nombre_distrito}}</td>
                            <td>{{$toca->via}}</td>
                            <td>{{$toca->numero_toca}}</td>
                            <td>{{$toca->tipoapelo}}</td>
                            <td>{{$toca->ponencia}}</td>
                            <td>{{$toca->ponente}}</td>
                            <td>{{$toca->mesaasignada}}</td>
                            {{-- <td>{{$toca->status}}</td> --}}
                            {{-- <td>{{ print_r($toca) }}</td> --}}
                            <td>
                                <input type="text" id="{{$toca->numero_toca}}" name="status" 
                                    value="{{ $toca->status }}" class="form-control" onblur="convertirMayusculas(this)" 
                                    style="width: 200px" onkeyup="actualizarStatusToca(event, this)"
                                    @if ( $toca->status == 'FINALIZADO' )
                                        @disabled(true)
                                    @endif>
                                </input>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                
            </div>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- Botón "Previous" -->
                        <li class="page-item {{ $tocas->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $tocas->previousPageUrl() }}">Previous</a>
                        </li>
                
                        <!-- Números de página -->
                        @for ($i = 1; $i <= $tocas->lastPage(); $i++)
                            <li class="page-item {{ $tocas->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $tocas->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                
                        <!-- Botón "Next" -->
                        <li class="page-item {{ $tocas->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $tocas->nextPageUrl() }}">Next</a>
                        </li>
                        Showing {{ $tocas->firstItem() }} to {{ $tocas->lastItem() }} of {{ $tocas->total() }} registers
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal" id="modal-nuevo-amparo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Encabezado del modal -->
                    <div class="modal-header">
                      <h5 class="modal-title" id="titulo-modal-nuevo-amparo"></h5>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Contenido del modal -->
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="toca_id">Toca ID</label>
                            <input id="toca_id" type="text" class="form-control" placeholder="Toca ID" name="toca_id" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tipo_amparo">Tipo de amparo</label>
                            <select id="tipo_amparo" name="tipo_amparo" class="form-control">
                                <option value="0" disabled selected>Seleccione una opción</option>
                                <option value="1">Directo</option>
                                <option value="2">Indirecto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="num_amparo">No de Amparo</label>
                            <input id='num_amparo' type="text" class="form-control" id="numero_amparo" placeholder="Escribe el numero de amparo" name="numero_amparo">
                        </div>
                        <div class="form-group">
                            <label for="num_oficio">No de Oficio</label>
                            <input id='num_oficio' type="text" class="form-control" id="numero_oficio" placeholder="Escribe el numero de oficio" name="numero_oficio">
                        </div>
                        <div class="form-group">
                            <label for="colegiado">Colegiado</label>
                            <input id="colegiado" type="text" class="form-control" id="input-colegiado" placeholder="Escribe el colegiado" name="colegiado">
                        </div>
                        <div class="form-group">
                            <label for="quejoso">Quejoso</label>
                            <input id="quejoso_nombre" type="text" class="form-control" placeholder="Nombre" name="quejoso-nombre">
                            <input id="quejoso_apellido1" type="text" class="form-control mt-2" placeholder="Apellido paterno" name="quejoso_apellido1">
                            <input id="quejoso_apellido2" type="text" class="form-control mt-2" placeholder="Apellido materno" name="quejoso_apellido2">
                        </div>
                        <div class="form-group">
                            <label for="termino">Fecha de termino</label>
                            <span class="badge badge-success badge-pill">Vence al rededor de 15 días</span>
                            <span class="badge badge-warning badge-pill">Vence al rededor de 10 días</span>
                            <span class="badge badge-danger badge-pill">Vence al rededor de 3 días</span>
                            <input type="date" class="form-control" id="input-termino" name="termino">
                        </div>
                        <div class="form-group">
                            <label for="resolucion">Resolución</label>
                            <select id="resolucion" name="resolucion" class="form-control">
                                <option value="0" disabled selected>Seleccione una opción</option>
                                <option value="1">Se concede</option>
                                <option value="2">Se niega</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha-resolucion">Fecha en que se dicta la resolución</label>
                            <input type="date" class="form-control" id="fecha-resolucion" name="fecha-resolucion">
                        </div>
                    </div>
                    <!-- Pie del modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button id="btn-registrar-amparo" type="button" class="btn btn-primary">
                            <span id="spinnerCreateAmparo" class="spinner-border spinner-border-sm" aria-hidden="true" style="display: none"></span>
                            <span role="status">Registrar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
@section('scripts')
<script>

    //convertir a mayúsculas el texto ingresado en formulario
    function convertirMayusculas(input) {
        input.value = input.value.toUpperCase();
    }

    //Funcion para el input de buscar en la tabla de tocas
    function searchTable() {
      var input = document.getElementById("table_search");
      var filter = input.value.toUpperCase();
      var table = document.getElementById("my_table");
      var rows = table.getElementsByTagName("tr");
      
      for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var found = false;
        
        for (var j = 0; j < cells.length; j++) {
          var cell = cells[j];
          
          if (cell) {
            var text = cell.textContent || cell.innerText;
            
            if (text.toUpperCase().indexOf(filter) > -1) {
              found = true;
              break;
            }
          }
        }
        
        if (found) {
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
      }
    }

    function actualizarStatusToca(event, input) {
        if (event.keyCode === 13) {
            event.preventDefault();
            const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content')
            
            const numeroToca = input.id
            const status = input.value

            const tocaInfo = {
                numeroToca: numeroToca,
                status: status
            }

            fetch('/updatestatus', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ tocaInfo })
            })
            .then(response => {
                if (response.status === 200) {
                    window.location.href = '/'
                }
            })
        }
    }

    function updateStatusTocaFinalizado(event, input) {
        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content')
        
        const numeroToca = input.id
        const status = input.value

        // console.log(input.id, 'numero toca');

        const dataToca = {
            numeroToca: numeroToca,
            status: status
        }

        fetch('/updateStatusFinalizado', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ dataToca })
        })
        .then(response => {
            if (response.status === 200) {
                window.location.href = '/'
            }
        })
    }

    function abrirModal(event, input) {
        const modalNuevoAmparo = document.getElementById('modal-nuevo-amparo')
        const numeroToca = event.target.getAttribute('data-id')
        const tituloModal = document.getElementById('titulo-modal-nuevo-amparo')

        tituloModal.textContent = 'Nuevo amparo - No. Toca ' + numeroToca

        // seccion para limpiar campos del formulario
        const tocaIDInput = document.getElementById('toca_id')
        const tipoAmparoSelector = document.getElementById('tipo_amparo')
        const numAmparoInput = document.getElementById('num_amparo')
        const numOficioInput = document.getElementById('num_oficio')
        const colegiadoInput = document.getElementById('colegiado')
        const nombreQuejosoInput = document.getElementById('quejoso_nombre')
        const apellido1QuejosoInput = document.getElementById('quejoso_apellido1')
        const apellido2QuejosoInput = document.getElementById('quejoso_apellido2')
        const fechaTerminoInput = document.getElementById('input-termino')
        const resolucionInput = document.getElementById('resolucion')
        const fechaResolucionInput = document.getElementById('fecha-resolucion')

        const tocaID = event.target.getAttribute('id')

        tocaIDInput.value = tocaID
        tipoAmparoSelector.selectedIndex = 0
        numAmparoInput.value = ''
        numOficioInput.value = ''
        colegiadoInput.value = ''
        nombreQuejosoInput.value = ''
        apellido1QuejosoInput.value = ''
        apellido2QuejosoInput.value = ''
        fechaTerminoInput.value = ''
        resolucionInput.selectedIndex = 0
        fechaResolucionInput.value = ''

        // Funcionalidad para solo habilitar los primeros 15 dias despues del actual para seleccionar
        var fechaTermino = document.getElementById('input-termino')
        var fechaActual = new Date()

        var fechaLimite = new Date(fechaActual.getFullYear(), fechaActual.getMonth(), fechaActual.getDate() + 15)

        var fechaLimiteFormateada = fechaLimite.toISOString().split('T')[0]

        fechaTermino.min = fechaActual.toISOString().split('T')[0]
        fechaTermino.max = fechaLimiteFormateada

        // seccion para mostrar modal
        let modal = new bootstrap.Modal(modalNuevoAmparo)
        modal.show()
    }

    document.getElementById('btn-registrar-amparo').addEventListener('click', function() {
        const btnRegistrarAmparo = document.getElementById('btn-registrar-amparo')
        const spinnerCreateAmparo = document.getElementById('spinnerCreateAmparo')
        spinnerCreateAmparo.style.display = 'inline-block'
        btnRegistrarAmparo.disabled = true
        
        // obtengo los datos del formulario
        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content')
        const tocaIdInput = document.getElementById('toca_id')
        const tipoAmparoInput = document.getElementById('tipo_amparo')
        const numeroAmparoInput = document.getElementById('num_amparo')
        const numeroOficioInput = document.getElementById('num_oficio')
        const colegiadoInput = document.getElementById('colegiado')
        const quejosoNombreInput = document.getElementById('quejoso_nombre')
        const quejosoApellido1Input = document.getElementById('quejoso_apellido1')
        const quejosoApellido2Input = document.getElementById('quejoso_apellido2')
        const inputTermino = document.getElementById('input-termino')
        const resolucionInput = document.getElementById('resolucion')
        const fechaResolucionInput = document.getElementById('fecha-resolucion')

        const tocaID = tocaIdInput.value
        const tipoAmparo = tipoAmparoInput.value
        const numeroAmparo = numeroAmparoInput.value
        const numeroOficio = numeroOficioInput.value
        const colegiado = colegiadoInput.value
        const quejosoNombre = quejosoNombreInput.value
        const quejosoApellido1 = quejosoApellido1Input.value
        const quejosoApellido2 = quejosoApellido2Input.value
        const termino = inputTermino.value
        const resolucion = resolucionInput.value
        const fechaResolucion = fechaResolucionInput.value

        const amparoData =
        {
            tocaID: tocaID,
            tipoAmparo: tipoAmparo, 
            numeroAmparo: numeroAmparo, 
            numeroOficio: numeroOficio,
            colegiado: colegiado, 
            quejosoNombre: quejosoNombre,
            quejosoApellido1: quejosoApellido1,
            quejosoApellido2: quejosoApellido2,
            termino: termino,
            resolucion: resolucion,
            fechaResolucion: fechaResolucion
        }

        const modalNuevoAmparo = document.getElementById('modal-nuevo-amparo')
        const modalBackground = document.querySelector('.modal-backdrop')

        fetch('/amparo/api/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ amparoData })
        }).then(response => {
            if (response.status === 200) {
                toastr.options = {
                    "progressBar": true,
                    "closeButton": true
                }
                toastr.success("Se ha registrado el amparo", '', {timeOut: 7000})

                spinnerCreateAmparo.style.display = 'none'
                btnRegistrarAmparo.disabled = false

                tipoAmparoInput.selectedIndex = 0
                numeroAmparoInput.value = ''
                numeroOficioInput.value = ''
                colegiadoInput.value = ''
                quejosoNombreInput.value = ''
                quejosoApellido1Input.value = ''
                quejosoApellido2Input.value = ''
                inputTermino.value = ''
                resolucionInput.selectedIndex = 0
                fechaResolucionInput.value = ''

                modalNuevoAmparo.style.display = 'none'
                modalBackground.style.display = 'none'
            }
        })
    })

</script>
@endsection('scripts')
<style>
.ajuste-texto {
    white-space: wrap !important;
}
/* Fixear los headers*/
.table-fixed thead {
    position: sticky;
    top: 0;
    z-index: 1;
    background-color: #f0f0f0;
}
/* Estilos personalizados para la paginación */
.pagination {
display: flex;
justify-content: center;
align-items: center;
list-style: none;
padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 5px 10px;
    text-decoration: none;
    color: #333;
}

.pagination .active a {
    background-color: #007bff;
    color: white;
}

.pagination .disabled span {
    opacity: 0.5;
}
</style>
