<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FuncionarioSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('T_FUNCIONARIO')->insert([
    // 1 - Luis Enrique Arroyo Sánchez -> Ministro -> Despacho Ministerial -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 1,
        'CAR_N_ID'              => 1, // Ministro(a)
        'ARE_N_ID'              => 1, // Despacho Ministerial
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 2 - Francisco Martin Gavidia Arrascue -> Viceministro -> Despacho Viceministerial -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 2,
        'CAR_N_ID'              => 2, // Viceministro(a)
        'ARE_N_ID'              => 2, // Despacho Viceministerial
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 3 - María Cecilia Chumbe Rodríguez -> Secretario(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 3,
        'CAR_N_ID'              => 3, // Secretario(a) General
        'ARE_N_ID'              => 3, // Secretaría General
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 4 - Maria Del Pilar Sosa San Miguel Vda. De Tenorio -> Jefe(a) de Oficina (Gabinete) -> Despacho Ministerial -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 4,
        'CAR_N_ID'              => 5, // Jefe(a) de Oficina
        'ARE_N_ID'              => 1, // Despacho Ministerial
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 5 - Max Hernández Camarero -> Director(a) General (Secretario Ejecutivo) -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 5,
        'CAR_N_ID'              => 4, // Director(a) General
        'ARE_N_ID'              => 3, // Secretaría General
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 6 - Alberto Héctor García Aguirre -> Jefe del OCI -> Órgano de Control Institucional -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 6,
        'CAR_N_ID'              => 5, // Jefe(a) de Oficina
        'ARE_N_ID'              => 8, // Órgano de Control Institucional (OCI)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 7 - Carlos Enrique Cosavalente Chamorro -> Procurador Público -> Procuraduría Pública -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 7,
        'CAR_N_ID'              => 4, // Director(a) General (procuraduría / cargo directivo)
        'ARE_N_ID'              => 7, // Procuraduría Pública
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 8 - Walter Orlando Pastor Reyes -> Procurador Adjunto -> Procuraduría Pública -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 8,
        'CAR_N_ID'              => 5, // Jefe(a) de Oficina
        'ARE_N_ID'              => 7, // Procuraduría Pública
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 9 - Jorge Alexander Medina Burga -> Secretario de la Secretaría Administrativa -> Director(a) General -> Oficina General de Administración -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 9,
        'CAR_N_ID'              => 4, // Director(a) General
        'ARE_N_ID'              => 4, // Oficina General de Administración
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 10 - José Luis Rojas Alcocer -> Jefe de la Oficina General de Asesoría Jurídica -> Jefe de Oficina -> Oficina General de Administración -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 10,
        'CAR_N_ID'              => 5, // Jefe(a) de Oficina
        'ARE_N_ID'              => 4, // Oficina General de Administración (aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 11 - Katherine Geraldine Reyes Gonzáles -> Jefa de Planeamiento y Presupuesto -> Jefe de Oficina -> Oficina General de Administración -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 11,
        'CAR_N_ID'              => 5, // Jefe(a) de Oficina
        'ARE_N_ID'              => 4, // Oficina General de Administración (planeamiento aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 12 - Ana María Ochoa Hernández -> Jefa de la Oficina General de Administración -> Jefe de Oficina -> Oficina General de Administración -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 12,
        'CAR_N_ID'              => 5, // Jefe(a) de Oficina
        'ARE_N_ID'              => 4, // Oficina General de Administración
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 13 - Ernesto Adolfo Carrera Salas -> Jefe de la Oficina General de Tecnologías de la Información -> Jefe de Oficina -> Oficina General de Tecnologías de la Información -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 13,
        'CAR_N_ID'              => 5, // Jefe(a) de Oficina
        'ARE_N_ID'              => 6, // Oficina General de Tecnologías de la Información
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 14 - Jeanette Edith Trujillo Bravo -> Jefa de la Oficina General de Recursos Humanos -> Jefe de Oficina -> Oficina General de Recursos Humanos -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 14,
        'CAR_N_ID'              => 5, // Jefe(a) de Oficina
        'ARE_N_ID'              => 5, // Oficina General de Recursos Humanos
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 15 - Milagritos Pilar Pastor Paredes -> Secretaria de la Secretaría de Coordinación -> Asistente Administrativo -> Secretaría General (aprox.) -> NO OBLIGADO
    [
        'PER_N_ID'              => 15,
        'CAR_N_ID'              => 8, // Asistente Administrativo
        'ARE_N_ID'              => 3, // Secretaría General (aprox. para Secretaría de Coordinación)
        'FUN_B_SUJETO_OBLIGADO' => false,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 16 - Suzie Gladys Sato Uesu -> Secretaria de Comunicación Social -> Asistente Administrativo -> Secretaría General (comunicación) -> NO OBLIGADO
    [
        'PER_N_ID'              => 16,
        'CAR_N_ID'              => 8, // Asistente Administrativo
        'ARE_N_ID'              => 3, // Secretaría General (prensa/comunicación aprox.)
        'FUN_B_SUJETO_OBLIGADO' => false,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 17 - Juan Carlos Pasco Herrera -> Secretario de la Secretaría de Gestión Pública -> Secretario(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 17,
        'CAR_N_ID'              => 3, // Secretario(a) General
        'ARE_N_ID'              => 3, // Secretaría General (Gestión Pública aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 18 - Ricardo Cristopher Zapata De La Rosa -> Secretario de Gobierno y Transformación Digital -> Secretario(a) General -> Oficina General de Tecnologías de la Información -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 18,
        'CAR_N_ID'              => 3, // Secretario(a) General
        'ARE_N_ID'              => 6, // Oficina General de Tecnologías de la Información (transformación digital)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 19 - Diego Alejandro Montes Barrantes -> Secretario de la Secretaría de Integridad Pública -> Secretario(a) General -> Secretaría General / OCI -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 19,
        'CAR_N_ID'              => 3, // Secretario(a) General
        'ARE_N_ID'              => 3, // Secretaría General (integridad aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 20 - Mary Rojas Cuesta -> Secretaria de la Secretaría de Descentralización (titular) -> Secretario(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 20,
        'CAR_N_ID'              => 3, // Secretario(a) General (titular de secretaría)
        'ARE_N_ID'              => 3, // Secretaría General (Descentralización aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 21 - Cesar Augusto Sierra Sanjines -> Secretario de Gestión Social y Diálogo -> Secretario(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 21,
        'CAR_N_ID'              => 3, // Secretario(a) General
        'ARE_N_ID'              => 3, // Secretaría General (Gestión Social y Diálogo aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 22 - Ricardo Homero Moncada Novoa -> Secretario de Demarcación y Organización Territorial -> Secretario(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 22,
        'CAR_N_ID'              => 3, // Secretario(a) General
        'ARE_N_ID'              => 3, // Secretaría General (Demarcación aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 23 - Jaime Mariano Gastón Sayán Araujo -> Secretario de Gestión del Riesgo de Desastres -> Secretario(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 23,
        'CAR_N_ID'              => 3, // Secretario(a) General
        'ARE_N_ID'              => 3, // Secretaría General (Gestión del Riesgo aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 24 - Giuliana María Horna Padrón -> Subsecretaria I Coordinación con Entidades Públicas y Privadas -> Director(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 24,
        'CAR_N_ID'              => 4, // Director(a) General (subsecretaría / cargo directivo)
        'ARE_N_ID'              => 3, // Secretaría General (coordinación aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 25 - Yvan Rogelio Sandoval Cepeda -> Subsecretario Coordinación Intersectorial -> Director(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 25,
        'CAR_N_ID'              => 4, // Director(a) General
        'ARE_N_ID'              => 3, // Secretaría General (coordinación intersectorial aprox.)
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 26 - Freddy Yvan Sagastegui Cruz -> Subsecretario I de Administración Pública -> Director(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 26,
        'CAR_N_ID'              => 4, // Director(a) General (subsecretario)
        'ARE_N_ID'              => 3, // Secretaría General
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 27 - Elizabeth Rosario Viton Zorrilla -> Subsecretaria I de Simplificación y Análisis Regulatorio -> Director(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 27,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 28 - Mariana Llona Rosa -> Subsecretaria de Calidad de Servicios -> Director(a) General -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 28,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 29 - Richard José Marini López -> Subsecretario I de Política y Regulación Digital -> Director(a) General -> Oficina General de Tecnologías de la Información -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 29,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 6, // Tecnologías / Transformación digital
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 30 - Orlando Vásquez Rubio -> Subsecretario (e) de Tecnologías y Seguridad Digital -> Director(a) General -> Oficina General de Tecnologías de la Información -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 30,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 6,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 31 - Carlos Alberto Gutiérrez Cahuas -> Subsecretario II (e) de Servicios e Innovación Digital -> Director(a) General -> Oficina General de Tecnologías de la Información -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 31,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 6,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 32 - Fernando Gonzalo Hurtado Regalado -> Subsecretario de Gestión Estratégica de la Integridad Pública -> Director(a) General -> Secretaría de Integridad Pública (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 32,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 33 - Jorge Alfredo Portocarrero Salcedo -> Subsecretario I de Monitoreo de la Integridad Pública -> Director(a) General -> Secretaría de Integridad Pública (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 33,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 34 - Zoila Natalia Delgado Calisaya -> Subsecretaria I de Promoción del Desarrollo Territorial -> Director(a) General -> Secretaría de Descentralización (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 34,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 35 - Suzie Gladys Sato Uesu -> Jefa (e) de Oficina I de Prensa e Imagen Institucional -> Jefe(a) de Oficina -> Secretaría General (prensa) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 35,
        'CAR_N_ID'              => 5, // Jefe(a) de Oficina
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 36 - Mariano Waldemar Chávez Vásquez -> Subsecretario de Fortalecimiento de la Gestión Descentralizada -> Director(a) General -> Secretaría de Descentralización (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 36,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 37 - Rubén Darío Antúnez Milla -> Subsecretario de Articulación Regional y Local -> Director(a) General -> Secretaría de Descentralización (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 37,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 38 - Gustavo Enrique Bustamante Hualca -> Subsecretario I de Prevención Social y Gestión de la Información -> Director(a) General -> Secretaría de Gestión Social y Diálogo (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 38,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 39 - Carlos Francisco Eyzaguirre Beltroy -> Subsecretario de Gestión del Diálogo -> Director(a) General -> Secretaría de Gestión Social y Diálogo (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 39,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 40 - Carlos Jeisson Balarezo Tolentino -> Subsecretario I (e) de Seguimiento y Gestión de Compromisos -> Director(a) General -> Secretaría de Gestión Social y Diálogo -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 40,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 41 - Tamara Cusi Alva Olórtegui -> Subsecretaria de Asuntos Técnicos de Demarcación y Organización Territorial -> Director(a) General -> Secretaría de Demarcación y Organización Territorial (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 41,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 42 - Norma Raquel Juarez Segura -> Subsecretaria I de Información y Análisis Territorial -> Director(a) General -> Secretaría de Demarcación y Organización Territorial (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 42,
        'CAR_N_ID'              => 4,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 43 - Sinthia Rocio Mendoza De La Cruz -> Jefa de Oficina I de Gestión Documental y Atención al Ciudadano -> Jefe(a) de Oficina -> Oficina de Trámite Documentario -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 43,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 9, // Oficina de Trámite Documentario
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 44 - Carmen Ruth Ibárcena Espinoza -> Jefa de Oficina I de Abastecimiento -> Jefe(a) de Oficina -> Oficina General de Administración -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 44,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 4,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 45 - Richard Percy Pinto Figueroa -> Jefe de Oficina I de Contabilidad y Tesorería -> Jefe(a) de Oficina -> Oficina General de Administración -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 45,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 4,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 46 - José Luis Caballero Díaz -> Jefe de Oficina I de Seguridad y Defensa Nacional -> Jefe(a) de Oficina -> Secretaría General (seguridad/defensa aprox.) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 46,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 47 - Romina Ximena Caminada Vallejo -> Jefa de Oficina I de Cumplimiento de Gobierno -> Jefe(a) de Oficina -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 47,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 48 - Jeanine Patricia Calderón Huari -> Jefa (e) de Oficina I de Relaciones Nacionales e Internacionales -> Jefe(a) de Oficina -> Secretaría General -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 48,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 49 - Luis Miguel Zavaleta Revilla -> Jefe de Oficina I de Integridad Institucional -> Jefe(a) de Oficina -> Secretaría de Integridad Pública / OCI (map to Secretaría General) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 49,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 50 - Cristian Campos Asorza -> Jefe (e) de Oficina II de Presupuesto -> Jefe(a) de Oficina -> Oficina General de Administración -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 50,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 4,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 51 - Rosio Milagro Flores Guzmán -> Jefa de Oficina II de Modernización -> Jefe(a) de Oficina -> Secretaría General (modernización aprox.) -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 51,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 3,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 52 - Carlo Johan Espino Cobeña -> Jefe (e) de Oficina II de Planeamiento -> Jefe(a) de Oficina -> Oficina General de Administración -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 52,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 4,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
    // 53 - Sandra Beatriz Manco Menéndez -> Jefa(e) de Oficina II de Programación Multianual de Inversiones -> Jefe(a) de Oficina -> Oficina General de Administración -> SÍ OBLIGADO
    [
        'PER_N_ID'              => 53,
        'CAR_N_ID'              => 5,
        'ARE_N_ID'              => 4,
        'FUN_B_SUJETO_OBLIGADO' => true,
        'created_at'            => $now,
        'updated_at'            => $now,
    ],
]);

    }
}
