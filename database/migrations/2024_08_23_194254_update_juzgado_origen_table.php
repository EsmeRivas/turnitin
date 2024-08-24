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
        Schema::table('juzgado_origen', function (Blueprint $table) {
            $table->foreignId('distrito_id')->nullable()->constrained('distritos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('juzgado_origen', function (Blueprint $table) {
            $table->dropForeign(['distrito_id']);
        });
    }
};
