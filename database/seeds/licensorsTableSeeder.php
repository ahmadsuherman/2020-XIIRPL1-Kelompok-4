<?php

use Illuminate\Database\Seeder;

class licensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('licensors')->insert([
            'name' => 'Enjang Suryana',
            'phone_number'  => '0897654321',
            'address' => 'Kp. Pasantren'
        ]);
    }
}
