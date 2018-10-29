<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tujuan_disposisi');
            $table->string('isi_disposisi');
            $table->string('batas_waktu');
            $table->string('catatan');
            $table->string('sifat_disposisi');
            $table->integer('id_surat')->unsigned();

            $table->foreign('id_surat')->references('id')->on('inboxes')->onDelete('cascade');
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
        Schema::dropIfExists('disposisi');
    }
}
