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
        Schema::create('debtors', function (Blueprint $table) {
            $table->id();
            $table->string('access_code');
            $table->string('credit_number');
            $table->string('full_name');
            $table->string('status')->nullable();
            $table->float('remainingDebt')->nullable();
            $table->date('nextPayday')->nullable();
            $table->float('capital')->nullable();
            $table->float('sce')->nullable();
            $table->float('minimum_to_collect')->nullable();
            $table->float('cash')->nullable();
            $table->string('nameInCash')->nullable();
            $table->float('1_3_months')->nullable();
            $table->string('nameIn1_3')->nullable();
            $table->float('4_6_months')->nullable();
            $table->string('nameIn4_6')->nullable();
            $table->float('7_12_months')->nullable();
            $table->string('nameIn7_12')->nullable();
            $table->float('13_18_months')->nullable();
            $table->string('nameIn13_18')->nullable();
            $table->float('19_24_months')->nullable();
            $table->string('nameIn19_24')->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('agreement')->nullable();
            $table->string('payment_bank')->nullable();
            $table->string('interbank_key')->nullable();
            $table->string('product')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debtors');
    }
};
