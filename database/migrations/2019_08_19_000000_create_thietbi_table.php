<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThietBiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thietbis', function (Blueprint $table) {
            $table->id();
            $table->string('matb')->nullable();
            $table->string('tentb')->nullable();
            $table->Integer('iddanhmuc')->nullable();
            $table->Integer('idbomon')->nullable();
            $table->string('mota')->nullable();
            $table->Integer('soluong')->nullable();
            $table->string('donvitinh')->nullable();
            $table->Integer('soluonghong')->nullable();
            $table->Integer('soluongtot')->nullable();
            $table->string('ghichu')->nullable();
            $table->timestamp('ngaymua')->nullable();
            $table->Integer('giamua')->nullable();
            $table->Integer('soluongmuon')->nullable();
            $table->string('makho')->nullable();
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
        Schema::dropIfExists('thietbis');
    }
}
