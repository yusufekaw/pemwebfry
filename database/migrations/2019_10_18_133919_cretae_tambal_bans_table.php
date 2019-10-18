<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CretaeTambalBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambal_bans', function (Blueprint $table) {
            $table->string('id_tambal_ban')->primary();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->text('deskripsi');
            $table->double('latitude');
            $table->double('longitude');
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
        Schema::dropIfExists('tambal_bans');
    }
}
