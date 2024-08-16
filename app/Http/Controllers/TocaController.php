<?php
namespace App\Http\Controllers;
use App\Models\Toca;
use App\Models\CtgMesa;
use App\Models\CtgArea;
use App\Models\CtgPonencia;
use App\Models\User;
use App\Models\CtgDelito;
use App\Models\Delito;
use App\Models\Distrito;
use App\Models\Parte;
use App\Models\Persona;
use App\Models\CtgApelo;
use App\Models\CtgVia;
use App\Models\CtgJuez;
use App\Models\PersonalAutorizado;
use App\Models\Observacion;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;

class TocaController extends Controller
{
    public function index()
    {
        $GET_TOCAS = 
        "select toc.id, toc.numero_toca, toc.numero_expediente, 
        	(select string_agg(concat(imp.nombre,' ',imp.apellido1,' ',imp.apellido2),', ') imputado
        	from partes prts
        	inner join personas imp on imp.id = prts.persona_id
        	where prts.ctg_tipo_parte_id = 2
        	and prts.toca_id = toc.id
        	limit 1),
        	(select string_agg(concat(vic.nombre,' ',vic.apellido1,' ',vic.apellido2),', ') victima
        	from partes prts
        	inner join personas vic on vic.id = prts.persona_id
        	where prts.ctg_tipo_parte_id = 1
        	and prts.toca_id = toc.id
        	limit 1),
        	string_agg(ctgDeli.nombre_delito, ', ') delito,
        	dist.nombre_distrito,
        	case when ctgvia.es_auto = true then 'AUTO' else 'SENTENCIA' end as via,
        	ctgapelos.nombre_tipo_apelo as tipoApelo,
        	ctgpon.nombre_ponencia as ponencia,
        	concat(pers.nombre, ' ', pers.apellido1, ' ', pers.apellido2) as ponente,
        	ctgmes.nombre_mesa as mesaAsignada,
            toc.status
        from tocas as toc
        inner join delitos as deli on deli.toca_id = toc.id
        inner join ctg_delitos as ctgDeli on ctgDeli.id = deli.ctg_delito_id
        inner join ctg_areas as ar on ar.id = toc.ctg_area_id
        inner join distritos as dist on dist.id = ar.distrito_id
        inner join ctg_vias as ctgvia on ctgvia.id = toc.ctg_via_id
        inner join ctg_apelos as ctgapelos on ctgapelos.id = toc.ctg_apelo_id
        inner join ctg_ponencias as ctgpon on ctgpon.id = toc.ctg_ponencia_id
        inner join ctg_ponentes as ctgPonentes on ctgPonentes.id = ctgpon.ctg_ponente_id
        inner join personas as pers on pers.id = ctgPonentes.persona_id
        inner join mesas as mes on mes.id = toc.mesa_id
        inner join ctg_mesas as ctgmes on ctgmes.id = mes.ctg_mesa_id
        group by toc.id, dist.nombre_distrito, ctgvia.es_auto, 
        	ctgapelos.nombre_tipo_apelo, ctgpon.nombre_ponencia,
        	pers.nombre, pers.apellido1, pers.apellido2, ctgmes.nombre_mesa";

        $items = collect(DB::select($GET_TOCAS));
        $page = request()->get('page', 1);
        $perPage = 15;
        $tocas = new LengthAwarePaginator($items->forPage($page, $perPage)->values(), $items->count(), $perPage, $page);

        return view('tocas.index', compact('tocas'));
    }

    public function create()
    {
        $mesas = CtgMesa::orderBy('id')->get();
        $areas = CtgArea::orderBy('id')->get();
        $ponencias = CtgPonencia::orderBy('id')->get();
        
        $delitos = CtgDelito::orderBy('nombre_delito')->get();
        $distritos = Distrito::orderBy('nombre_distrito')->get();
        $apelos = CtgApelo::orderBy('nombre_tipo_apelo')->get();
        $vias = CtgVia::orderBy('id')->get();
        $juez = CtgJuez::orderBy('id')->get();
        $user = User::orderby('id')->get();
        return view('tocas.create', compact('delitos','distritos','apelos','vias','ponencias','mesas','areas','juez','user'));
    }

