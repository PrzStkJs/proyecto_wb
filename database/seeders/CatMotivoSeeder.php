<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CatMotivoSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('CAT_MOTIVO')->insert([
            ['MOT_V_DESCRIPCION' => 'Reunión de trabajo', 'created_at' => $now, 'updated_at' => $now],
            ['MOT_V_DESCRIPCION' => 'Provisión de Servicios', 'created_at' => $now, 'updated_at' => $now],
            ['MOT_V_DESCRIPCION' => 'Otros Motivos', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
