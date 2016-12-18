<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserdataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userdata', function($t)
		{

			$t->increments('id');
			$t->string('username', 15);
			$t->string('password', 64);
			$t->string('usermail', 60);
			$t->smallInteger('authority')->default(1)->unsigned();
			$t->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userdata');
	}
}