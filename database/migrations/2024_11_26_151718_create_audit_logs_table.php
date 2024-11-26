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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('action'); // Acción: 'Creación', 'Actualización', etc.
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuario que hizo el cambio
            $table->foreignId('complaint_id')->nullable()->constrained()->onDelete('cascade'); // Denuncia afectada (si aplica)
            $table->text('details')->nullable(); // Detalles adicionales
            $table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP')); // Marca de tiempo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
