<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manhanvien');
            $table->string('tennhanvien');
            $table->string('gioitinh');
            $table->date('ngaysinh');
            $table->string('sodienthoai');
            $table->string('diachi');
            $table->string('email');
            $table->unsignedBigInteger('id_phongban');
            $table->foreign('id_phongban')->references('id')->on('phongban');
            $table->unsignedBigInteger('id_chucvu');
            $table->foreign('id_chucvu')->references('id')->on('chucvu');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('nhanvien');
    }
}
