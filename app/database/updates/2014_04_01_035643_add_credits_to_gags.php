<?php

use Illuminate\Database\Migrations\Migration;

class AddCreditsToGags extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gags', function ($t) {

            $t->string('credits', 500)->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gags', function ($t) {

            $t->dropColumn('credits');

        });
    }

}