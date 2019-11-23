<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJamOperasionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jam_operasionals', function (Blueprint $table) {
            $table->string('id_jam_operasional')->primary();
            $table->string('hari');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->integer('order');
            $table->string('id_tambal_ban');
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
        Schema::dropIfExists('jam_operasionals');
    }
}
