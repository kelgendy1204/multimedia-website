<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubpostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subposts')->delete();
        DB::table('subposts')->insert(array(
        	 array('id' => 1 ,'title'=>'الحلقة رقم 1', 'post_id' => 1, 'visible' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        	 array('id' => 2 ,'title'=>'الحلقة رقم 2', 'post_id' => 1, 'visible' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        	 array('id' => 3 ,'title'=>'الحلقة رقم 3', 'post_id' => 1, 'visible' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ));
    }
}
