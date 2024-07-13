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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

class TocaController extends Controller
{
    public function index()
    {
        $GET_TOCAS = 
        "select toc.id, toc.numero_toca, toc.numero_expediente, 
        	(select CONCAT(imp.nombre,' ',imp.apellido1,' ',imp.apellido2) imputado
        	from partes prts
        	inner join personas imp on imp.id = prts.persona_id
        	where prts.ctg_tipo_parte_id = 2
        	and prts.toca_id = toc.id
        	limit 1),
        	(select CONCAT(vic.nombre,' ',vic.apellido1,' ',vic.apellido2) victima
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
        	ctgmes.nombre_mesa as mesaAsignada
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

        $tocas = DB::select($GET_TOCAS);

        $usernameCookie = FacadesRequest::cookie('username');

        if ($usernameCookie === '' || $usernameCookie === null)
        {
            return redirect('/login');
        }

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
        $user = User::orderby('id')->get();
        return view('tocas.create', compact('delitos','distritos','apelos','vias','ponencias','mesas','areas','user'));
    }

    public function store(Request $request)
    {
        $idUserCookie = FacadesRequest::cookie('id_user');

        #se crea la toca
        $toca = Toca::create([
            'numero_toca' => $request->numero_toca,
            'numero_expediente' => $request->numero_expediente,
            'ctg_via_id' => $request->vias,
            'ctg_apelo_id' => $request->apelos,   
            'ctg_area_id' => $request->ctg_area_id,
            'mesa_id' => $request->mesa_id,
            'user_id' => $idUserCookie,
        ]);

        #SE CREA EL DELITO
        $delito = Delito::create([
            'ctg_delito_id' => $request->delitos,
        ]);
        #se asocia el delito a la toca
        $delito->toca()->associate($toca->id);
        $delito->save();

        #SE CREA LA VICTIMA
        $victima = Persona::create([
            'nombre' => $request->nombre_victima,
            'apellido1' => $request->apellido1_victima,
            'apellido2' => $request->apellido2_victima,
        ]);

        #se crea la parte victima y se asocia a la toca
        $parte_victima = Parte::create([
            'toca_id' => $toca->id,
            'ctg_tipo_parte_id' => 2,
        ]);

        #se asocia la victima a la parte victima
        $victima->partes()->save($parte_victima);
        
        #SE CREA EL ACUSADO
        $acusado = Persona::create([
            'nombre' => $request->nombre_acusado,
            'apellido1' => $request->apellido1_acusado,
            'apellido2' => $request->apellido2_acusado,
        ]);

        #se crea la parte acusado y se asocia a la toca
        $parte_acusado = Parte::create([
            'toca_id' => $toca->id,
            'ctg_tipo_parte_id' => 1,
        ]); 

        # Se asocia la ponencia a la toca
        $toca->ctg_ponencia()->associate($request->ponencias);
        $toca->save();
        
        #se asocia el acusado a la parte acusado
        $acusado->partes()->save($parte_acusado);

        return redirect()->route('view.toca.index');
    }

    public function show(string $id)
    {
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
