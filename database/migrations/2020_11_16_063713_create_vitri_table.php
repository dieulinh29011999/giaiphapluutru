<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mavitri');
            $table->string('soday');
            $table->string('sotu');
            $table->string('soke');
            $table->string('songan');
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
        Schema::dropIfExists('vitri');
    }
}
