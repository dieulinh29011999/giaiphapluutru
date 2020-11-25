<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiphongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaiphong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_loai');
            $table->foreign('id_loai')->references('id')->on('loaihoso');
            $table->unsignedBigInteger('id_phong');
            $table->foreign('id_phong')->references('id')->on('phongban');
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
        Schema::dropIfExists('loaiphong');
    }
}
