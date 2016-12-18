<?php

use Illuminate\Database\Migrations\Migration;

class AddRememberTokenToUserdata extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('userdata', function($t) {

			$t->string('remember_token', 100)->nullable();

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

			$t->dropColumn('remember_token');

		});
	}

}