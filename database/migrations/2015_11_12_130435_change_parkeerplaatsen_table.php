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
            $table->renameColumn('prkplstraat', 'adres');
            $table->dropColumn('prkplstraatnummer');
            $table->dropColumn('prkplgemeente');

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
            //
        });
    }
}
