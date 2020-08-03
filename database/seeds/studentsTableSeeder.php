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
            'full_name'  => 'MalayIngusan',
            'user_id' => '10',
            'class' => 'XII RPL1',
            'gender' => 'perempuan',
        ]);
    }
}
