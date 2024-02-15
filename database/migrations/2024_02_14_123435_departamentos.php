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
        Schema::create('departamentos', function(Blueprint $table)
		{
			$table->increments('idDepart');
			//$table->integer('idTecnico')->primary();
			$table->integer('CodDepart')->nullable();
			$table->string('NomDepart', 50)->nullable();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
