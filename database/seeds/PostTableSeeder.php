<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('posts')->delete();
		DB::table('posts')->insert(array(
			 array('title'=>'اغنية اصالة نصري - لا تروح CD Q 320 Kbps',
			 	'photo_url'=>'/postimages/1590a3f06119a80.92638546.jpg',
			 	'description' => 'اغنية اصالة نصري - لا تروح',
			 	'visible' => '1',
			 	'pinned' => '0',
			 	'visits' => '0',
			 	// 'category_id' => 15),
			 	'category_id' => 1),
			 array('title'=>'البوم نانسي عجرم -حاسه بيك 2017 Cd Q 320Kpbs',
			 	'photo_url'=>'/postimages/4590a4587ab5c05.96845624.jpg',
			 	'description' => 'البوم نانسي عجرم -حاسه بيك 2017',
			 	'visible' => '1',
			 	'pinned' => '0',
			 	'visits' => '0',
			 	// 'category_id' => 15),
			 	'category_id' => 1),
			 array('title'=>'فيلم صابر جوجل بطولة محمد رجب و سارة سلامة نسخه HDRip',
			 	'photo_url'=>'/postimages/2590a4502b11815.21284786.jpg',
			 	'description' => 'فيلم صابر جوجل',
			 	'visible' => '1',
			 	'pinned' => '0',
			 	'visits' => '0',
			 	// 'category_id' => 15),
			 	'category_id' => 2),
			 array('title'=>'Split 2016 480p & 720p BluRay مترجم',
			 	'photo_url'=>'/postimages/3590a452b191c73.59817093.jpg',
			 	'description' => 'Split 2016',
			 	'visible' => '1',
			 	'pinned' => '0',
			 	'visits' => '0',
			 	// 'category_id' => 15)
			 	'category_id' => 2)
		));
	}
}
