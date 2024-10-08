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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('password');
            #$table->foreignId('persona_id')->constrained('personas');
            #$table->foreignId('rol_id')->constrained('roles');
            #$table->foreignId('ctg_area_id')->constrained('ctg_areas');
            $table->timestamp('created_at')->default(Date::now()->toDateTimeString());
            $table->timestamp('updated_at')->default(Date::now()->toDateTimeString());
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }


};
