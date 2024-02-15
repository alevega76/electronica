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

        Schema::create('aparatos', function(Blueprint $table)
		{
            $table->increments('idAparato');
            //$table->integer('idTecnico')->primary();
            $table->integer('CodAparato')->nullable();
            $table->string('NomAparato', 50)->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('Aparatos');
    }
};
