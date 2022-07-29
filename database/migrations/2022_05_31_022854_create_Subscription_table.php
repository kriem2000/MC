<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('offer_id');
            $table->datetime('start_data' );
            $table->datetime('end_data');
            $table->integer('consultation_number' );
            $table->foreign('patient_id')->references('id')->on('Users');
            $table->foreign('offer_id')->references('id')->on('Offers');
            $table->foreign('payment_id')->references('id')->on('Payment');
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
        Schema::dropIfExists('Subscription');
    }
}
