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
                    @foreach($tocas as $toca)
                        <tr>
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
                                <input type="text" id="status" name="status" value="{{ $toca->status }}" class="form-control" onblur="convertirMayusculas(this)" style="width: 200px">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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

</script>
@endsection('scripts')
