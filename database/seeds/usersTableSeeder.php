<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role'  => 'admin',
            'name' => 'Ahmad',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123')
            ]);
    }
}
