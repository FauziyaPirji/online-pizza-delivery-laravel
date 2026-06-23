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
            $table->string('f_name',50);
            $table->string('m_name',50);
            $table->string('l_name',50);
            $table->string('usertype',50)->default('user');
            $table->date('dob',50);
            $table->string('file_name')->nullable();
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone',15);
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
