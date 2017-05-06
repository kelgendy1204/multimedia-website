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
        	 array('name'=>'super_admin'),
        	 array('name'=>'admin'),
        	 array('name'=>'normal')
        ));
    }
}
