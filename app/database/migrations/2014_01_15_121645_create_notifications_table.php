<?php

use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function($t)
		{

			$t->increments('id');
			$t->integer('user_id')->unsigned();
			$t->integer('target_user')->unsigned();
			$t->string('message', 500);
			$t->string('type', 25);
			$t->integer('url')->unsigned();
			$t->integer('seen')->unsigned();
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
		Schema::drop('notifications');
	}

}