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

        /*

          Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('old_column_name', 'new_column_name');
        });

        Schema::table('users', function (Blueprint $table) {
    $table->renameColumn('from', 'to');
});

        */
        Schema::table('reparar', function (Blueprint $table) {
            $table->renameColumn('Intervencion', 'Intervension');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reparar', function (Blueprint $table) {
            $table->renameColumn('Intervension', 'Intervencion');
        });
    }
};
