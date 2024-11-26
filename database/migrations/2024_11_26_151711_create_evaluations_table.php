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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained()->onDelete('cascade'); // Denuncia asociada
            $table->foreignId('auditor_id')->constrained('users')->onDelete('cascade'); // Auditor asignado
            $table->date('evaluation_date'); // Fecha de evaluación
            $table->string('result'); // Resultado: 'Desestimado', 'Pasa a control'
            $table->text('comments')->nullable(); // Comentarios opcionales
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
