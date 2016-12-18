<?php

class UserdataTableSeeder extends Seeder {

	public function run()
	{

		DB::table('userdata')->delete();

		User::create(
			array(
				'username'  => 'testuser',
				'password'  => Hash::make('testuser'),
				'usermail'  => 'testuser@testuser.com',
				'authority' => 1
		));

		User::create(
			array(
				'username'  => 'banned',
				'password'  => Hash::make('banned'),
				'usermail'  => 'banned@banned.com',
				'authority' => 255
		));

		User::create(
			array(
				'username'  => 'another_user',
				'password'  => Hash::make('another_user'),
				'usermail'  => 'another_user@another_user.com',
				'authority' => 1
		));
	}

}