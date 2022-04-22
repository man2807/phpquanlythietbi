<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_user');
            $table->Integer('id_custemer');
            $table->date('time_in');
            $table->date('time_out');
            $table->string('name_pc');
            $table->string('content');
            $table->text('note');
            $table->string('suachua');
            $table->string('supplie');
            $table->string('listSupplie');
            $table->string('status');
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
        Schema::dropIfExists('bills');
    }
}
