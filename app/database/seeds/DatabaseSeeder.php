<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserdataTableSeeder');
		$this->call('SettingsTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('PageTableSeeder');
		$this->call('GagTableSeeder');
	}

}