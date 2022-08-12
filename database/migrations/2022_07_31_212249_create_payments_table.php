<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
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
            $table->unsignedInteger('user_id');
            $table->string('reference')->nullable();
            $table->double('amount',8,2)->nullable();
            $table->double('requested_amount',8,2)->nullable();
            $table->string('gateway_response')->nullable();
            $table->string('channel')->nullable();
            $table->string('currency')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->json('customer')->nullable();
            $table->json('log')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
