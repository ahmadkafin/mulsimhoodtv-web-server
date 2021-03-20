<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelKonten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_konten', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('konten_id', 25)->unique()->comment("5 digit pertama kategori yang di pakai");
            $table->string('konten_slugs', 50)->unique();
            $table->string('konten_title', 50);
            $table->longText('konten_body')->nullable();
            $table->string('konten_video', 100)->nullable();
            $table->boolean('konten_status')->default(false);
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
        Schema::dropIfExists('tabel_konten');
    }
}
