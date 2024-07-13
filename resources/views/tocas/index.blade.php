@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TOCAS</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="search" name="table_search" class="form-control float-right" placeholder="Search">
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
                            <td>{{$toca->imputado}}</td>
                            <td>{{$toca->victima}}</td>
                            <td>{{$toca->delito}}</td>
                            <td>{{$toca->nombre_distrito}}</td>
                            <td>{{$toca->via}}</td>
                            <td>{{$toca->numero_toca}}</td>
                            <td>{{$toca->tipoapelo}}</td>
                            <td>{{$toca->ponencia}}</td>
                            <td>{{$toca->ponente}}</td>
                            <td>{{$toca->mesaasignada}}</td>
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
