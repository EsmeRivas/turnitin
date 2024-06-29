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
        Schema::create('quejosos', function (Blueprint $table) {
            $table->id();
            #$table->foreignId('parte_id')->constrained('partes');
            #$table->foreignId('amparo')->constrained('amparos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quejosos');
    }
};
