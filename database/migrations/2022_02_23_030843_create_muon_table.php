<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muons', function (Blueprint $table) {
            $table->id();
            $table->string('mamuon');
            $table->string('username')->nullable();
            $table->timestamp('ngaymuon')->nullable();
            $table->integer('status');
            $table->dateTime('ngaytra')->nullable();
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
        Schema::dropIfExists('muons');
    }
}
