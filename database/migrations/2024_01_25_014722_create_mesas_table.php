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
        Schema::create('mesas', function (Blueprint $table) {
            $table->increments('id');
            #$table->foreignId('ctg_mesa_id')->constrained('ctg_mesas');
            #$table->foreignId('ctg_area_id')->constrained('ctg_areas');
            #$table->foreignId('ctg_ponencia_id')->constrained('ctg_ponencias');
            #$table->foreignId('user_id')->constrained('users');
            $table->timestamp('created_at')->default(Date::now()->toDateTimeString());
            $table->timestamp('updated_at')->default(Date::now()->toDateTimeString());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
