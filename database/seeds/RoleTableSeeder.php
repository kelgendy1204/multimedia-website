<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert(array(
        	 array('id' => 1 ,'name'=>'super_admin'),
        	 array('id' => 2 ,'name'=>'admin'),
        	 array('id' => 3 ,'name'=>'normal')
        ));
    }
}
