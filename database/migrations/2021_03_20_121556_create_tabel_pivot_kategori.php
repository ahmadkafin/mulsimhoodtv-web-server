<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelPivotKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_pivot_kategori', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('kategori_id')->unsigned();
            $table->foreign('kategori_id')->references('id')->on('tabel_kategori')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('tabel_pivot_kategori');
    }
}
