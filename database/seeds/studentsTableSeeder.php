<?php

use Illuminate\Database\Seeder;

class studentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('students')->insert([
            'full_name'  => 'Malay Cahya',
            'user_id' => '1',
            'class' => 'XII RPL1',
            'gender' => 'perempuan',
        ]);
    }
}
