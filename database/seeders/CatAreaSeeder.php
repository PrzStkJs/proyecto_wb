<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CatAreaSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $areas = [
            ['ARE_V_NOMBRE' => 'Despacho Ministerial', 'created_at' => $now, 'updated_at' => $now],
            ['ARE_V_NOMBRE' => 'Despacho Viceministerial', 'created_at' => $now, 'updated_at' => $now],
            ['ARE_V_NOMBRE' => 'Secretaría General', 'created_at' => $now, 'updated_at' => $now],
            ['ARE_V_NOMBRE' => 'Oficina General de Administración', 'created_at' => $now, 'updated_at' => $now],
            ['ARE_V_NOMBRE' => 'Oficina General de Recursos Humanos', 'created_at' => $now, 'updated_at' => $now],
            ['ARE_V_NOMBRE' => 'Oficina General de Tecnologías de la Información', 'created_at' => $now, 'updated_at' => $now],
            ['ARE_V_NOMBRE' => 'Procuraduría Pública', 'created_at' => $now, 'updated_at' => $now],
            ['ARE_V_NOMBRE' => 'Órgano de Control Institucional (OCI)', 'created_at' => $now, 'updated_at' => $now],
            ['ARE_V_NOMBRE' => 'Oficina de Trámite Documentario', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('CAT_AREA')->insert($areas);
    }
}
