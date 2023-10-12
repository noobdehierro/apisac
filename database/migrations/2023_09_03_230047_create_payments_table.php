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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debtor_id');
            $table->integer('quota_number')->nullable();
            $table->date('payment_date');
            $table->decimal('paid_amount', 10, 2);
            $table->string('status', 50)->nullable();
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
        Schema::dropIfExists('payments');
    }
};