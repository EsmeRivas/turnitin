<?php
namespace App\Http\Controllers;

use App\Models\Amparo;
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
use App\Models\PersonalAutorizado;
use App\Models\Quejoso;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;

use function Laravel\Prompts\error;

class AmparoController extends Controller
{
    public function directo()
    {
        $GET_AMPAROS = 
        "select toc.numero_toca,
            toc.numero_expediente,
            amp.numero_amparo,
            amp.numero_oficio,
            amp.colegiado,
            (
                select string_agg(CONCAT(quej.nombre, ' ', quej.apellido1, ' ', quej.apellido2), ', ')
                from personas quej
                inner join partes prts on quej.id = prts.persona_id
                inner join quejosos qjs on qjs.parte_id = prts.id
                where qjs.amparo = amp.id
                and prts.ctg_tipo_parte_id = 3
                limit 1
            ) as quejoso,
            toc.status,
            amp.created_at,
            amp.fecha_inicio_amparo,
            amp.fecha_termino,
            amp.fecha_resolucion_final,
            CONCAT((amp.fecha_termino::date - CURRENT_DATE), ' días') as termino
        from amparos amp 
        left join tocas toc on toc.id = amp.toca_id
        where amp.tipo_amparo = 1;";

        $itemsDirectos = collect(DB::select($GET_AMPAROS));
        $pageDirectos = request()->get('pageDirectos', 1);
        $perPageDir = 15;
        $amparos = new LengthAwarePaginator($itemsDirectos->forPage($pageDirectos, $perPageDir)->values(), $itemsDirectos->count(), $perPageDir, $pageDirectos);

        return view('amparos.directo', compact('amparos'));
    }

    public function indirecto()
    {
        $GET_AMPAROS = 
        "select toc.numero_toca,
            toc.numero_expediente,
            amp.numero_amparo,
            amp.numero_oficio,
            amp.colegiado,
            (
                select string_agg(CONCAT(quej.nombre, ' ', quej.apellido1, ' ', quej.apellido2), ', ')
                from personas quej
                inner join partes prts on quej.id = prts.persona_id
                inner join quejosos qjs on qjs.parte_id = prts.id
                where qjs.amparo = amp.id
                and prts.ctg_tipo_parte_id = 3
                limit 1
            ) as quejoso,
            toc.status,
            amp.created_at,
            amp.fecha_inicio_amparo,
            amp.fecha_termino,
            amp.fecha_resolucion_final,
            CONCAT((amp.fecha_termino::date - CURRENT_DATE), ' días') as termino
        from amparos amp 
        left join tocas toc on toc.id = amp.toca_id
        where amp.tipo_amparo = 2;";

        $itemsIndirectos = collect(DB::select($GET_AMPAROS));
        $pageIndirectos = request()->get('pageIndirectos', 1);
        $perPageDir = 15;
        $amparosIndirectos = new LengthAwarePaginator($itemsIndirectos->forPage($pageIndirectos, $perPageDir)->values(), $itemsIndirectos->count(), $perPageDir, $pageIndirectos);

        return view('amparos.indirecto', compact('amparosIndirectos'));
    }

    public function store(Request $request)
    {
        try 
        {
            $requestData = $request->amparoData;

            $tipoAmparo = $requestData['tipoAmparo'];
            $numeroAmparo = $requestData['numeroAmparo'];
            $numeroOficio = $requestData['numeroOficio'];
            $colegiado = $requestData['colegiado'];
            $fechaEstimadaTermino = $requestData['termino']; // fecha estimada de termino
            $fechaResolucionFinal = $requestData['fechaResolucion']; // fecha de resolucion final
            $tieneResolucion = $requestData['resolucion'] === '1' ? true : false;
            $tocaID = $requestData['tocaID'];
            $quejosoNombre = $requestData['quejosoNombre'];
            $quejosoApellido1 = $requestData['quejosoApellido1'];
            $quejosoApellido2 = $requestData['quejosoApellido2'];

            $fechaEstimadaTermino === '' ?? $fechaEstimadaTermino = '0000-00-00';
            $fechaResolucionFinal === '' ?? $fechaResolucionFinal = '0000-00-00';

            // registramos el amparo
            $query = "insert into amparos(tipo_amparo, numero_amparo, numero_oficio, colegiado, tiene_resolucion, fecha_resolucion_final, fecha_termino, toca_id)
            values(?, ?, ?, ?, ?, ?, ?, ?);";
            $amparo = collect(DB::insert($query, [$tipoAmparo, $numeroAmparo, $numeroOficio, $colegiado, $tieneResolucion, $fechaResolucionFinal, $fechaEstimadaTermino, $tocaID]));

            $query = "select amp.id from amparos amp WHERE amp.numero_amparo = ?;";
            [$amparoId] = collect(DB::table('amparos')->where('numero_amparo', '=', $numeroAmparo)->value('id'));

            // registramos el quejoso
            $quejoso = Persona::create([
                'nombre' => $quejosoNombre,
                'apellido1' => $quejosoApellido1,
                'apellido2' => $quejosoApellido2,
            ]);

            $parteQuejoso = Parte::create([
                'persona_id' => $quejoso->id,
                'toca_id' => $tocaID,
                'ctg_tipo_parte_id' => 3
            ]);

            $quejoso->partes()->save($parteQuejoso);
            $quejoso->save();

            $amparo = Quejoso::create([
                'parte_id' => $parteQuejoso->id,
                'amparo' => $amparoId
            ]);

            return response()->json([
                'result' => true,
                'message' => 'Amparo registrado',
                'data' => $amparo->id
            ])->header('Content-Type', 'application/json')
            ->setStatusCode(200);
        } catch (\Throwable $error) {
            return response()->json([
                'result' => false,
                'message' => 'Ha ocurrido un problema al registrar el amparo',
                'data' => null
            ])->header('Content-Type', 'application/json')
            ->setStatusCode(500);
        }
    }

}
