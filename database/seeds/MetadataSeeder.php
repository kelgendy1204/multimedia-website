<?php

use Illuminate\Database\Seeder;

class MetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metadata')->delete();
        DB::table('metadata')->insert(array(
        	 array('name' => 'keywords'),
        	 array('name' => 'description'),
             array('name' => 'scripts'),
        	 array('name' => 'home_banner')
        ));
    }
}
