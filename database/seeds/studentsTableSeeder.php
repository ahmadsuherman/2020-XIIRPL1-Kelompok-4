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
            'nis'  => '181910001',
            'user_id' => '1',
            'class' => 'XII RPL1',
            'gender' => 'perempuan',
        ]);
    }
}
