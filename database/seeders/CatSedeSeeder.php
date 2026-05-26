<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CatSedeSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $sedes = [
            'Oficina de Trámite Documentario - Piso 1',
            'Sala de Atención al Ciudadano - Piso 1',
            'Módulo de Orientación A - Piso 1',
            'Sala Acuerdo Nacional - Piso 2',
            'Sala Quiñones - Piso 2',
            'Oficina de Recursos Humanos - Piso 2',
            'Despacho Ministerial - Piso 3',
            'Gabinete de Asesores - Piso 3',
            'Sala de Conferencias de Prensa - Piso 3',
            'Oficina Gral. de Administración - Piso 4',
            'Sala de Reuniones de Logística - Piso 4',
            'Oficina de Contabilidad y Finanzas - Piso 4',
            'Oficina de Tecnologías (OTI) - Piso 5',
            'Sala de Desarrollo de Software - Piso 5',
            'Laboratorio de Innovación - Piso 5',
        ];

        $data = array_map(function ($nombre) use ($now) {
            return [
                'SED_V_NOMBRE' => $nombre,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $sedes);

        DB::table('CAT_SEDE')->insert($data);
    }
}
