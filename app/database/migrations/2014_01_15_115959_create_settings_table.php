<?php

use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function($t)
		{

			$t->increments('id');
			$t->smallInteger('autoapprove_comments')->default(0)->unsigned();
			$t->string('copyright', 500);
			$t->string('logo', 500);
			$t->string('facebook_like_address', 500);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}
}