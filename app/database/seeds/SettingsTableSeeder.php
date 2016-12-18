<?php

class SettingsTableSeeder extends Seeder {

	public function run()
	{

		DB::table('settings')->delete();

		Settings::create(
			array(
				'autoapprove_comments'  => 1,
				'copyright'             => "Copyright, 2014",
				'logo'                  => "__logo.png",
				'facebook_like_address' => "http://www.facebook.com/Envato",
				'google_maps_code'      => 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804',
				'autoapprove_gags'      => 1,
				'google_analytics_code' => "// your code here",
				'slogan'                => "This is the best source of fun.",
				'color_type'            => "default",
				'phone'                 => "123 45 67 99",
				'email'                 => "ouremail@ourwebsite.com",
				'address'               => "John Doe St. Stanford University 21:5"
		));
	}

}