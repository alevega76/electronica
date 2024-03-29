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
        Schema::create('marcas', function(Blueprint $table)
		{
			$table->increments('idMarca');
			//$table->integer('idTecnico')->primary();
			$table->integer('CodMarca')->nullable();
			$table->string('NomMarca', 50)->nullable();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('marcas');
    }
};
