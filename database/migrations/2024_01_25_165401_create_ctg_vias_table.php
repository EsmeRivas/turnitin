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
        Schema::create('ctg_vias', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('es_auto')->default(false);
            $table->boolean('activo')->default(true);
            #$table->foreignId('ctg_tipo_recurso_id')->constrained('ctg_tipo_recursos');
            $table->timestamp('created_at')->default(Date::now()->toDateTimeString());
            $table->timestamp('updated_at')->default(Date::now()->toDateTimeString());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctg_vias');
    }
};
