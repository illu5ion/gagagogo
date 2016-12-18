<?php

use Illuminate\Database\Migrations\Migration;

class CreateGagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gags', function($t)
		{

			$t->increments('id');
			$t->string('title', 75);
			$t->string('slug', 75);
			$t->integer('belongs_to')->default(0);
			$t->string('gag_url', 255);
			$t->string('type', 15); //youtube, vimeo, vine, dailymotion, image
			$t->integer('user_id')->unsigned();
			$t->integer('read_count');
			$t->integer('is_approved')->default(0);
			$t->integer('is_featured')->default(0);
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
		Schema::drop('gags');
	}

}