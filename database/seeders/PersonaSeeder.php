<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;

class PersonaSeeder extends Seeder
{
    public function run(): void
    {

        // Funcionario Obligado (probable): Presidente del Consejo de Ministros
        Persona::create([
            'PER_B_DNI'       => '91230001',
            'PER_V_NOMBRE'    => 'Luis Enrique',
            'PER_V_APELLIDOS' => 'Arroyo Sánchez',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Viceministro
        Persona::create([
            'PER_B_DNI'       => '91230002',
            'PER_V_NOMBRE'    => 'Francisco Martin',
            'PER_V_APELLIDOS' => 'Gavidia Arrascue',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Secretaria General (cargo directivo)
        Persona::create([
            'PER_B_DNI'       => '91230003',
            'PER_V_NOMBRE'    => 'María Cecilia',
            'PER_V_APELLIDOS' => 'Chumbe Rodríguez',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa de Gabinete de Asesores (cargo de confianza/directivo)
        Persona::create([
            'PER_B_DNI'       => '91230004',
            'PER_V_NOMBRE'    => 'Maria Del Pilar',
            'PER_V_APELLIDOS' => 'Sosa San Miguel Vda. De Tenorio',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Secretario Ejecutivo del Acuerdo Nacional
        Persona::create([
            'PER_B_DNI'       => '91230005',
            'PER_V_NOMBRE'    => 'Max',
            'PER_V_APELLIDOS' => 'Hernández Camarero',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefe del Órgano de Control Institucional
        Persona::create([
            'PER_B_DNI'       => '91230006',
            'PER_V_NOMBRE'    => 'Alberto Héctor',
            'PER_V_APELLIDOS' => 'García Aguirre',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Procurador Público (cargo institucional relevante)
        Persona::create([
            'PER_B_DNI'       => '91230007',
            'PER_V_NOMBRE'    => 'Carlos Enrique',
            'PER_V_APELLIDOS' => 'Cosavalente Chamorro',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Procurador Adjunto
        Persona::create([
            'PER_B_DNI'       => '91230008',
            'PER_V_NOMBRE'    => 'Walter Orlando',
            'PER_V_APELLIDOS' => 'Pastor Reyes',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Secretario de la Secretaría Administrativa
        Persona::create([
            'PER_B_DNI'       => '91230009',
            'PER_V_NOMBRE'    => 'Jorge Alexander',
            'PER_V_APELLIDOS' => 'Medina Burga',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefe de la Oficina General de Asesoría Jurídica
        Persona::create([
            'PER_B_DNI'       => '91230010',
            'PER_V_NOMBRE'    => 'José Luis',
            'PER_V_APELLIDOS' => 'Rojas Alcocer',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa de la Oficina General de Planeamiento y Presupuesto
        Persona::create([
            'PER_B_DNI'       => '91230011',
            'PER_V_NOMBRE'    => 'Katherine Geraldine',
            'PER_V_APELLIDOS' => 'Reyes Gonzáles',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa de la Oficina General de Administración
        Persona::create([
            'PER_B_DNI'       => '91230012',
            'PER_V_NOMBRE'    => 'Ana María',
            'PER_V_APELLIDOS' => 'Ochoa Hernández',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefe de la Oficina General de Tecnologías de la Información
        Persona::create([
            'PER_B_DNI'       => '91230013',
            'PER_V_NOMBRE'    => 'Ernesto Adolfo',
            'PER_V_APELLIDOS' => 'Carrera Salas',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa de la Oficina General de Recursos Humanos
        Persona::create([
            'PER_B_DNI'       => '91230014',
            'PER_V_NOMBRE'    => 'Jeanette Edith',
            'PER_V_APELLIDOS' => 'Trujillo Bravo',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario NO Obligado (probable): Secretaria de la Secretaría de Coordinación (puesto de apoyo/secretarial)
        Persona::create([
            'PER_B_DNI'       => '91230015',
            'PER_V_NOMBRE'    => 'Milagritos Pilar',
            'PER_V_APELLIDOS' => 'Pastor Paredes',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario NO Obligado (probable): Secretaria de la Secretaría de Comunicación Social (puesto de apoyo)
        Persona::create([
            'PER_B_DNI'       => '91230016',
            'PER_V_NOMBRE'    => 'Suzie Gladys',
            'PER_V_APELLIDOS' => 'Sato Uesu',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Secretario de la Secretaría de Gestión Pública
        Persona::create([
            'PER_B_DNI'       => '91230017',
            'PER_V_NOMBRE'    => 'Juan Carlos',
            'PER_V_APELLIDOS' => 'Pasco Herrera',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Secretario de la Secretaría de Gobierno y Transformación Digital
        Persona::create([
            'PER_B_DNI'       => '91230018',
            'PER_V_NOMBRE'    => 'Ricardo Cristopher',
            'PER_V_APELLIDOS' => 'Zapata De La Rosa',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Secretario de la Secretaría de Integridad Pública
        Persona::create([
            'PER_B_DNI'       => '91230019',
            'PER_V_NOMBRE'    => 'Diego Alejandro',
            'PER_V_APELLIDOS' => 'Montes Barrantes',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Secretaria de la Secretaría de Descentralización (si es titular de la secretaría)
        Persona::create([
            'PER_B_DNI'       => '91230020',
            'PER_V_NOMBRE'    => 'Mary',
            'PER_V_APELLIDOS' => 'Rojas Cuesta',
            'TID_N_ID'        => 1,
        ]);
        // Funcionario Obligado (probable): Secretario de la Secretaría de Gestión Social y Diálogo
        Persona::create([
            'PER_B_DNI'       => '91230021',
            'PER_V_NOMBRE'    => 'Cesar Augusto',
            'PER_V_APELLIDOS' => 'Sierra Sanjines',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Secretario de la Secretaría de Demarcación y Organización Territorial
        Persona::create([
            'PER_B_DNI'       => '91230022',
            'PER_V_NOMBRE'    => 'Ricardo Homero',
            'PER_V_APELLIDOS' => 'Moncada Novoa',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Secretario de la Secretaría de Gestión del Riesgo de Desastres
        Persona::create([
            'PER_B_DNI'       => '91230023',
            'PER_V_NOMBRE'    => 'Jaime Mariano Gastón',
            'PER_V_APELLIDOS' => 'Sayán Araujo',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretaria I de Coordinación con Entidades Públicas y Privadas
        Persona::create([
            'PER_B_DNI'       => '91230024',
            'PER_V_NOMBRE'    => 'Giuliana María',
            'PER_V_APELLIDOS' => 'Horna Padrón',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario de Coordinación Intersectorial
        Persona::create([
            'PER_B_DNI'       => '91230025',
            'PER_V_NOMBRE'    => 'Yvan Rogelio',
            'PER_V_APELLIDOS' => 'Sandoval Cepeda',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario I de Administración Pública
        Persona::create([
            'PER_B_DNI'       => '91230026',
            'PER_V_NOMBRE'    => 'Freddy Yvan',
            'PER_V_APELLIDOS' => 'Sagastegui Cruz',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretaria I de Simplificación y Análisis Regulatorio
        Persona::create([
            'PER_B_DNI'       => '91230027',
            'PER_V_NOMBRE'    => 'Elizabeth Rosario',
            'PER_V_APELLIDOS' => 'Viton Zorrilla',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretaria de Calidad de Servicios
        Persona::create([
            'PER_B_DNI'       => '91230028',
            'PER_V_NOMBRE'    => 'Mariana',
            'PER_V_APELLIDOS' => 'Llona Rosa',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario I de Política y Regulación Digital
        Persona::create([
            'PER_B_DNI'       => '91230029',
            'PER_V_NOMBRE'    => 'Richard José',
            'PER_V_APELLIDOS' => 'Marini López',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario (e) de Tecnologías y Seguridad Digital
        Persona::create([
            'PER_B_DNI'       => '91230030',
            'PER_V_NOMBRE'    => 'Orlando',
            'PER_V_APELLIDOS' => 'Vásquez Rubio',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario II (e) de Servicios e Innovación Digital
        Persona::create([
            'PER_B_DNI'       => '91230031',
            'PER_V_NOMBRE'    => 'Carlos Alberto',
            'PER_V_APELLIDOS' => 'Gutiérrez Cahuas',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario de Gestión Estratégica de la Integridad Pública
        Persona::create([
            'PER_B_DNI'       => '91230032',
            'PER_V_NOMBRE'    => 'Fernando Gonzalo',
            'PER_V_APELLIDOS' => 'Hurtado Regalado',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario I de Monitoreo de la Integridad Pública
        Persona::create([
            'PER_B_DNI'       => '91230033',
            'PER_V_NOMBRE'    => 'Jorge Alfredo',
            'PER_V_APELLIDOS' => 'Portocarrero Salcedo',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretaria I de Promoción del Desarrollo Territorial
        Persona::create([
            'PER_B_DNI'       => '91230034',
            'PER_V_NOMBRE'    => 'Zoila Natalia',
            'PER_V_APELLIDOS' => 'Delgado Calisaya',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa (e) de Oficina I de Prensa e Imagen Institucional
        Persona::create([
            'PER_B_DNI'       => '91230035',
            'PER_V_NOMBRE'    => 'Suzie Gladys',
            'PER_V_APELLIDOS' => 'Sato Uesu',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario de Fortalecimiento de la Gestión Descentralizada
        Persona::create([
            'PER_B_DNI'       => '91230036',
            'PER_V_NOMBRE'    => 'Mariano Waldemar',
            'PER_V_APELLIDOS' => 'Chávez Vásquez',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario de Articulación Regional y Local
        Persona::create([
            'PER_B_DNI'       => '91230037',
            'PER_V_NOMBRE'    => 'Rubén Darío',
            'PER_V_APELLIDOS' => 'Antúnez Milla',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario I de Prevención Social y Gestión de la Información
        Persona::create([
            'PER_B_DNI'       => '91230038',
            'PER_V_NOMBRE'    => 'Gustavo Enrique',
            'PER_V_APELLIDOS' => 'Bustamante Hualca',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario de Gestión del Diálogo
        Persona::create([
            'PER_B_DNI'       => '91230039',
            'PER_V_NOMBRE'    => 'Carlos Francisco',
            'PER_V_APELLIDOS' => 'Eyzaguirre Beltroy',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretario I (e) de Seguimiento y Gestión de Compromisos
        Persona::create([
            'PER_B_DNI'       => '91230040',
            'PER_V_NOMBRE'    => 'Carlos Jeisson',
            'PER_V_APELLIDOS' => 'Balarezo Tolentino',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretaria de Asuntos Técnicos de Demarcación y Organización Territorial
        Persona::create([
            'PER_B_DNI'       => '91230041',
            'PER_V_NOMBRE'    => 'Tamara Cusi Alva',
            'PER_V_APELLIDOS' => 'Olórtegui',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Subsecretaria I de Información y Análisis Territorial
        Persona::create([
            'PER_B_DNI'       => '91230042',
            'PER_V_NOMBRE'    => 'Norma Raquel',
            'PER_V_APELLIDOS' => 'Juarez Segura',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa de Oficina I de Gestión Documental y Atención al Ciudadano
        Persona::create([
            'PER_B_DNI'       => '91230043',
            'PER_V_NOMBRE'    => 'Sinthia Rocio',
            'PER_V_APELLIDOS' => 'Mendoza De La Cruz',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa de Oficina I de Abastecimiento
        Persona::create([
            'PER_B_DNI'       => '91230044',
            'PER_V_NOMBRE'    => 'Carmen Ruth',
            'PER_V_APELLIDOS' => 'Ibárcena Espinoza',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefe de Oficina I de Contabilidad y Tesorería
        Persona::create([
            'PER_B_DNI'       => '91230045',
            'PER_V_NOMBRE'    => 'Richard Percy',
            'PER_V_APELLIDOS' => 'Pinto Figueroa',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefe de Oficina I de Seguridad y Defensa Nacional
        Persona::create([
            'PER_B_DNI'       => '91230046',
            'PER_V_NOMBRE'    => 'José Luis',
            'PER_V_APELLIDOS' => 'Caballero Díaz',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa de Oficina I de Cumplimiento de Gobierno
        Persona::create([
            'PER_B_DNI'       => '91230047',
            'PER_V_NOMBRE'    => 'Romina Ximena',
            'PER_V_APELLIDOS' => 'Caminada Vallejo',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa (e) de Oficina I de Relaciones Nacionales e Internacionales
        Persona::create([
            'PER_B_DNI'       => '91230048',
            'PER_V_NOMBRE'    => 'Jeanine Patricia',
            'PER_V_APELLIDOS' => 'Calderón Huari',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefe de Oficina I de Integridad Institucional
        Persona::create([
            'PER_B_DNI'       => '91230049',
            'PER_V_NOMBRE'    => 'Luis Miguel',
            'PER_V_APELLIDOS' => 'Zavaleta Revilla',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefe (e) de Oficina II de Presupuesto
        Persona::create([
            'PER_B_DNI'       => '91230050',
            'PER_V_NOMBRE'    => 'Cristian',
            'PER_V_APELLIDOS' => 'Campos Asorza',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa de Oficina II de Modernización
        Persona::create([
            'PER_B_DNI'       => '91230051',
            'PER_V_NOMBRE'    => 'Rosio Milagro',
            'PER_V_APELLIDOS' => 'Flores Guzmán',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefe (e) de Oficina II de Planeamiento
        Persona::create([
            'PER_B_DNI'       => '91230052',
            'PER_V_NOMBRE'    => 'Carlo Johan',
            'PER_V_APELLIDOS' => 'Espino Cobeña',
            'TID_N_ID'        => 1,
        ]);

        // Funcionario Obligado (probable): Jefa(e) de Oficina II de Programación Multianual de Inversiones
        Persona::create([
            'PER_B_DNI'       => '91230053',
            'PER_V_NOMBRE'    => 'Sandra Beatriz',
            'PER_V_APELLIDOS' => 'Manco Menéndez',
            'TID_N_ID'        => 1,
        ]);

    }
}
