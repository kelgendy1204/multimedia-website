<?php

use Illuminate\Database\Seeder;

class ServerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('servers')->delete();
        DB::table('servers')->insert(array(
        	array('id' => 1, 'subpost_id'=> 1, 'name' => 'youtube', 'link' => 'https://www.youtube.com/embed/10r9ozshGVE?ecver=1'),
        	array('id' => 2, 'subpost_id'=> 1, 'name' => 'dailymotion', 'link' => '//www.dailymotion.com/embed/video/x44q47s'),
        	array('id' => 3, 'subpost_id'=> 1, 'name' => 'vodlocker', 'link' => 'https://vodlocker.co/embed-o8ns0vsys6cy.html'),
        	array('id' => 4, 'subpost_id'=> 1, 'name' => 'teachertube', 'link' => '//www.teachertube.com/embed/video/455221')
        ));
    }
}
