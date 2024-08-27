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
        Schema::table('juzgado_origens', function (Blueprint $table) {
            $table->foreignId('distrito_id')->nullable()->constrained('distritos');
        });

        Schema::table('tocas', function (Blueprint $table) {
            $table->foreignId('juzgado_id')->nullable()->constrained('juzgado_origens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('juzgado_origens', function (Blueprint $table) {
            $table->dropForeign(['distrito_id']);
        });

        Schema::table('tocas', function (Blueprint $table) {
            $table->dropForeign(['juzgado_id']);
        });
    }
};
