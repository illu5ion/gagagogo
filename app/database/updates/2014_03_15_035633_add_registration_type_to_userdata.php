<?php

use Illuminate\Database\Migrations\Migration;

class AddRegistrationTypeToUserdata extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('userdata', function($t) {

			$t->string('registration_type', 25)->default('standard');

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

			$t->dropColumn('registration_type');

		});
	}

}