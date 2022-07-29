<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id' );
            $table->unsignedBigInteger('doctor_id'  );
            $table->integer('rate_namber' );
            $table->foreign('patient_id')->references('id')->on('Users');
            $table->foreign('doctor_id')->references('id')->on('Users');
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
        Schema::dropIfExists('Rates');
    }
}
