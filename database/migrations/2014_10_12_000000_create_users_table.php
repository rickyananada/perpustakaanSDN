<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('userId')->unique();
            $table->enum('gender',['male','female'])->default('male');
            $table->string('email')->unique()->nullable();
            $table->longtext('address')->nullable();
            $table->enum('role',['admin','kepsek','siswa'])->default('siswa');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
