<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tocas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_toca', 10)->unique();
            $table->string('numero_expediente', 20);
            #$table->foreignId('ctg_via_id')->constrained('ctg_vias');
            #$table->foreignId('ctg_tipo_recurso_id')->constrained('ctg_tipo_recursos');
            #$table->foreignId('usuario_id')->constrained('users');
            #$table->foreignId('ctg_ponencia_id')->constrained('ctg_ponencias');
            #$table->foreignId('ctg_apelo_id')->constrained('ctg_apelos');
            #$table->foreignId('ctg_juez_id')->constrained('ctg_jueces');
            #$table->foreignId('ctg_area_id')->constrained('ctg_areas');
            #$table->foreignId('mesa_id')->constrained('mesas');
            #$table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tocas');
    }
};
