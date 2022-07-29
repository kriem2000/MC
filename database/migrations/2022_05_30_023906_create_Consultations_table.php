<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger( 'doctor_id' );
            $table->unsignedBigInteger( 'speciality_id' );
            $table->foreign('patient_id')->references('id')->on('Users');
            $table->foreign('doctor_id')->references('id')->on('Users');
            $table->foreign('speciality_id')->references('id')->on('Specialities');
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
        Schema::dropIfExists('Consultations');
    }
}
