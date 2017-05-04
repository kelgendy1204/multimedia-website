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
			 array('name'=>'اغاني','name_en'=>'songs', 'id' => 1,
			 	'photo_url'=>'/categoryimages/2590a3c8cdde360.47040068.svg'),
			 array('name'=>'افلام','name_en'=>'movies', 'id' => 2,
			 	'photo_url'=>'/categoryimages/3590a3ca61cbcc3.56497053.svg'),
			 array('name'=>'العاب','name_en'=>'games', 'id' => 3,
			 	'photo_url'=>'/categoryimages/4590a3cb0731544.29308852.svg'),
			 array('name'=>'برامج','name_en'=>'app', 'id' => 4,
			 	'photo_url'=>'/categoryimages/5590a3ccb418111.26014301.svg'),
			 array('name'=>'Tv','name_en'=>'tv', 'id' => 5,
			 	'photo_url'=>'/categoryimages/6590a3cd8b13918.00891012.svg'),
			 array('name'=>'مصارعة','name_en'=>'wwe', 'id' => 6,
			 	'photo_url'=>'/categoryimages/7590a3cf05b3fc3.33233619.png'),
			 array('name'=>'منوعات','name_en'=>'other', 'id' => 7,
			 	'photo_url'=>'/categoryimages/8590a3d063e86f5.50333917.svg')
		));
	}
}
