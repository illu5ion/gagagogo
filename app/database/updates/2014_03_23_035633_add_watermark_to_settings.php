<?php

use Illuminate\Database\Migrations\Migration;

class AddWatermarkToSettings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settings', function($t) {

			$t->string('watermark', 500)->default('__watermark.png');
			$t->smallInteger('auto_add_watermark')->default(0)->unsigned();

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

			$t->dropColumn('watermark');
			$t->dropColumn('auto_add_watermark');

		});
	}

}