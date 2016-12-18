<?php

class GagTableSeeder extends Seeder {

	public function run()
	{

		DB::table('gags')->delete();

		//youtube
		Gag::create(
			array(
				'title'       => "Fail compilation!",
				'slug'        => Str::slug("Fail compilation!"),
				'belongs_to'  => 3,
				'gag_url'     => 'r2Hlaf6cEQU',
				'type'        => 'youtube',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 0
		));

		//vimeo
		Gag::create(
			array(
				'title'       => "How do they do this?",
				'slug'        => Str::slug("How do they do this?"),
				'belongs_to'  => 6,
				'gag_url'     => '48620688',
				'type'        => 'vimeo',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 0
		));

		// image 1
		Gag::create(
			array(
				'title'       => "Happened to me...",
				'slug'        => Str::slug("Happened to me..."),
				'belongs_to'  => 2,
				'gag_url'     => 1,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		// image 2
		Gag::create(
			array(
				'title'       => "Don't worry, I got this.",
				'slug'        => Str::slug("Don't worry, I got this."),
				'belongs_to'  => 3,
				'gag_url'     => 2,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		// image 3
		Gag::create(
			array(
				'title'       => "Is your cat about to leave you?",
				'slug'        => Str::slug("Is your cat about to leave you?"),
				'belongs_to'  => 3,
				'gag_url'     => 3,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		// youtube
		Gag::create(
			array(
				'title'       => "Car crash compilation!",
				'slug'        => Str::slug("Car crash compilation!"),
				'belongs_to'  => 7,
				'gag_url'     => 'FIx9Gw6Q7W8',
				'type'        => 'youtube',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 0
		));

		// image 4
		Gag::create(
			array(
				'title'       => "Funny shoes. :D",
				'slug'        => Str::slug("Funny shoes. :D"),
				'belongs_to'  => 3,
				'gag_url'     => 4,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		// image 5
		Gag::create(
			array(
				'title'       => "I did choose thug life.",
				'slug'        => Str::slug("I did choose thug life."),
				'belongs_to'  => 8,
				'gag_url'     => 5,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		// image 6
		Gag::create(
			array(
				'title'       => "Good guy gred is lucky again!",
				'slug'        => Str::slug("Good guy gred is lucky again!"),
				'belongs_to'  => 2,
				'gag_url'     => 6,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		// image 7
		Gag::create(
			array(
				'title'       => "They all succeeded...",
				'slug'        => Str::slug("They all succeeded..."),
				'belongs_to'  => 2,
				'gag_url'     => 7,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		// image 8
		Gag::create(
			array(
				'title'       => "A broken hand, yes!",
				'slug'        => Str::slug("A broken hand, yes!"),
				'belongs_to'  => 2,
				'gag_url'     => 8,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		// image 9
		Gag::create(
			array(
				'title'       => "When I was little and bored on road trips.",
				'slug'        => Str::slug("When I was little and bored on road trips."),
				'belongs_to'  => 2,
				'gag_url'     => 9,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		// image 10
		Gag::create(
			array(
				'title'       => "I would be shocked, too.",
				'slug'        => Str::slug("I would be shocked, too."),
				'belongs_to'  => 2,
				'gag_url'     => 10,
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 1
		));

		//vine
		Gag::create(
			array(
				'title'       => "That is my dog. <3",
				'slug'        => Str::slug("That is my dog. <3"),
				'belongs_to'  => 3,
				'gag_url'     => '{"id":"hWvK0WqFWKp","image":"https:\/\/v.cdn.vine.co\/r\/thumbs\/0981E4D7FE964724399712481280_1203cbc6046.3.mp4_GEkFFfO55Qja8A2qsndX6X9jR.M6CjvNoHU6f5tAzBRBKz3elhvgNIWxWHAgujkp.jpg?versionId=7.0YA96Jji9u6gOeBePMFg2NEiHrGfFc"}',
				'type'        => 'vine',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 0
		));

		//Add cosplay
		Gag::create(
			array(
				'title'       => "So cute. :3",
				'slug'        => Str::slug("So cute. :3"),
				'belongs_to'  => 1,
				'gag_url'     => 'cosplay1',
				'type'        => 'image',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 0
		));

		//Add gif
		Gag::create(
			array(
				'title'       => "He thinks he can eat them.",
				'slug'        => Str::slug("He thinks he can eat them."),
				'belongs_to'  => 3,
				'gag_url'     => 'gif2',
				'type'        => 'gif',
				'user_id'     => 4,
				'read_count'  => 0,
				'is_approved' => 1,
				'is_featured' => 0
		));
	}

}