    public function store(Request $request)
    {
        $idUserCookie = FacadesRequest::cookie('id_user');
        $apeloId = $request->tocaData['tocaInfo']['apelos'];
        $areaID = $request->tocaData['tocaInfo']['areaID'];
        $delitoID = $request->tocaData['tocaInfo']['delito'];
        $distrito = $request->tocaData['tocaInfo']['distrito'];
        $estatus = $request->tocaData['tocaInfo']['estatus'];
        $mesaID = $request->tocaData['tocaInfo']['mesaID'];
        $numeroExpediente = $request->tocaData['tocaInfo']['numeroExpediente'];
        $numeroToca = $request->tocaData['tocaInfo']['numeroToca'];
        $ponencia = $request->tocaData['tocaInfo']['ponencia'];
        $via = $request->tocaData['tocaInfo']['via'];
        $tipo = $request->tocaData['tocaInfo']['tipo'];
        $nombreJuez = $request->tocaData['tocaInfo']['nombreJuez'];
        $apellido1Juez = $request->tocaData['tocaInfo']['apellido1Juez'];
        $apellido2Juez = $request->tocaData['tocaInfo']['apellido2Juez'];
        $victimas = $request->tocaData['victimas'];
        $acusados = $request->tocaData['acusados'];
        $personalAutorizado = $request->tocaData['personalAutorizado'];
        
        #se crea la toca
        $toca = Toca::create([
            'numero_toca' => $numeroToca,
            'numero_expediente' => $numeroExpediente,
            'ctg_via_id' => $via,
            'ctg_apelo_id' => $apeloId,   
            'ctg_area_id' => $areaID,
            'mesa_id' => $mesaID,
            'user_id' => $idUserCookie,
            'status' => $estatus,
        ]);

        #SE CREA EL DELITO
        $delito = Delito::create([
            'ctg_delito_id' => $delitoID,
        ]);
        #se asocia el delito a la toca
        $delito->toca()->associate($toca->id);
        $delito->save();

        #SE CREA LA VICTIMA
        foreach ($victimas as $victima) {
            $victima = Persona::create([
                'nombre' => $victima['nombre'],
                'apellido1' => $victima['apellido1'],
                'apellido2' => $victima['apellido2'],
            ]);
    
            #se crea la parte victima y se asocia a la toca
            $parte_victima = Parte::create([
                'persona_id' => $victima->id,
                'toca_id' => $toca->id,
                'ctg_tipo_parte_id' => 2,
            ]);
    
            #se asocia la victima a la parte victima
            $victima->partes()->save($parte_victima);
            $victima->save();
        }
        
        #SE CREA EL ACUSADO
        foreach ($acusados as $acusado) {
            $acusado = Persona::create([
                'nombre' => $acusado['nombre'],
                'apellido1' => $acusado['apellido1'],
                'apellido2' => $acusado['apellido2'],
            ]);
    
            #se crea la parte acusado y se asocia a la toca
            $parte_acusado = Parte::create([
                'persona_id' => $acusado->id,
                'toca_id' => $toca->id,
                'ctg_tipo_parte_id' => 1,
            ]);

            #se asocia el acusado a la parte acusado
            $acusado->partes()->save($parte_acusado);
            $acusado->save();
        }

        // SE CREA EL JUEZ
        $juez = Persona::create([
            'nombre' => $nombreJuez,
            'apellido1' => $apellido1Juez,
            'apellido2' => $apellido2Juez,
        ]);
        
        $persona_juez = CtgJuez::create([
            'persona_id' => $juez->id
        ]);

        // Se guarda el nombre del Juez
        $juez->save();

        // Se guarda el id del nombre del juez en CtgJuez
        $persona_juez->save();

        $toca->ctg_juez()->associate($persona_juez->id);
        $toca->save();

        // SE CREA PERSONAL AUTORIZADO
        foreach ($personalAutorizado as $personaAutorizada) {
            $personalAutoriasoResult = PersonalAutorizado::create([
                'nombre' => $personaAutorizada['nombre'],
                'toca_id' => $toca->id
            ]);
        }

        # Se asocia la ponencia a la toca
        $toca->ctg_ponencia()->associate($ponencia);
        $toca->save();

        $observacion = Observacion::create([
            'observacion' => $estatus,
            'toca_id' => $toca->id
        ]);


        $mesas = CtgMesa::orderBy('id')->get();
        $areas = CtgArea::orderBy('id')->get();
        $ponencias = CtgPonencia::orderBy('id')->get();
        
        $delitos = CtgDelito::orderBy('nombre_delito')->get();
        $distritos = Distrito::orderBy('nombre_distrito')->get();
        $apelos = CtgApelo::orderBy('nombre_tipo_apelo')->get();
        $vias = CtgVia::orderBy('id')->get();
        $juez = CtgJuez::orderBy('id')->get();
        $user = User::orderby('id')->get();
        return view('tocas.create', compact('delitos','distritos','apelos','vias','ponencias','mesas','areas','juez','user'));
    }

    public function updatestatus(Request $request)
    {
        $status = $request->tocaInfo['status'];
        $numeroToca = $request->tocaInfo['numeroToca'];
        $idToca = $request->tocaInfo['idToca'];
        $fechaUpdate = date('Y-m-d H:i:s');

        $query = "UPDATE tocas SET status = ? WHERE numero_toca = ?;";

        $resultSetToca = DB::update($query, [$status, $numeroToca]);

        $queryObservaciones = "INSERT INTO observacions(observacion, updated_at, toca_id) VALUES (?, ?, ?);";
        
        $resultSetObservaciones = DB::insert($queryObservaciones, [$status, $fechaUpdate, $idToca]);

        return response()->json(['message' => 'Estatus actualizado'])
            ->header('Content-Type', 'application/json')
            ->setStatusCode(200);
    }

    public function updateStatusFinalizado(Request $request)
    {
        $status = $request->dataToca['status'];
        $numeroToca = $request->dataToca['numeroToca'];
        $idToca = $request->dataToca['idToca'];
        $fechaFinalizado = date('Y-m-d H:i:s');
        
        $query = "UPDATE tocas SET status = 'FINALIZADO', updated_at = ? WHERE numero_toca = ?;";

        $resultTocaFinalizado = DB::update($query, [$fechaFinalizado, $numeroToca]);

        $queryObservacion = "INSERT INTO observacions(observacion, updated_at, toca_id) VALUES ('FINALIZADO', ?, ?);";
        
        $resultSetObservacionesFin = DB::insert($queryObservacion, [$fechaFinalizado, $idToca]);

        return response()->json(['message' => 'Estatus de toca como Finalizado'])
            ->header('Content-Type', 'application/json')
            ->setStatusCode(200);
    }

    public function show($idToca)
    {
        $queryHistoricoStatus = "SELECT observacion, updated_at FROM observacions WHERE toca_id = ?;";
        
        $historialStatus = DB::select($queryHistoricoStatus, [$idToca]);
        
        return response()->json($historialStatus);
    }
    public function edit(string $id)
    {
    }
    public function update(Request $request, string $id)
    {
    }
    public function destroy(string $id)
    {
    }
}
