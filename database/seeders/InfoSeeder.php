<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InfoSeeder extends Seeder
{
    public function run(): void
    {   

        //NO SE ASIGNARÁ AREA PORQUE LA TABLA USUARIOS LO ASIGNA
        $ponencias = [
            ['id' => 1, 'nombre_ponencia' => 'PONENCIA UNO PRIMERA SALA', 'activo' => true, 'ctg_ponente_id' => 1,],
            ['id' => 2, 'nombre_ponencia' => 'PONENCIA DOS SEGUNDA SALA', 'activo' => true, 'ctg_ponente_id' => 2,],
            ['id' => 3, 'nombre_ponencia' => 'PONENCIA TRES TERCERA SALA', 'activo' => true, 'ctg_ponente_id' => 3,],
        ];

        $mesas = [
            ['nombre_mesa' => 'MESA UNO'],
            ['nombre_mesa' => 'MESA DOS'],
            ['nombre_mesa' => 'MESA TRES'],
            ['nombre_mesa' => 'MESA CUATRO'],
            ['nombre_mesa' => 'MESA CINCO'],
            ['nombre_mesa' => 'MESA SEIS'],
            ['nombre_mesa' => 'MESA SIETE'],
            ['nombre_mesa' => 'MESA OCHO'],
            ['nombre_mesa' => 'MESA NUEVE'],
        ];

        $delitos = [
            ['nombre_delito' => 'Delitos contra la persona'],
            ['nombre_delito' => 'Delitos de violencia de género'],
            ['nombre_delito' => 'Delitos económicos'],
            ['nombre_delito' => 'Delitos contra el patrimonio'],
            ['nombre_delito' => 'Delitos contra la salud pública'],
            ['nombre_delito' => 'Delitos de tráfico'],
            ['nombre_delito' => 'Delitos administrativos y políticos'],
            ['nombre_delito' => 'Delitos contra el medio ambiente y urbanísticos'],
            ['nombre_delito' => 'Delitos contra la libertan sexual'],
            ['nombre_delito' => 'Delitos contra la intimidad'],
        ];

        $distritos = [
            ['id' => 1, 'nombre_distrito' => 'ACAYUCAN'],
            ['id' => 2, 'nombre_distrito' => 'COATEPEC'],
            ['id' => 3, 'nombre_distrito' => 'COATZACOALCOS'],
            ['id' => 4, 'nombre_distrito' => 'CORDOBA'],
            ['id' => 5, 'nombre_distrito' => 'COSAMALOAPAN'],
            ['id' => 6, 'nombre_distrito' => 'CHICONTEPEC'],
            ['id' => 7, 'nombre_distrito' => 'HUATUSCO'],
            ['id' => 8, 'nombre_distrito' => 'HUAYACOCOTLA'],
            ['id' => 9, 'nombre_distrito' => 'JALACINGO'],
            ['id' => 10, 'nombre_distrito' => 'MARTINEZ DE LA TORRE'],
            ['id' => 11, 'nombre_distrito' => 'MEDELLIN'],
            ['id' => 12, 'nombre_distrito' => 'MINATITLAN'],
            ['id' => 13, 'nombre_distrito' => 'MISANTLA'],
            ['id' => 14, 'nombre_distrito' => 'ORIZABA'],
            ['id' => 15, 'nombre_distrito' => 'OZULUAMA'],
            ['id' => 16, 'nombre_distrito' => 'PANUCO'],
            ['id' => 17, 'nombre_distrito' => 'PAPANTLA'],
            ['id' => 18, 'nombre_distrito' => 'POZA RICA'],
            ['id' => 19, 'nombre_distrito' => 'SAN ANDRES TUXTLA'],
            ['id' => 20, 'nombre_distrito' => 'TANTOYUCA'],
            ['id' => 21, 'nombre_distrito' => 'TIERRA BLANCA'],
            ['id' => 22, 'nombre_distrito' => 'TUXPAN'],
            ['id' => 23, 'nombre_distrito' => 'VERACRUZ'],
            ['id' => 24, 'nombre_distrito' => 'XALAPA'],
            ['id' => 25, 'nombre_distrito' => 'PALMA SOLA'],
            ['id' => 26, 'nombre_distrito' => 'ZONGOLICA'],
        ];

        $roles = [
            ['id' => 1, 'nombre_rol' => 'ADMINISTRADOR'],
        ];

        $areas = [
            [
                'nombre_centro_trabajo' => 'PRIMERA SALA PENAL',
                'es_primera_instancia' => false,
                'activo' => true,
                'distrito_id' => 24,
            ],
            [
                'nombre_centro_trabajo' => 'SEGUNDA SALA CIVIL',
                'es_primera_instancia' => false,
                'activo' => true,
                'distrito_id' => 24,
            ],
            [
                'nombre_centro_trabajo' => 'TERCERA SALA PENAL',
                'es_primera_instancia' => false,
                'activo' => true,
                'distrito_id' => 24,
            ],
            [
                'nombre_centro_trabajo' => 'CUARTA SALA CIVIL',
                'es_primera_instancia' => false,
                'activo' => true,
                'distrito_id' => 24,
            ],
            [
                'nombre_centro_trabajo' => 'QUINTA SALA PENAL',
                'es_primera_instancia' => false,
                'activo' => true,
                'distrito_id' => 24,
            ],
            [
                'nombre_centro_trabajo' => 'SEXTA SALA FAMILIAR',
                'es_primera_instancia' => false,
                'activo' => true,
                'distrito_id' => 24,
            ],
            [
                'nombre_centro_trabajo' => 'OCTAVA SALA FAMILIAR',
                'es_primera_instancia' => false,
                'activo' => true,
                'distrito_id' => 24,
            ],
            [
                'nombre_centro_trabajo' => 'SALA CONSTITUCIONAL',
                'es_primera_instancia' => false,
                'activo' => true,
                'distrito_id' => 24,
            ],
        ];
        
        $apelos = [
            ['id' => 1, 'nombre_tipo_apelo' => 'MINISTERIO PUBLICO', 'activo' => true],
            ['id' => 2, 'nombre_tipo_apelo' => 'IMPUTADO', 'activo' => true],
            ['id' => 3, 'nombre_tipo_apelo' => 'SENTENCIADO', 'activo' => true],
            ['id' => 4, 'nombre_tipo_apelo' => 'ACTOR', 'activo' => true],
            ['id' => 5, 'nombre_tipo_apelo' => 'DEMANDADO', 'activo' => true],
            ['id' => 6, 'nombre_tipo_apelo' => 'REPRESENTANTE', 'activo' => true],
            ['id' => 7, 'nombre_tipo_apelo' => 'VICTIMA', 'activo' => true],
        ];

        $ctg_partes = [
            ['id' => 1, 'nombre_tipo_parte' => 'ACUSADO', 'activo' => true],
            ['id' => 2, 'nombre_tipo_parte' => 'VICTIMA', 'activo' => true],
        ];

        //FALTA EJECUTAR PONENCIAS Y PONENTE
        foreach ($ponentes as $ponente) {
            DB::table('ctg_ponentes')->insert([
                'id' => $ponente['id'],
                'activo' => $ponente['activo'],
                'persona_id' => $ponente['persona_id'],
            ]);
        }

        foreach ($ponencias as $ponencia) {
            DB::table('ctg_ponencias')->insert([
                'id' => $ponencia['id'],
                'nombre_ponencia' => $ponencia['nombre_ponencia'],
                'activo' => $ponencia['activo'],
                'ctg_ponente_id' => $ponencia['ctg_ponente_id'],
                //NO SE ASIGNARÁ AREA PORQUE LA TABLA USUARIOS LO ASIGNA
                //'ctg_area_id' => $ponencia['ctg_area_id'],
            ]);
        }

        foreach ($mesas as $mesa) {
            DB::table('ctg_mesas')->insert([
                'nombre_mesa' => $mesa['nombre_mesa'],
                'activo' => true,
            ]);
        }
        
        foreach ($delitos as $delito) {
            DB::table('ctg_delitos')->insert([
                'nombre_delito' => $delito['nombre_delito'],
                'activo' => true,
            ]);
        }

        foreach ($distritos as $distritos) {
            DB::table('distritos')->insert([
                'id' => $distritos['id'],
                'nombre_distrito' => $distritos['nombre_distrito'],
            ]);
        }

        foreach ($roles as $rol) {
            DB::table('roles')->insert([
                'id' => $rol['id'],
                'nombre_rol' => $rol['nombre_rol'],
            ]);
        }

        foreach ($areas as $area) {
            DB::table('ctg_areas')->insert([
                'nombre_centro_trabajo' => $area['nombre_centro_trabajo'],
                'es_primera_instancia' => $area['es_primera_instancia'],
                'activo' => $area['activo'],
                'distrito_id' => $area['distrito_id'],
            ]);
        }
        
        foreach ($apelos as $apelo) {
            DB::table('ctg_apelos')->insert([
                'id' => $apelo['id'],
                'nombre_tipo_apelo' => $apelo['nombre_tipo_apelo'],
                'activo' => $apelo ['activo'],
            ]);
        }

        foreach ($ctg_partes as $partes) {
            DB::table('ctg_tipo_partes')->insert([
                'id' => $partes['id'],
                'nombre_tipo_parte' => $partes['nombre_tipo_parte'],
                'activo' => $partes ['activo'],
            ]);
        } 

    }
}
