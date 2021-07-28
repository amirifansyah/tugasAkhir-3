<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayars', function (Blueprint $table) {
            $table->id();
            $table->text('req')->nullable();
            $table->bigInteger('berat_id')->unsigned()->nullable();
            $table->bigInteger('ringan_id')->unsigned()->nullable();
            $table->bigInteger('keranjang_id')->unsigned()->nullable();
            $table->bigInteger('promo_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->string('jumlah');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('berat_id')->references('id')->on('berats')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ringan_id')->references('id')->on('ringans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('keranjang_id')->references('id')->on('keranjangs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('promo_id')->references('id')->on('promos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bayars');
    }
}
