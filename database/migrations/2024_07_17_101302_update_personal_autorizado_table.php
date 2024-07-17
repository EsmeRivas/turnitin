<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('personal_autorizado', function (Blueprint $table) {
            $table->foreignId('toca_id')->nullable()->constrained('tocas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_autorizado', function (Blueprint $table) {
            $table->dropForeign(['toca_id']);
        });
    }
};
