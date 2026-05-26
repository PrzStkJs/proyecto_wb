<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Controlador para el registro de visitas en 2 pasos.
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visita;
use App\Models\Visitante;
use App\Models\Funcionario;
use App\Models\Persona;
use App\Models\Entidad;
use App\Models\Sede;
use App\Models\Motivo;
use Carbon\Carbon;

class VisitaFormController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Mostrar formulario Paso 1 (selección de datos iniciales)
    |--------------------------------------------------------------------------
    */
    public function createStep1()
    {
        $funcionarios = Funcionario::with(['persona', 'cargo', 'area'])->get();
        $sedes        = Sede::all();
        $motivos      = Motivo::all();

        return view('Reg-Entr', compact('funcionarios', 'sedes', 'motivos'));
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Procesar Paso 1 y guardar datos en sesión
    |--------------------------------------------------------------------------
    */
    public function storeStep1(Request $request)
    {
        $validated = $request->validate([
            'quienVisita'      => 'required',
            'lugarReunion'     => 'required',
            'motivoVisita'     => 'nullable',
            'numeroDocumento'  => 'required|string',
            'nombres_api'      => 'required_without:apellidos_api|string|max:255',
            'apellidos_api'    => 'required_without:nombres_api|string|max:255',
        ], [
            'nombres_api.required_without'   => 'Debe ingresar al menos un nombre o un apellido.',
            'apellidos_api.required_without' => 'Debe ingresar al menos un nombre o un apellido.',
        ]);

        session(['visita_data' => $validated]);

        return redirect()->route('visitas.step2.view');
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Mostrar formulario Paso 2 (confirmación y datos adicionales)
    |--------------------------------------------------------------------------
    */
    public function viewStep2()
    {
        $dataPaso1 = session('visita_data');

        if (!$dataPaso1) {
            return redirect()->route('visitas.step1.view')->with('error', 'Sesión expirada. Inicia de nuevo.');
        }

        $funcionario = Funcionario::with('persona')->find($dataPaso1['quienVisita']);

        $nombre_visitado = $funcionario && $funcionario->persona
            ? $funcionario->persona->PER_V_NOMBRE . ' ' . $funcionario->persona->PER_V_APELLIDOS
            : 'Funcionario no encontrado';

        $nombre_visitante = ($dataPaso1['nombres_api'] ?? '') . ' ' . ($dataPaso1['apellidos_api'] ?? '');

        return view('Reg-Entr2', compact('nombre_visitado', 'nombre_visitante'));
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Procesar Paso 2 y guardar la visita completa
    |--------------------------------------------------------------------------
    */
    public function storeStep2(Request $request)
    {
        $dataPaso1 = session('visita_data');

        if (!$dataPaso1) {
            return redirect()->route('visitas.step1.view')->with('error', 'Sesión expirada. Inicia de nuevo.');
        }

        $request->validate([
            'lugar_trabajo'   => 'required',
            'nombre_entidad'  => 'nullable|string',
            'cargo'           => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            // 1. Persona visitante
            $personaVisitante = Persona::firstOrCreate(
                ['PER_B_DNI' => $dataPaso1['numeroDocumento']],
                [
                    'PER_V_NOMBRE'    => $dataPaso1['nombres_api'],
                    'PER_V_APELLIDOS' => $dataPaso1['apellidos_api'],
                    'TID_N_ID'        => 1,
                ]
            );

            // 2. Entidad (solo si no eligió "ninguno")
            $entidadId = null;
            if ($request->lugar_trabajo !== 'ninguno' && $request->filled('nombre_entidad')) {
                $entidad = Entidad::firstOrCreate(
                    ['ENT_V_NOMBRE' => strtoupper($request->nombre_entidad)]
                );
                $entidadId = $entidad->ENT_N_ID;
            }

            // 3. Visitante
            $visitante = Visitante::firstOrCreate(
                ['PER_N_ID' => $personaVisitante->PER_N_ID],
                ['ENT_N_ID' => $entidadId]
            );

            // 4. Visita
            Visita::create([
                'VTA_D_FECHA'        => Carbon::now()->toDateString(),
                'VTA_T_HORA_ENTRADA' => Carbon::now(),
                'VTA_T_HORA_SALIDA'  => null,
                'MOT_N_ID'           => $dataPaso1['motivoVisita'] ?? null,
                'FUN_N_ID'           => $dataPaso1['quienVisita'],
                'SED_N_ID'           => $dataPaso1['lugarReunion'],
                'VIS_N_ID'           => $visitante->VIS_N_ID,
                'EST_N_ID'           => 1,
            ]);

            DB::commit();
            session()->forget('visita_data');
            return redirect('/Registro_visitas')->with('success', 'Visita registrada correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            dd('ERROR FATAL: ' . $e->getMessage(), 'LÍNEA: ' . $e->getLine());
        }
    }
}
