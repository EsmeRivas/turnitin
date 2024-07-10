<?php
namespace App\Http\Controllers;
use App\Models\Toca;
use App\Models\CtgMesa;
use App\Models\CtgArea;
use App\Models\CtgPonencia;

use App\Models\CtgDelito;
use App\Models\Delito;
use App\Models\Distrito;
use App\Models\Parte;
use App\Models\Persona;
use App\Models\CtgApelo;
use App\Models\CtgVia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class TocaController extends Controller
{
    public function index()
    {
        $tocas = Toca::all();

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
        return view('tocas.create', compact('delitos','distritos','apelos','vias','ponencias','mesas','areas'));
    }

    public function store(Request $request)
    {
        #se crea la toca
        $toca = Toca::create([
            'numero_toca' => $request->numero_toca,
            'numero_expediente' => $request->numero_expediente,
            'ctg_via_id' => $request->vias,
            'ctg_apelo_id' => $request->apelos,   

            
            'ctg_area_id' => $request->distrito,
              
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
