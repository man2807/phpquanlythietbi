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
            $table->Integer('iduser')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->Integer('role')->nullable();
            $table->string('tengv')->nullable();
            $table->timestamp('ngaysinh')->nullable();
            $table->Integer('idbomon')->nullable();
            $table->string('chucvu')->nullable();
            $table->string('sdt')->nullable();
            $table->string('email')->nullable();
            $table->Integer('status')->nullable();
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
