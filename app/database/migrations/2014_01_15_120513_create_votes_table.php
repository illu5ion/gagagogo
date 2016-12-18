<?php

use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votes', function($t)
		{

			$t->increments('id');
			$t->integer('user_id')->unsigned();
			$t->integer('gag_id')->unsigned();
			$t->integer('vote');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votes');
	}
}