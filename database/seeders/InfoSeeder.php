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
            ['nombre_distrito' => 'ZONGOLICA']
        ];

        $juzgado_origen = [
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'CALLE MARIANO OTERO SIN NÚMERO, ENTRE CALLE FLORES MAGÓN Y CALLE BELISARIO DOMÍNGUEZ, COLONIA REVOLUCIÓN MEXICANA, CP 93997, PÁNUCO, VERACRUZ.', 'distrito_id' => 16],
            ['juzgado' => 'JUZGADO MIXTO DE PRIMERA INSTANCIA', 'direccion' => 'CALLE NACIONAL HIDALGO SIN NÚMERO, ENTRE CALLE REVOLUCIÓN Y CALLE ADOLFO LÓPEZ MATEOS, COLONIA ROMA, CP 92080, OZULUAMA, VERACRUZ.', 'distrito_id' => 15],
            ['juzgado' => 'JUZGADO MIXTO DE PRIMERA INSTANCIA', 'direccion' => 'CALLE IGNACIO ALLENDE NÚMERO 96, ESQUINA CALLE 16 DE SEPTIEMBRE, ZONA CENTRO, CP 92120, TANTOYUCA, VERACRUZ.', 'distrito_id' => 20],
            ['juzgado' => 'JUZGADO MIXTO DE PRIMERA INSTANCIA', 'direccion' => 'JUAREZ NO. 1, INTERIOR 6, COLONIA CENTRO, CP 92600, HUAYACOCOTLA, VERACRUZ.', 'distrito_id' => 8],
            ['juzgado' => 'JUZGADO MIXTO DE PRIMERA INSTANCIA', 'direccion' => 'PRIMERA CERRADA DE AVENIDA ADOLFO LÓPEZ MATEOS SIN NÚMERO, A UN COSTADO DEL RECLUSORIO Y DETRÁS DEL H. AYUNTAMIENTO, COLONIA CENTRO, CP 92700, CHICONTEPEC, VERACRUZ.', 'distrito_id' => 6],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'AVENIDA PASEO DE LA REFORMA NÚMERO 3, SOBRE LA CARRETERA TUXPAN-TAMIAHUA, ENTRE EL INFONAVIT DE LOS ELECTRICISTAS Y EL PANTEÓN MUNICIPAL "JARDÍN", COLONIA EX HACIENDA DE LA ASUNCIÓN, CP. 92830, TUXPÁN DE RODRÍGUEZ CANO, VERACRUZ.', 'distrito_id' => 22],
            ['juzgado' => 'JUZGADO CUARTO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'AVENIDA PASEO DE LA REFORMA NÚMERO 3, SOBRE LA CARRETERA TUXPAN-TAMIAHUA, ENTRE EL INFONAVIT DE LOS ELECTRICISTAS Y EL PANTEÓN MUNICIPAL "JARDÍN", COLONIA EX HACIENDA DE LA ASUNCIÓN, CP. 92830, TUXPÁN DE RODRÍGUEZ CANO, VERACRUZ.', 'distrito_id' => 22],
            ['juzgado' => 'JUZGADO OCTAVO DE PRIMERA INSTNACIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'BOULEVARD ADOLFO RUÍZ CORTINES NÚMERO 1423, ENTRE CALLE NUEVE, AVENIDA UNO Y CALLE SIETE, COLONIA BENITO JUÁREZ, CP 93310, POZA RICA DE HIDALGO, VERACRUZ.', 'distrito_id' => 18],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'BOULEVARD ADOLFO RUÍZ CORTINES NÚMERO 1423, ENTRE CALLE NUEVE, AVENIDA UNO Y CALLE SIETE, COLONIA BENITO JUÁREZ, CP 93310, POZA RICA DE HIDALGO, VERACRUZ.', 'distrito_id' => 18],
            ['juzgado' => 'JUZGDO CUARTO DE PRIMERA INSTANCIA', 'direccion' => 'BOULEVARD ADOLFO RUÍZ CORTINES NÚMERO 1423, ENTRE CALLE NUEVE, AVENIDA UNO Y CALLE SIETE, COLONIA BENITO JUÁREZ, CP 93310, POZA RICA DE HIDALGO, VERACRUZ.', 'distrito_id' => 18],
            ['juzgado' => 'JUZGADO SEXTO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'CALLE MARIANO ARISTA NÚMERO 309, EDIFICIO LOZANO, ENTRE CALLE MANLIO FABIO ALTAMIRANO Y CALLE DIECISÉIS DE SEPTIEMBRE, COLONIA TAJÍN, CP 93330, POZA RICA DE HIDALGO, VERACRUZ.', 'distrito_id' => 18],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'PROLONGACIÓN 16 DE SEPTIEMBRE NÚMERO 709, ENTRE CALLE CUATRO Y PROLONGACIÓN CARRETERA TAJÍN, COLONIA CORPUS CHRISTY, CP 93489, PAPANTLA, VERACRUZ.', 'distrito_id' => 17],
            ['juzgado' => 'JUZGADO CUARTO DE PRIMERA INSTANCIA, CON RESIDENCIA EN MARTÍNEZ DE LA TORRE', 'direccion' => 'CALLE MANANTIALES NÚMERO 112, COLONIA SANTA ANA, CP 93607, MARTÍNEZ DE LA TORRE, VERACRUZ.', 'distrito_id' => 13],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'AVENIDA MANUEL ÁVILA CAMACHO NÚMERO 817, ENTRE CALLE GABRIELA MISTRAL Y CALLE FELICIANO LÓPEZ SANTIAGO, COLONIA MARCO ANTONIO MUÑOZ, CP 93829, MISANTLA, VERACRUZ.', 'distrito_id' => 13],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'AVENIDA 5 DE MAYO NÚMERO 59, ENTRE CALLE ÚRSULO GALVÁN Y CALLE VENUSTIANO CARRANZA, CUARTEL TERCERO, COLONIA CENTRO, CP 93660, JALACINGO, VERACRUZ.', 'distrito_id' => 9],
            ['juzgado' => 'JUZGADO PRIMERO DE PRIMERA INSTANCIA CON COMPETENCIA EN MATERIA FAMILIAR', 'direccion' => 'CARRETERA NAOLINCO-MIAHUATLAN #50, PREDIO EL DURAZNO, CP 91400, NAOLINCO DE VICTORIA, VERACRUZ.', 'distrito_id' => 24],
            ['juzgado' => 'JUZGADO OCTAVO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'AVENIDA LÁZARO CÁRDENAS NO. 331, COL. EL MIRADOR, CP. 91170', 'distrito_id' => 24],
            ['juzgado' => 'JUZGADO CUARTO DE PRIMERA INSTANCIA', 'direccion' => 'AVENIDA LÁZARO CÁRDENAS NO. 331, COL. EL MIRADOR, CP. 91170', 'distrito_id' => 24],
            ['juzgado' => 'JUZGADO DECIMO SEXTO DE PRIMERA INSTANCIA', 'direccion' => 'AVENIDA LÁZARO CÁRDENAS NO. 331, COL. EL MIRADOR, CP. 91170', 'distrito_id' => 24],
            ['juzgado' => 'JUZGADO DECIMO SEGUNDO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'AVENIDA LÁZARO CÁRDENAS NO. 331, COL. EL MIRADOR, CP. 91170', 'distrito_id' => 24],
            ['juzgado' => 'JUZGADO DECIMO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'AVENIDA LÁZARO CÁRDENAS NO. 331, COL. EL MIRADOR, CP. 91170', 'distrito_id' => 24],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'AVENIDA LÁZARO CÁRDENAS NO. 331, COL. EL MIRADOR, CP. 91170', 'distrito_id' => 24],
            ['juzgado' => 'JUZGADO SEXTO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'AVENIDA LÁZARO CÁRDENAS NO. 331, COL. EL MIRADOR, CP. 91170', 'distrito_id' => 24],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'CALLE CATADORES NÚMERO 2-A, CASI ESQUINA CON PROLONGACIÓN DE LA CALLE 16 DE SEPTIEMBRE, FRACCIONAMIENTO SAN JOSÉ, CP 91584, COATEPEC, VERACRUZ', 'distrito_id' => 2],
            ['juzgado' => 'JUZGADO MIXTO DE PRIMERA INSTANCIA', 'direccion' => 'CALLE UNO SUR, ENTRE AVENIDA 9 PONIENTE Y AVENIDA 11 PONIENTE, COLONIA CENTRO, CP 94100, HUATUSCO ,VERACRUZ.', 'distrito_id' => 7],
            ['juzgado' => 'JUZGADO CUARTO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'CALLE ABASOLO NÚMERO 125, ESQUINA AVENIDA JOSÉ MARIA MORELOS, COLONIA SANTA CRUZ BUENA VISTA, CONGREGACIÓN BUENA VISTA, CP 94690, CÓRDOBA', 'distrito_id' => 4],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'CALLE ABASOLO NÚMERO 125, ESQUINA AVENIDA JOSÉ MARIA MORELOS, COLONIA SANTA CRUZ BUENA VISTA, CONGREGACIÓN BUENA VISTA, CP 94690, CÓRDOBA', 'distrito_id' => 4],
            ['juzgado' => 'JUZGADO SEXTO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'AVENIDA JUÁREZ NÚMERO 353, ESQUINA AVENIDA FERROCARRIL, COLONIA CENTRO, CP 94720, NOGALES, VERACRUZ.', 'distrito_id' => 14],
            ['juzgado' => 'JUZGADO CUARTO DE PRIMERA INSTANCIA', 'direccion' => '5 SUR NO. 134, ENTRE ORIENTE 2 Y 4, PLAZA SANTA MARÍA, CP. 94300', 'distrito_id' => 14],
            ['juzgado' => 'JUZGADO MIXTO DE PRIMERA INSTANCIA', 'direccion' => 'AVENIDA TENIENTE JOSÉ AZUETA NÚMERO 103, ENTRE TERCERA DE BENITO JUÁREZ Y CALLE MIGUEL ALDAMA, COLONIA CENTRO, BARRIO DE GUADALUPE, CP 95000, ZONGOLICA, VERACRUZ.', 'distrito_id' => 26],
            ['juzgado' => 'JUZGADO OCTAVO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'SANTOS PÉREZ ABASCAL SIN NÚMERO, ENTRE AVENIDA JIMÉNEZ SUR Y PROLONGACIÓN CUAUHTÉMOC, COLONIA ORTIZ RUBIO, CP 91750, VERACRUZ, VERACRUZ.', 'distrito_id' => 23],
            ['juzgado' => 'JUZGADO SEXTO DE PRIMERA INSTANCIA', 'direccion' => 'SANTOS PÉREZ ABASCAL SIN NÚMERO, ENTRE AVENIDA JIMÉNEZ SUR Y PROLONGACIÓN CUAUHTÉMOC, COLONIA ORTIZ RUBIO, CP 91750, VERACRUZ, VERACRUZ.', 'distrito_id' => 23],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'SANTOS PÉREZ ABASCAL SIN NÚMERO, ENTRE AVENIDA JIMÉNEZ SUR Y PROLONGACIÓN CUAUHTÉMOC, COLONIA ORTIZ RUBIO, CP 91750, VERACRUZ, VERACRUZ.', 'distrito_id' => 23],
            ['juzgado' => 'JUZGADO CUARTO DE PRIMERA INSTANCIA', 'direccion' => 'SANTOS PÉREZ ABASCAL SIN NÚMERO, ENTRE AVENIDA JIMÉNEZ SUR Y PROLONGACIÓN CUAUHTÉMOC, COLONIA ORTIZ RUBIO, CP 91750, VERACRUZ, VERACRUZ.', 'distrito_id' => 23],
            ['juzgado' => 'JUZGADO DECIMO SEGUNDO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'SANTOS PÉREZ ABASCAL SIN NÚMERO, ENTRE AVENIDA JIMÉNEZ SUR Y PROLONGACIÓN CUAUHTÉMOC, COLONIA ORTIZ RUBIO, CP 91750, VERACRUZ, VERACRUZ.', 'distrito_id' => 23],
            ['juzgado' => 'JUZGADO DECIMO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'SANTOS PÉREZ ABASCAL SIN NÚMERO, ENTRE AVENIDA JIMÉNEZ SUR Y PROLONGACIÓN CUAUHTÉMOC, COLONIA ORTIZ RUBIO, CP 91750, VERACRUZ, VERACRUZ.', 'distrito_id' => 23],
            ['juzgado' => 'JUZGADO DECIMO CUARTO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'SANTOS PÉREZ ABASCAL SIN NÚMERO, ENTRE AVENIDA JIMÉNEZ SUR Y PROLONGACIÓN CUAUHTÉMOC, COLONIA ORTIZ RUBIO, CP 91750, VERACRUZ, VERACRUZ.', 'distrito_id' => 23],
            ['juzgado' => 'JUZGADO CUARTO DE PRIMERA INSTANCIA, CON RESIDENCIA EN TIERRA BLANCA', 'direccion' => 'CALLE ITURBIDE SIN NÚMERO, ENTRE AVENIDA DEL SOLDADO Y AVENIDA INDEPENDENCIA, COLONIA HOJA DEL MAÍZ, CP 95100, TIERRA BLANCA, VERACRUZ.', 'distrito_id' => 5],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'MANZANA 14, LOTE 4, COL. TRES GENERACIONES, 2A ETAPA, CP. 95400', 'distrito_id' => 5],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'PROLONGACIÓN DE LA AVENIDA BENITO JUÁREZ NÚMERO 360, ENTRE CALLE 15 DE MAYO Y CALLE GARDENIAS, COLONIA LOS MANGUITOS, CP 95718, SAN ANDRÉS TUXTLA, VERACRUZ.', 'distrito_id' => 19],
            ['juzgado' => 'JUZGADO CUARTO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR CON RESIDENCIA EN CIUDAD ISLA', 'direccion' => 'AVENIDA FELIPE CARRILLO PUERTO NÚMERO 534, ENTRE IGNACIO ALDAMA Y CIRCUNVALACIÓN SUR, FRACCIONAMIENTO PUNTA DE ISLA, CP 95641, CIUDAD ISLA, VERACRUZ.', 'distrito_id' => 19],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'ATENOGENES PÉREZ I. SOTO SIN NÚMERO, ENTRE CALLE IGNACIO ZARAGOZA Y CALLE JUSTO SIERRA, FRACCIONAMIENTO EL GRECO, COLONIA REVOLUCIÓN CP 96069, ACAYUCAN, VERACRUZ.', 'distrito_id' => 1],
            ['juzgado' => 'JUZGADO OCTAVO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'CARRETERA ANTIGUA COATZACOALCOS-MINATITLAN, KM 17. 5, ESQUINA ENTRADA AL CERESO, COLONIA DUPORT OSTION, CP 96400, COATZACOALCOS, VERACRUZ.', 'distrito_id' => 3],
            ['juzgado' => 'JUZGADO DECIMO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR', 'direccion' => 'CARRETERA ANTIGUA COATZACOALCOS-MINATITLAN, KM 17. 5, ESQUINA ENTRADA AL CERESO, COLONIA DUPORT OSTION, CP 96400, COATZACOALCOS, VERACRUZ.', 'distrito_id' => 3],
            ['juzgado' => 'JUZGADO SEGUNDO DE PRIMERA INSTANCIA', 'direccion' => 'AVENIDA IGNACIO ZARAGOZA NÚMERO 711, ENTRE AVENIDA NICOLÁS BRAVO Y AVENIDA VICENTE GUERRERO, COLONIA CENTRO, CP 96400, COATZACOALCOS, VERACRUZ.', 'distrito_id' => 3],
            ['juzgado' => 'JUZGADO SEXTO DE PRIMERA INSTANCIA', 'direccion' => 'AVENIDA IGNACIO ZARAGOZA NÚMERO 711, ENTRE AVENIDA NICOLÁS BRAVO Y AVENIDA VICENTE GUERRERO, COLONIA CENTRO, CP 96400, COATZACOALCOS, VERACRUZ.', 'distrito_id' => 3],
            ['juzgado' => 'JUZGADO DECIMO SEGUNDO DE PRIMERA INSTANCIA ESPECIALIZADO EN MATERIA FAMILIAR CON RESIDENCIA EN MINATITLÁN', 'direccion' => 'CALLE AZCAPOTAZLCO NÚMERO 7, ENTRE CALLES PARALELAS LA VENTA Y SALAMANCA, COLONIA NUEVA TACOTENO, CP 96735, MINATTITLÁN, VERACRUZ.', 'distrito_id' => 3]
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
            ]
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
            ['nombre_ponencia' => 'PONENCIA TRES TERCERA SALA', 'activo' => true, 'ctg_ponente_id' => 1, 'ctg_area_id' => 3]
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
            ['nombre_mesa' => 'MESA NUEVE']
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
            ['nombre_delito' => 'Delitos contra la intimidad']
        ];
        
        $apelos = [
            ['nombre_tipo_apelo' => 'MINISTERIO PUBLICO', 'activo' => true],
            ['nombre_tipo_apelo' => 'IMPUTADO', 'activo' => true],
            ['nombre_tipo_apelo' => 'SENTENCIADO', 'activo' => true],
            ['nombre_tipo_apelo' => 'ACTOR', 'activo' => true],
            ['nombre_tipo_apelo' => 'DEMANDADO', 'activo' => true],
            ['nombre_tipo_apelo' => 'REPRESENTANTE', 'activo' => true],
            ['nombre_tipo_apelo' => 'VICTIMA', 'activo' => true]
        ];

        $recursos = [
            ['nombre_tipo_recurso_apelado' => 'Recurso de apelación'],
            ['nombre_tipo_recurso_apelado' => 'Recurso de casación'],
            ['nombre_tipo_recurso_apelado' => 'Recurso de queja'],
            ['nombre_tipo_recurso_apelado' => 'Recurso de reforma'],
            ['nombre_tipo_recurso_apelado' => 'Recurso de revisión']
        ];

        $vias = [
            ['es_auto' => true, 'ctg_tipo_recurso_id' => 1],
            ['es_auto' => false, 'ctg_tipo_recurso_id' => 3]
        ];

        $ctg_partes = [
            ['nombre_tipo_parte' => 'ACUSADO'],
            ['nombre_tipo_parte' => 'VICTIMA'],
            ['nombre_tipo_parte' => 'QUEJOSO']
        ];

        $mesas_relacion = [
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 1,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 2,
                'user_id' => 1
            ],

            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 1,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 2,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 3,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 4,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 5,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 6,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 7,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 1,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 2,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 3,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 4,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 5,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 6,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 7,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 8,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
            [
                'ctg_mesa_id' => 9,
                'ctg_area_id' => 8,
                'ctg_ponencia_id' => 3,
                'user_id' => 1
            ],
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
                'nombre_distrito' => $distritos['nombre_distrito']
            ]);
        }

        foreach ($juzgado_origen as $juzgado) {
            DB::table('juzgado_origen')->insert([
                'juzgado' => $juzgado['juzgado'],
                'direccion' => $juzgado['direccion'],
                'distrito_id' => $juzgado['distrito_id']
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
        
        foreach ($apelos as $apelo) {
            DB::table('ctg_apelos')->insert([
                'nombre_tipo_apelo' => $apelo['nombre_tipo_apelo'],
                'activo' => $apelo['activo'],
            ]);
        }

        foreach ($recursos as $recurso) {
            DB::table('ctg_tipo_recursos')->insert([
                'nombre_tipo_recurso_apelado' => $recurso['nombre_tipo_recurso_apelado'],
                'activo' => true,
            ]);
        }

        foreach ($vias as $via) {
            DB::table('ctg_vias')->insert([
                'es_auto' => $via['es_auto'],
                'activo' => true,
                'ctg_tipo_recurso_id' => $via['ctg_tipo_recurso_id'],
            ]);
        }

        foreach ($ctg_partes as $partes) {
            DB::table('ctg_tipo_partes')->insert([
                'nombre_tipo_parte' => $partes['nombre_tipo_parte'],
                'activo' => true,
            ]);
        } 

        foreach ($mesas_relacion as $mesa) {
            DB::table('mesas')->insert([
                'ctg_mesa_id' => $mesa['ctg_mesa_id'],
                'ctg_area_id' => $mesa['ctg_area_id'],
                'ctg_ponencia_id' => $mesa['ctg_ponencia_id'],
                'user_id' => $mesa['user_id']
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
