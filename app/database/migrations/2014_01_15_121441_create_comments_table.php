<?php

use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function($t)
		{

			$t->increments('id');
			$t->integer('user_id')->unsigned();
			$t->string('message', 500);
			$t->smallInteger('is_approved')->unsigned()->default(0);
			$t->integer('on');
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
		Schema::drop('comments');
	}

}