<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhapTBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhaptbs', function (Blueprint $table) {
            $table->id();
            $table->string('manhap')->nullable();
            $table->timestamp('ngaynhap')->nullable();
            $table->string('matb')->nullable();
            $table->Integer('soluongnhap')->nullable();                   
            $table->Integer('status');
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
        Schema::dropIfExists('nhaptbs');
    }
}
