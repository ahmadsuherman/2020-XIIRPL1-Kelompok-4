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
        $this->call(usersTableSeeder::class);
        $this->call(itemsTableSeeder::class);
        $this->call(studentsTableSeeder::class);
      
    }
}
