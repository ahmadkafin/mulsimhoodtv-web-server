<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelPivotImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_pivot_images', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('image_id')->unsigned();
            $table->foreign('image_id')->references('id')->on('tabel_gallery')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('konten_id')->unsigned();
            $table->foreign('konten_id')->references('id')->on('tabel_konten')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
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
        Schema::dropIfExists('tabel_pivot_images');
    }
}
