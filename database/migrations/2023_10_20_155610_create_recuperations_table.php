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
        Schema::create('recuperations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debtor_id')->nullable();
            $table->string('type');
            $table->string('status');
            $table->timestamps();

            $table->foreign('debtor_id')->references('id')->on('debtors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recuperations');
    }
};
