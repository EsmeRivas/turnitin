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
        Schema::create('ctg_ponencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_ponencia');
            $table->boolean('activo')->default(true);
            #$table->foreignId('ctg_ponente_id')->constrained('ctg_ponentes');
            #$table->foreignId('ctg_area_id')->constrained('ctg_areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctg_ponencias');
    }
};
