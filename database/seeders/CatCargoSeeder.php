<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CatCargoSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $cargos = [
            // Cargos de Alta Dirección (Futuros Sujetos Obligados)
            ['CAR_V_NOMBRE' => 'Ministro(a)', 'created_at' => $now, 'updated_at' => $now],
            ['CAR_V_NOMBRE' => 'Viceministro(a)', 'created_at' => $now, 'updated_at' => $now],
            ['CAR_V_NOMBRE' => 'Secretario(a) General', 'created_at' => $now, 'updated_at' => $now],
            ['CAR_V_NOMBRE' => 'Director(a) General', 'created_at' => $now, 'updated_at' => $now],
            ['CAR_V_NOMBRE' => 'Jefe(a) de Oficina', 'created_at' => $now, 'updated_at' => $now],

            // Cargos Regulares (No Obligados)
            ['CAR_V_NOMBRE' => 'Asesor(a)', 'created_at' => $now, 'updated_at' => $now],
            ['CAR_V_NOMBRE' => 'Especialista', 'created_at' => $now, 'updated_at' => $now],
            ['CAR_V_NOMBRE' => 'Asistente Administrativo', 'created_at' => $now, 'updated_at' => $now],
            ['CAR_V_NOMBRE' => 'Técnico(a) en Soporte', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('CAT_CARGO')->insert($cargos);
    }
}
