<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('amparos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_amparo')->nullable();
            $table->string('numero_amparo', 20)->unique();
            $table->string('numero_oficio', 20);
            $table->string('colegiado', 250)->nullable();
            $table->boolean('tiene_resolucion')->nullable();
            #$table->foreignId('toca_id')->constrained('toca');
            $table->timestamp('fecha_inicio_amparo')->nullable()->default(Date::now()->toDateTimeString());
            $table->date('fecha_termino')->nullable();
            $table->date('fecha_resolucion_final')->nullable();
            $table->timestamp('created_at')->default(Date::now()->toDateTimeString());
            $table->timestamp('updated_at')->default(Date::now()->toDateTimeString());
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
