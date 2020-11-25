<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHosoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mahoso');
            $table->string('tenhoso');
            $table->date('ngaybanhanh');
            $table->string('thoihanhoso');
            $table->string('thoihanluutru');
            $table->date('ngaytao');
            $table->string('tinhtrang');
            $table->string('filedinhkem');
            $table->unsignedBigInteger('noiluutrubandau');// noi luu tru ho so ban dau
            $table->foreign('noiluutrubandau')->references('id')->on('phongban');
            $table->string('noinhan');
            $table->string('mucdo');
            $table->string('nguoiphutrach');
            $table->unsignedBigInteger('nguoitao');
            $table->foreign('nguoitao')->references('id')->on('users');
            $table->unsignedBigInteger('id_vitri');
            $table->foreign('id_vitri')->references('id')->on('vitri');
            $table->unsignedBigInteger('id_loai');
            $table->foreign('id_loai')->references('id')->on('loaihoso');
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
        Schema::dropIfExists('hoso');
    }
}
