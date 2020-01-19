<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_book', function (Blueprint $table) {
            $table->bigIncrements('id_log_book');
            $table->string('nama');
            $table->text('file');
            $table->string('progress');
            $table->string('mahasiswa_id');
            $table->string('dosen_id');
            $table->string('id_pengajuan');
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
        Schema::dropIfExists('log_book');
    }
}
