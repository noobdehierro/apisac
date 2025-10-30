<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('debtors', function (Blueprint $table) {
            $table->string('nvo_rfc')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('vehicle_year')->nullable();
            $table->string('vin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('debtors', function (Blueprint $table) {
            $table->dropColumn(['nvo_rfc', 'marca', 'modelo', 'vehicle_year', 'vin']);
        });
    }
};
