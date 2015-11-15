<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeParkeerplaatsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parkeerplaatsen', function (Blueprint $table) {
            $table->dropColumn('prkplstraat');
            $table->dropColumn('prkplstraatnummer');
            $table->dropColumn('prkplgemeente');
            $table->text('adres');
            $table->text('latitude');
            $table->text('longitude');
            $table->date('BeschikbaarStartdatum');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parkeerplaatsen', function (Blueprint $table) {
            $table->dropColumn(['adres', 'latitude', 'longitude',"BeschikbaarStartdatum"]);
        });
    }
}
