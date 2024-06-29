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
        Schema::create('ctg_areas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_centro_trabajo', 100);
            $table->boolean('es_primera_instancia')->default(false);
            $table->boolean('activo')->default(true);
            #$table->foreignId('distrito_id')->constrained('distritos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctg_areas');
    }
};
