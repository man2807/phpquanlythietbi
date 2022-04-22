<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDMTaiSanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmtaisans', function (Blueprint $table) {
            $table->id();
            $table->string('madmtaisan')->nullable();
            $table->string('tendmtaisan')->nullable();
            $table->Integer('soluong')->nullable();
            $table->string('donvitinh')->nullable();
            $table->string('ghichu')->nullable();            
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
        Schema::dropIfExists('dmtaisans');
    }
}
