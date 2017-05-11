<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(
        	 array('id' => 1 ,'name' => 'khaled', 'email' => 'user@domain.com',
                'password' => bcrypt('11111111'))
        );
    }
}
