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
        Schema::table('reparar', function (Blueprint $table) {
            $table->integer('CodSolicitud')->nullable(); // Agregar el campo "age" de tipo integer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reparar', function (Blueprint $table) {
            $table->dropColumn('CodSolicitud'); // Si necesitas revertir el cambio
        });
    }
};
