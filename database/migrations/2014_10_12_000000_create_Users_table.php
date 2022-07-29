<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string( 'email');
            $table->string('password');
            $table->string('phone_number')->default()->nullable();
            $table->string( 'profile_img')->default()->nullable();
            $table->text('profile_description')->default()->nullable();
            $table->boolean('is_approved')->default(false)->nullable();
            $table->string('cv_path')->default()->nullable();
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
        Schema::dropIfExists('Users');
    }
}
