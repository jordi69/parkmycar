<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkeerplaatsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkeerplaatsen', function (Blueprint $table) {
            $table->increments('prkplid');
            $table->string('prkplstraat');
            $table->smallInteger('prkplstraatnummer');
            $table->string('prkplgemeente');
            $table->double('Prijs',10,2);
            $table->dateTime('BeschikbaarStarttijd');
            $table->dateTime('BeschikbaarStoptijd');
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
        Schema::drop('parkeerplaatsen');
    }
}
