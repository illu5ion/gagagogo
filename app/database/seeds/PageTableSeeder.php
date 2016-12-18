<?php

class PageTableSeeder extends Seeder {

	public function run()
	{

		DB::table('pages')->delete();

		Page::create(
			array(
				'title'   => 'About Us',
				'slug'    => Str::slug('About Us'),
				'content' => 'Your about us page...'
		));

		Page::create(
			array(
				'title'   => 'Privacy Policy',
				'slug'    => Str::slug('Privacy Policy'),
				'content' => 'Your privacy policy page...'
		));

		Page::create(
			array(
				'title'   => 'Custom Page',
				'slug'    => Str::slug('Custom Page'),
				'content' => 'This is a custom page added by the admin...'
		));
	}

}