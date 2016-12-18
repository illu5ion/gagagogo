<?php

use Illuminate\Database\Migrations\Migration;

class AddFacebookIdToUserdata extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('userdata', function($t) {

			$t->string('facebook_id')->nullable()->default(null);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('userdata', function($t) {

			$t->dropColumn('facebook_id');

		});
	}

}