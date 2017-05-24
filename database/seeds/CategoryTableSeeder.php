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
			 array('name'=>'أغانى عربية','name_en'=>'arabic songs', 'id' => 1, 'color' => 'blue', 'photo_url'=>'/dist/images/icons/aghani.svg'),
			 array('name'=>'أفلام عربية','name_en'=>'arabic movies', 'id' => 2, 'color' => 'red', 'photo_url'=>'/dist/images/icons/aflam.svg'),
			 array('name'=>'أفلام اجنبية','name_en'=>'english movies', 'id' => 3, 'color' => 'grey1', 'photo_url'=>'/dist/images/icons/aflam.svg'),
			 array('name'=>'مسلسلات عربية','name_en'=>'arabic series', 'id' => 4, 'color' => 'green1', 'photo_url'=>'/dist/images/icons/cinema.svg'),
			 array('name'=>'مسلسلات اجنبية','name_en'=>'english series', 'id' => 5, 'color' => 'blue', 'photo_url'=>'/dist/images/icons/cinema.svg'),
			 array('name'=>'رياضة','name_en'=>'sports', 'id' => 6, 'color' => 'orange', 'photo_url'=>'/dist/images/icons/aghani.svg'),
			 array('name'=>'العاب','name_en'=>'games', 'id' => 7, 'color' => 'green2', 'photo_url'=>'/dist/images/icons/al3ab.svg'),
			 array('name'=>'برامج','name_en'=>'apps', 'id' => 8, 'color' => 'green3', 'photo_url'=>'/dist/images/icons/brameg.svg'),
			 array('name'=>'Tv','name_en'=>'tv', 'id' => 9, 'color' => 'yellow', 'photo_url'=>'/dist/images/icons/tv.svg'),
			 array('name'=>'مصارعة','name_en'=>'wwe', 'id' => 10, 'color' => 'grey2', 'photo_url'=>'/dist/images/icons/wwe.png'),
			 array('name'=>'منوعات','name_en'=>'other', 'id' => 11, 'color' => 'pink', 'photo_url'=>'/dist/images/icons/okhra.svg')
		));
	}
}
