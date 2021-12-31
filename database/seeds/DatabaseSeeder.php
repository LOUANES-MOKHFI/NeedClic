<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(StateSeeder::class);
    	$this->call(CommuneSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
