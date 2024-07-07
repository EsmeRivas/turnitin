<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InfoSeeder extends Seeder
{
    public function run(): void
    {   

        //NO SE ASIGNARÁ AREA PORQUE LA TABLA USUARIOS LO ASIGNA
        $personas = [
            ['nombre' => 'ALEXIS', 'apellido1' => 'VAZQUEZ', 'apellido2' => 'MORALES', 'es_fisica' => true],
            ['nombre' => 'ESMERALDA', 'apellido1' => 'RIVAS', 'apellido2' => 'LUNA', 'es_fisica' => true]
        ];

        $distritos = [
            ['nombre_distrito' => 'ACAYUCAN'],
            ['nombre_distrito' => 'COATEPEC'],
            ['nombre_distrito' => 'COATZACOALCOS'],
            ['nombre_distrito' => 'CORDOBA'],
            ['nombre_distrito' => 'COSAMALOAPAN'],
            ['nombre_distrito' => 'CHICONTEPEC'],
            ['nombre_distrito' => 'HUATUSCO'],
            ['nombre_distrito' => 'HUAYACOCOTLA'],
            ['nombre_distrito' => 'JALACINGO'],
            ['nombre_distrito' => 'MARTINEZ DE LA TORRE'],
            ['nombre_distrito' => 'MEDELLIN'],
            ['nombre_distrito' => 'MINATITLAN'],
            ['nombre_distrito' => 'MISANTLA'],
            ['nombre_distrito' => 'ORIZABA'],
            ['nombre_distrito' => 'OZULUAMA'],
            ['nombre_distrito' => 'PANUCO'],
            ['nombre_distrito' => 'PAPANTLA'],
            ['nombre_distrito' => 'POZA RICA'],
            ['nombre_distrito' => 'SAN ANDRES TUXTLA'],
            ['nombre_distrito' => 'TANTOYUCA'],
            ['nombre_distrito' => 'TIERRA BLANCA'],
            ['nombre_distrito' => 'TUXPAN'],
            ['nombre_distrito' => 'VERACRUZ'],
            ['nombre_distrito' => 'XALAPA'],
            ['nombre_distrito' => 'PALMA SOLA'],
            ['nombre_distrito' => 'ZONGOLICA'],
        ];

        $roles = [
            ['nombre_rol' => 'ADMINISTRADOR']
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

        $ponentes = [
            [
                'activo' => true,
                'persona_id' => 1
            ]
        ];

        $ponencias = [
            ['nombre_ponencia' => 'PONENCIA UNO PRIMERA SALA', 'activo' => true, 'ctg_ponente_id' => 1, 'ctg_area_id' => 1],
            ['nombre_ponencia' => 'PONENCIA DOS SEGUNDA SALA', 'activo' => true, 'ctg_ponente_id' => 1, 'ctg_area_id' => 2],
            ['nombre_ponencia' => 'PONENCIA TRES TERCERA SALA', 'activo' => true, 'ctg_ponente_id' => 1, 'ctg_area_id' => 3],
        ];

        $users = [
            ['username' => 'Admin', 'password' => '123admin', 'persona_id' => 1, 'rol_id' => 1, 'ctg_area_id' => 1]
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

        foreach ($personas as $persona) {
            DB::table('personas')->insert([
                'nombre' => $persona['nombre'],
                'apellido1' => $persona['apellido1'],
                'apellido2' => $persona['apellido2'],
                'es_fisica' => $persona['es_fisica']
            ]);
        }

        foreach ($distritos as $distritos) {
            DB::table('distritos')->insert([
                'nombre_distrito' => $distritos['nombre_distrito'],
            ]);
        }

        foreach ($roles as $rol) {
            DB::table('roles')->insert([
                'nombre_rol' => $rol['nombre_rol']
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

        foreach ($ponentes as $ponente) {
            DB::table('ctg_ponentes')->insert([
                'activo' => $ponente['activo'],
                'persona_id' => $ponente['persona_id'],
            ]);
        }

        foreach ($ponencias as $ponencia) {
            DB::table('ctg_ponencias')->insert([
                'nombre_ponencia' => $ponencia['nombre_ponencia'],
                'activo' => $ponencia['activo'],
                'ctg_ponente_id' => $ponencia['ctg_ponente_id'],
                'ctg_area_id' => $ponencia['ctg_area_id'],
            ]); 
        }

        foreach ($users as $user) {
            DB::table('users')->insert([
                'username' => $user['username'],
                'password' => $user['password'],
                'persona_id' => $user['persona_id'],
                'rol_id' => $user['rol_id'],
                'ctg_area_id' => $user['ctg_area_id'],
            ]); 
        }

        //FALTA EJECUTAR PONENCIAS Y PONENTE
        // foreach ($ponentes as $ponente) {
        //     DB::table('ctg_ponentes')->insert([
        //         'id' => $ponente['id'],
        //         'activo' => $ponente['activo'],
        //         'persona_id' => $ponente['persona_id'],
        //     ]);
        // }

        // foreach ($ponencias as $ponencia) {
        //     DB::table('ctg_ponencias')->insert([
        //         'id' => $ponencia['id'],
        //         'nombre_ponencia' => $ponencia['nombre_ponencia'],
        //         'activo' => $ponencia['activo'],
        //         'ctg_ponente_id' => $ponencia['ctg_ponente_id'],
        //         //NO SE ASIGNARÁ AREA PORQUE LA TABLA USUARIOS LO ASIGNA
        //         //'ctg_area_id' => $ponencia['ctg_area_id'],
        //     ]);
        // }

        // foreach ($mesas as $mesa) {
        //     DB::table('ctg_mesas')->insert([
        //         'nombre_mesa' => $mesa['nombre_mesa'],
        //         'activo' => true,
        //     ]);
        // }
        
        // foreach ($delitos as $delito) {
        //     DB::table('ctg_delitos')->insert([
        //         'nombre_delito' => $delito['nombre_delito'],
        //         'activo' => true,
        //     ]);
        // }
        
        // foreach ($apelos as $apelo) {
        //     DB::table('ctg_apelos')->insert([
        //         'id' => $apelo['id'],
        //         'nombre_tipo_apelo' => $apelo['nombre_tipo_apelo'],
        //         'activo' => $apelo ['activo'],
        //     ]);
        // }

        // foreach ($ctg_partes as $partes) {
        //     DB::table('ctg_tipo_partes')->insert([
        //         'id' => $partes['id'],
        //         'nombre_tipo_parte' => $partes['nombre_tipo_parte'],
        //         'activo' => $partes ['activo'],
        //     ]);
        // } 

    }
}
