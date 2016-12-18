<?php

class CategoryTableSeeder extends Seeder {

	public function run()
	{

		DB::table('categories')->delete();

		Category::create(
			array(
				'category_name' => 'Cosplay',
				'slug'          => Str::slug('Cosplay'),
				'featured_text' => 0
		));

		Category::create(
			array(
				'category_name' => 'Memes',
				'slug'          => Str::slug('Memes'),
				'featured_text' => 0
		));

		Category::create(
			array(
				'category_name' => 'Funny',
				'slug'          => Str::slug('Funny'),
				'featured_text' => 'New'
		));

		Category::create(
			array(
				'category_name' => 'Girls',
				'slug'          => Str::slug('Girls'),
				'featured_text' => 0
		));

		Category::create(
			array(
				'category_name' => 'Games',
				'slug'          => Str::slug('Games'),
				'featured_text' => 0
		));

		Category::create(
			array(
				'category_name' => 'Epic',
				'slug'          => Str::slug('Epic'),
				'featured_text' => 0
		));

		Category::create(
			array(
				'category_name' => 'World',
				'slug'          => Str::slug('World'),
				'featured_text' => 0
		));

		Category::create(
			array(
				'category_name' => 'Other',
				'slug'          => Str::slug('Other'),
				'featured_text' => 0
		));
	}

}