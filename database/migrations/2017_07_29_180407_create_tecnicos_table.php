<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnicosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tecnicos', function(Blueprint $table)
		{
			$table->increments('idTecnico');
			//$table->integer('idTecnico')->primary();
			$table->integer('CodTecnico')->nullable();
			$table->string('NomTecnico', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tecnicos');
	}

}
