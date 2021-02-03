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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->unsignedInteger('bg_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('lga_id')->nullable();
            $table->unsignedInteger('nal_id')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
