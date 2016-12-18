<?php

use Illuminate\Database\Migrations\Migration;

class AddNewColumnsToSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settings', function($t) {

			$t->string('google_maps_code', 500);
			$t->smallInteger('autoapprove_gags')->default(0)->unsigned();
			$t->string('google_analytics_code', 500);
			$t->string('slogan', 40);
			$t->string('color_type', 10);
			$t->string('phone', 40);
			$t->string('email', 70);
			$t->string('address', 255);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settings', function($t) {

			$t->dropColumn('google_maps_code');
			$t->dropColumn('autoapprove_gags');
			$t->dropColumn('google_analytics_code');
			$t->dropColumn('slogan');
			$t->dropColumn('color_type');
			$t->dropColumn('phone');
			$t->dropColumn('email');
			$t->dropColumn('address');

		});
	}

}