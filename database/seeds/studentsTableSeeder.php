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
            'user_id' => '2',
            'nis'  => '181910001',
            'class' => 'XII RPL 1',
            'gender' => 'perempuan',
        ]);
    }
}
