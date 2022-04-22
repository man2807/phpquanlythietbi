<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiSanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taisans', function (Blueprint $table) {
            $table->id();
            $table->string('mataisan');
            $table->string('tentaisan')->nullable();
            $table->Integer('iddanhmuc');
            $table->string('mota')->nullable();
            $table->string('ghichu')->nullable();
            $table->timestamp('ngaymua')->nullable();
            $table->Integer('giamua')->nullable();
            $table->string('tinhtrang')->nullable();
            $table->string('vitri')->nullable();
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
        Schema::dropIfExists('taisans');
    }
}
