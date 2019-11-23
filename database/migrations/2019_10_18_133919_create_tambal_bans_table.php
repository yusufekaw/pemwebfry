<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTambalBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tambal_bans');
        Schema::create('tambal_bans', function (Blueprint $table) {
            $table->string('id_tambal_ban')->primary();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->string('foto');
            $table->text('deskripsi');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('id_user');
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
