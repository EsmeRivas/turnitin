<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */

    #TODO: QUITAR TODOS LOS NULLABLES DE LOS CAMPOS SEGUN SEA EL CASO , SE AGREGARON PARA CASO DE PREUEBA

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('persona_id')->nullable()->constrained('personas');
            $table->foreignId('rol_id')->nullable()->constrained('roles');
            $table->foreignId('ctg_area_id')->nullable()->constrained('ctg_areas');
        });

        Schema::table('ctg_ponentes', function (Blueprint $table) {
            $table->foreignId('persona_id')->nullable()->constrained('personas');
        });

        Schema::table('ctg_ponencias', function (Blueprint $table) {
            $table->foreignId('ctg_ponente_id')->nullable()->constrained('ctg_ponentes');
            $table->foreignId('ctg_area_id')->nullable()->constrained('ctg_areas');
        });

        Schema::table('ctg_areas', function (Blueprint $table) {
            $table->foreignId('distrito_id')->nullable()->constrained('distritos');
        });

        Schema::table('mesas', function (Blueprint $table) {
            $table->foreignId('ctg_mesa_id')->nullable()->constrained('ctg_mesas');
            $table->foreignId('ctg_area_id')->nullable()->constrained('ctg_areas');
            $table->foreignId('ctg_ponencia_id')->nullable()->constrained('ctg_ponencias');
            $table->foreignId('user_id')->nullable()->constrained('users');
        });

        Schema::table('tocas', function (Blueprint $table) {
            $table->foreignId('ctg_via_id')->nullable()->constrained('ctg_vias');
            $table->foreignId('ctg_tipo_recurso_id')->nullable()->constrained('ctg_tipo_recursos');
            $table->foreignId('usuario_id')->nullable()->constrained('users');
            $table->foreignId('ctg_ponencia_id')->nullable()->constrained('ctg_ponencias');
            $table->foreignId('ctg_apelo_id')->nullable()->constrained('ctg_apelos');
            $table->foreignId('ctg_juez_id')->nullable()->constrained('ctg_jueces');
            $table->foreignId('ctg_area_id')->nullable()->constrained('ctg_areas');
            $table->foreignId('mesa_id')->nullable()->constrained('mesas');
            $table->foreignId('user_id')->nullable()->constrained('users');
        });

        Schema::table('partes', function (Blueprint $table) {
            $table->foreignId('persona_id')->nullable()->constrained('personas');
            $table->foreignId('toca_id')->nullable()->constrained('tocas');
            $table->foreignId('ctg_tipo_parte_id')->nullable()->constrained('ctg_tipo_partes');
        });

        Schema::table('quejosos', function (Blueprint $table) {
            $table->foreignId('parte_id')->nullable()->constrained('partes');
            $table->foreignId('amparo')->nullable()->constrained('amparos');
        });

        Schema::table('ctg_jueces', function (Blueprint $table) {
            $table->foreignId('persona_id')->nullable()->constrained('personas');
        });

        Schema::table('ctg_vias', function (Blueprint $table) {
            $table->foreignId('ctg_tipo_recurso_id')->nullable()->constrained('ctg_tipo_recursos');
        });

        Schema::table('delitos', function (Blueprint $table) {
            $table->foreignId('ctg_delito_id')->nullable()->constrained('ctg_delitos');
            $table->foreignId('toca_id')->nullable()->constrained('tocas');
        });

        Schema::table('amparos', function (Blueprint $table) {
            $table->foreignId('toca_id')->nullable()->constrained('tocas');
        });

        Schema::table('observacions', function (Blueprint $table) {
            $table->foreignId('toca_id')->nullable()->constrained('tocas');
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['persona_id']);
            $table->dropForeign(['rol_id']);
            $table->dropForeign(['ctg_area_id']);
        });

        Schema::table('ctg_ponentes', function (Blueprint $table) {
            $table->dropForeign(['persona_id']);
        });

        Schema::table('ctg_ponencias', function (Blueprint $table) {
            $table->dropForeign(['ctg_ponente_id']);
            $table->dropForeign(['ctg_area_id']);
        });

        Schema::table('ctg_areas', function (Blueprint $table) {
            $table->dropForeign(['distrito_id']);
        });

        Schema::table('mesas', function (Blueprint $table) {
            $table->dropForeign(['ctg_mesa_id']);
            $table->dropForeign(['ctg_area_id']);
            $table->dropForeign(['ctg_ponencia_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('tocas', function (Blueprint $table) {
            $table->dropForeign(['ctg_via_id']);
            $table->dropForeign(['ctg_tipo_recurso_id']);
            $table->dropForeign(['ctg_apelo_id']);
            $table->dropForeign(['ctg_juez_id']);
            $table->dropForeign(['ctg_area_id']);
            $table->dropForeign(['mesa_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('partes', function (Blueprint $table) {
            $table->dropForeign(['persona_id']);
            $table->dropForeign(['toca_id']);
            $table->dropForeign(['ctg_tipo_parte_id']);
        });

        Schema::table('quejosos', function (Blueprint $table) {
            $table->dropForeign(['parte_id']);
            $table->dropForeign(['amparo']);
        });

        Schema::table('ctg_jueces', function (Blueprint $table) {
            $table->dropForeign(['persona_id']);
        });

        Schema::table('ctg_vias', function (Blueprint $table) {
            $table->dropForeign(['ctg_tipo_recurso_id']);
        });

        Schema::table('delitos', function (Blueprint $table) {
            $table->dropForeign(['ctg_delito_id']);
            $table->dropForeign(['toca_id']);
        });

        Schema::table('amparos', function (Blueprint $table) {
            $table->dropForeign(['toca_id']);
        });

        Schema::table('observacions', function (Blueprint $table) {
            $table->dropForeign(['toca_id']);
        });
    }
};



