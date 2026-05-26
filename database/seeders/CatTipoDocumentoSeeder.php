<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CatTipoDocumentoSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('CAT_TIPO_DOCUMENTO')->insert([
            ['TID_V_DESCRIPCION' => 'DNI', 'created_at' => $now, 'updated_at' => $now], // ID 1
            ['TID_V_DESCRIPCION' => 'Carnet de Extranjería (C.E.)', 'created_at' => $now, 'updated_at' => $now], // ID 2
            ['TID_V_DESCRIPCION' => 'Pasaporte', 'created_at' => $now, 'updated_at' => $now], // ID 3
        ]);
    }
}
