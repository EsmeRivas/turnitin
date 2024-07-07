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
        Schema::create('amparos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_amparo', 20)->unique();
            $table->date('fecha_inicio_amparo');
            $table->date('fecha_resolucion_amparo')->nullable();
            $table->boolean('tiene_resolucion')->nullable();
            #$table->foreignId('toca_id')->constrained('toca');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amparos');
    }
};
