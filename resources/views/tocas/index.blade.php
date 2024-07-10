@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TOCAS</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>No.Toca</th>

                        <th>No.Proceso<br>(expediente)</th>

                        <th>Imputado(encontra de)</th>

                        <th>Victima(s)</th>

                        <th>Delito(s)</th>

                        <th>Distrito</th>

                        <th>Via</th>

                        <th>Tipo</th>

                        <th>Apeló</th>

                        <th>Ponencia</th>

                        <th>Ponente</th>

                        <th>Mesa Asignada</th>                       
                        


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($tocas as $toca)
                        <tr>
                            <td>{{$toca->numero_toca}}</td>

                            <td>{{$toca->numero_expediente}}</td>

                            <!--Captura de partes-->
                                @foreach($toca->partes as $parte)
                            <td> 
                                {{ $parte->persona->nombre }} {{$parte->persona->apellido1}} {{$parte->persona->apellido2}}
                            </td>
                                @endforeach
                            <!--Aquí termina-->
                            
                            <td>
                                @foreach($toca->delitos as $delito)
                                    {{$delito->ctg_delito->nombre_delito}}
                                @endforeach
                            </td>
                             
                            <!--pendiente que muestre el distrito CORRECTO-->
                            <!-- En el archivo index.blade.php -->
                            <td>{{ $toca->ctg_area->distrito->nombre_distrito ?? '' }}</td>

                            <td>@if($toca->ctg_via && $toca->ctg_via->es_auto == 1)
                                AUTO
                            @else
                                SENTENCIA
                            @endif
                            </td>

                            <td>{{$toca->numero_toca}}</td>

                            <td>{{ $toca->ctg_apelo->nombre_tipo_apelo ?? '' }}</td>


                            <td>{{ $toca->ctg_ponencia->nombre_ponencia ?? '' }}</td>
                            <!--no muestra el nombre del ponente-->
                            <td>{{ $toca->ctg_ponencia->nombre_ponencia ?? '' }}</td>

                            <td>{{ $toca->mesa->nombre_mesa ?? '' }}</td>


                            

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
</script>
@endsection('scripts')
