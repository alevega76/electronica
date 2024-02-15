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

        Schema::create('talonarios', function(Blueprint $table)
		{
            $table->increments('idTalonario');
            //$table->integer('idTecnico')->primary();
            $table->integer('NroTalonario')->nullable();
            $table->string('Descripcion', 50)->nullable();
            $table->string('Tipo', 3)->nullable();
            $table->string('Sucursal', 8)->nullable();
            $table->string('DestImpr', 50)->nullable();
            $table->integer('CantMaxItera')->nullable();
            $table->integer('PriNumHab')->nullable();
            $table->integer('UltNumHab')->nullable();
            $table->integer('ProxEmitir')->nullable();
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
