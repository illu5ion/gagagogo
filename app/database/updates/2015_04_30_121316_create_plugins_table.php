<?php

use Illuminate\Database\Migrations\Migration;

class CreatePluginsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plugins', function ($t) {

			$t->increments('id');
			$t->string('name', 50);
			$t->string('folder_name', 50);
			$t->tinyInteger('active');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plugins');
	}
}
