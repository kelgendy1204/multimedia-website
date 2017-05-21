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
        	 array('id' => 1 ,'name' => 'admin', 'email' => 'mazika2day@gmail.com',
                'password' => bcrypt('gd9CHYrvP2TXQv'))
        );

        DB::table('users')->insert(
        	 array('id' => 2 ,'name' => 'developer', 'email' => 'elgendy1204@gmail.com',
                'password' => bcrypt('khaledfares@21'))
        );

    }
}
