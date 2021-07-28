<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('ringan_id')->unsigned();
            $table->bigInteger('berat_id')->unsigned();
            $table->timestamps();

            $table->foreign('ringan_id')->references('id')->on('ringans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('berat_id')->references('id')->on('berats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjangs');
    }
}
