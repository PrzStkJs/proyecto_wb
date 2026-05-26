<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CatEstadoVisitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('CAT_ESTADO_VISITA')->insert([
            [
                'EST_V_DESCRIPCION' => 'DNI',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
