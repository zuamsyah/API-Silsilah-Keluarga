<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSilsilahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('silsilah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->char('jenis_kelamin', 1);
            $table->integer('id_orang_tua')->nullable();
            $table->foreign('id_orang_tua')->references('id')->on('silsilah')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('silsilah');
    }
}
