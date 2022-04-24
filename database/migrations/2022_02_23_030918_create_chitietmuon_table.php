<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietMuonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietmuons', function (Blueprint $table) {
            $table->id();
            $table->string('matb')->nullable();
            $table->string('mamuon')->nullable();
            $table->Integer('soluongmuon')->nullable();
            $table->Integer('soluongtratot')->nullable();
            $table->Integer('soluongtrahong')->nullable();
            $table->string('idbomon')->nullable();
            $table->Integer('status')->nullable();
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
        Schema::dropIfExists('chitietmuons'); 
    }
}
