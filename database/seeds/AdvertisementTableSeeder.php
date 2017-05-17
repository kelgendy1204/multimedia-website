<?php

use Illuminate\Database\Seeder;

class AdvertisementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('advertisements')->delete();
		DB::table('advertisements')->insert(array(
			 array('name'=>'home_top',
			 	'photo_url'=>'/dist/images/bans/12.jpg'),
			 array('name'=>'home_bottom',
			 	'photo_url'=>'/dist/images/bans/12.jpg'),
			 array('name'=>'home_right',
			 	'photo_url'=>'/dist/images/bans/123.png'),
			 array('name'=>'home_left',
			 	'photo_url'=>'/dist/images/bans/123.png')
		));
	}
}
