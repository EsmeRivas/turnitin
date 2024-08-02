@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">AMPAROS DIRECTOS</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="search" id="table_search_amparos_directos" oninput="searchTableAmpDir()" name="table_searchamparos_directos" class="form-control float-right" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: 400px">
                <table id="table_amparos_directos" class="table table-hover text-nowrap table-fixed">
                    <thead>
                    <tr>

                        <th>No. Toca</th>

                        <th>No. Proceso</th>

                        <th>No. Amparo</th>

                        <th>No. Oficio</th>
                        
                        <th>Colegiado</th>

                        <th>Quejoso</th>

                        <th>Estatus</th>

                        <th>Fecha de inicio</th>

                        <th>Fecha de resolucion</th>

                        <th>Termino</th>

                        <th></th>

                    </tr>
                    </thead>

                    <tbody>
                    @csrf
                    @foreach($amparos as $amparo)
                        <tr>
                            <td>{{$amparo->numero_toca}}</td>
                            <td>{{$amparo->numero_expediente}}</td>
                            <td>{{$amparo->numero_amparo}}</td>
                            <td>{{$amparo->numero_oficio}}</td>
                            <td>{{$amparo->colegiado}}</td>
                            <td>{{$amparo->quejoso}}</td>
                            <td>{{$amparo->status}}</td>
                            <td>{{$amparo->fecha_inicio_amparo}}</td>
                            <td>{{$amparo->fecha_resolucion_amparo}}</td>
                            <td>{{$amparo->termino}}</td>
                            <td>
                                @if ($amparo->termino < 16 && $amparo->termino >= 11)
                                    <span style="color: green; background-color: green;" class="badge rounded-pill">.</span>
                                @elseif ($amparo->termino < 11 && $amparo->termino >= 4)
                                    <span style="color: orange; background-color: orange;" class="badge rounded-pill">.</span>
                                @elseif ($amparo->termino <= 3)
                                    <span style="color: red; background-color: red;" class="badge rounded-pill">.</span>
                                @endif
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
                        <li class="page-item {{ $amparos->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ route('view.amparos.directo', ['pageDirectos' => $amparos->currentPage() - 1]) }}">Previous</a>
                        </li>
                
                        <!-- Números de página -->
                        @for ($i = 1; $i <= $amparos->lastPage(); $i++)
                            <li class="page-item {{ $amparos->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ route('view.amparos.directo', ['pageDirectos' => $i]) }}">{{ $i }}</a>
                            </li>
                        @endfor
                
                        <!-- Botón "Next" -->
                        <li class="page-item {{ $amparos->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ route('view.amparos.directo', ['pageDirectos' => $amparos->currentPage() + 1])}}">Next</a>
                        </li>
                        Showing {{ $amparos->firstItem() }} to {{ $amparos->lastItem() }} of {{ $amparos->total() }} registers
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
    
@endsection('content')
@section('scripts')
<script>
    function searchTableAmpDir() {
        var input = document.getElementById("table_search_amparos_directos");
        var filter = input.value.toUpperCase();
        var table = document.getElementById("table_amparos_directos");
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
<style>
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
    