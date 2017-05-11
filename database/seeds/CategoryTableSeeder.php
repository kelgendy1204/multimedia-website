<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('categories')->delete();
		DB::table('categories')->insert(array(
			 array('name'=>'أغانى عربية','name_en'=>'songs-ara', 'id' => 1,
			 	'photo_url'=>'/dist/images/icons/aghani.svg'),
			 array('name'=>'أغانى اجنبية','name_en'=>'songs-eng', 'id' => 2,
			 	'photo_url'=>'/dist/images/icons/aghani.svg'),
			 array('name'=>'أفلام عربية','name_en'=>'movies-ara', 'id' => 3,
			 	'photo_url'=>'/dist/images/icons/aflam.svg'),
			 array('name'=>'أفلام اجنبية','name_en'=>'movies-eng', 'id' => 4,
			 	'photo_url'=>'/dist/images/icons/aflam.svg'),
			 array('name'=>'مسلسلات عربية','name_en'=>'series-ara', 'id' => 5,
			 	'photo_url'=>'/dist/images/icons/cinema.svg'),
			 array('name'=>'مسلسلات اجنبية','name_en'=>'series-eng', 'id' => 6,
			 	'photo_url'=>'/dist/images/icons/cinema.svg'),
			 array('name'=>'العاب','name_en'=>'games', 'id' => 7,
			 	'photo_url'=>'/dist/images/icons/al3ab.svg'),
			 array('name'=>'برامج','name_en'=>'app', 'id' => 8,
			 	'photo_url'=>'/dist/images/icons/brameg.svg'),
			 array('name'=>'Tv','name_en'=>'tv', 'id' => 9,
			 	'photo_url'=>'/dist/images/icons/tv.svg'),
			 array('name'=>'مصارعة','name_en'=>'wwe', 'id' => 10,
			 	'photo_url'=>'/dist/images/icons/wwe.png'),
			 array('name'=>'منوعات','name_en'=>'other', 'id' => 11,
			 	'photo_url'=>'/dist/images/icons/okhra.svg')
		));
	}
}
