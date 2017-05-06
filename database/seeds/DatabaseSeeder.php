<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(AdvertisementTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->command->info("Category and Post tables seeded...");
    }
}
