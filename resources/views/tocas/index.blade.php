@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TOCAS</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="search" id="table_search" oninput="searchTable()" name="table_search" class="form-control float-right" placeholder="Search">
                        <i class="fas fa-search"></i>
                        <div class="input-group-append">
                            
                            {{-- <button type="submit" onclick="searchTable()" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table id="my_table" class="table table-hover text-nowrap">
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
                                <button data-id='' type='button' class='btn btn-success toca-finalizado btn-sm' data-bs-toggle="tooltip" title="Finalizar toca">
                                    <i data-id='' class="fas fa-check toca-finalizado"></i>
                                </button>
                                <button data-id='' type='button' class='btn btn-warning registrar-amparo btn-sm' data-bs-toggle="tooltip" title="Registrar amparo" data-toggle="modal" data-target="#miModal">
                                    <i data-id='' class="fas fa-file registrar-amparo"></i>
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
                                <input type="text" id="{{$toca->numero_toca}}" name="status" value="{{ $toca->status }}" class="form-control" onblur="convertirMayusculas(this)" style="width: 200px" onkeyup="actualizarStatusToca(event, this)">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal" id="miModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Encabezado del modal -->
                    <div class="modal-header">
                      <h5 class="modal-title">Nuevo amparo - Toca No. 1</h5>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Contenido del modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="num_amparo">No de Amparo</label>
                            <input type="text" class="form-control" id="numero_amparo" placeholder="Escribe el numero de amparo" name="numero_amparo">
                        </div>
                        <div class="form-group">
                            <label for="num_oficio">No de Oficio</label>
                            <input type="text" class="form-control" id="numero_oficio" placeholder="Escribe el numero de oficio" name="numero_oficio">
                        </div>
                        <div class="form-group">
                            <label for="colegiado">Colegiado</label>
                            <input type="text" class="form-control" id="input-colegiado" placeholder="Escribe el colegiado" name="colegiado">
                        </div>
                        <div class="form-group">
                            <label for="quejoso">Quejoso</label>
                            <select id="mesa_id" name="mesa_id" class="form-control">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="1">Jose Alexis Vazquez Morales</option>
                                <option value="2">Gloria Romo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="termino">Fecha de termino</label>
                            <span class="badge badge-success badge-pill">Vence al rededor de 15 días</span>
                            <span class="badge badge-warning badge-pill">Vence al rededor de 10 días</span>
                            <span class="badge badge-danger badge-pill">Vence al rededor de 3 días</span>
                            <input type="date" class="form-control" id="input-termino" name="termino">
                        </div>
                    </div>
                    <!-- Pie del modal -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
@section('scripts')
<script>
    // Obtener la fecha actual y agregar 15 días
    var fechaActual = new Date();
    fechaActual.setDate(fechaActual.getDate() + 15);
    
    // Formatear la fecha en el formato requerido por el input de tipo date
    var yyyy = fechaActual.getFullYear();
    var mm = String(fechaActual.getMonth() + 1).padStart(2, '0');
    var dd = String(fechaActual.getDate()).padStart(2, '0');
    var fechaLimite = yyyy + '-' + mm + '-' + dd;
    
    // Establecer el límite mínimo y máximo del input de tipo date
    document.getElementById('input-termino').min = fechaLimite;
    document.getElementById('input-termino').max = fechaLimite;

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

</script>
@endsection('scripts')
