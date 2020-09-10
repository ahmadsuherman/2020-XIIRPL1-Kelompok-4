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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123123')
            ]);
    
        DB::table('users')->insert([
            'role'  => 'siswa',
            'name' => 'Santi',
            'email' => 'santi@gmail.com',
            'password' => Hash::make('12341234')
            ]);

    }

}

