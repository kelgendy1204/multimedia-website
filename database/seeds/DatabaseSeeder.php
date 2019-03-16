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
        // $this->call(CategoryTableSeeder::class);
        // $this->call(PostTableSeeder::class);
        // $this->call(AdvertisementTableSeeder::class);
        // $this->call(RoleTableSeeder::class);
        // $this->call(MetadataSeeder::class);
        // $this->call(UserTableSeeder::class);
        // $this->call(RoleUserTableSeeder::class);
        // $this->call(SubpostTableSeeder::class);
        // $this->call(ServerTableSeeder::class);
        $this->command->info("No tables to be seeded...");
    }
}
