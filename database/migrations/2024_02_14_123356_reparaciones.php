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
        Schema::create('Reparar', function(Blueprint $table)
		{
            $table->increments('idRepar');
			$table->integer('CodRepar')->nullable();
			$table->dateTime('FecEntrada')->nullable();
            $table->dateTime('FecSalida')->nullable();
            $table->dateTime('FecCompra')->nullable();
            $table->dateTime('FecOk')->nullable();
            $table->dateTime('FecConsulta')->nullable();
            $table->integer('CodEmpresa')->nullable();
            $table->string('ClientEmpresa', 50)->nullable();
            $table->integer('Aparato')->nullable();
            $table->integer('Marca')->nullable();
            $table->string('Modelo', 50)->nullable();
            $table->string('NroSerie', 50)->nullable();
            $table->string('Domicilio', 50)->nullable();
            $table->string('Telefono', 50)->nullable();
            $table->string('Localidad', 50)->nullable();
            $table->string('NroFactura', 50)->nullable();
            $table->string('CasaVendedora', 50)->nullable();
            $table->integer('EmpresaVendedora')->nullable();
            $table->string('CodOpcion', 1)->nullable();
            $table->string('FueraZona', 1)->nullable();
            $table->string('Garantia', 1)->nullable();
            $table->string('Accesorios', 2000)->nullable();
            $table->string('Observaciones', 2000)->nullable();
            $table->string('Intervension', 2000)->nullable();
            $table->decimal('ImporteCotiz', 8, 2)->nullable(); // Campo numérico con dos decimales
            $table->integer('CodInterv')->nullable();
            $table->string('Notas', 2000)->nullable();
            $table->integer('CodTecnico')->nullable();

		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('Reparar');
    }
};
