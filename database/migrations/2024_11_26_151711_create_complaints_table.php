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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Código único de denuncia
            $table->text('description'); // Descripción del caso
            $table->date('submission_date'); // Fecha en que se registró la denuncia
            $table->string('status'); // Estados: 'En proceso', 'Admitido', etc.
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuario asignado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
