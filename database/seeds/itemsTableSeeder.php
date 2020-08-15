<?php

use Illuminate\Database\Seeder;


class itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'item_name'  => 'Kamera kecil',
            'total_item' => 4,
            'stock_item' => 4,
            'licensor' => 'SantiSintia'
        ]);
        DB::table('items')->insert([
            'item_name'  => 'Bola basket',
            'total_item' => 2,
            'stock_item' => 2,
            'licensor' => 'Malay'
        ]);
        DB::table('items')->insert([
            'item_name'  => 'lighting',
            'total_item' => 1,
            'stock_item' => 1,
            'licensor' => 'Ahmad'
        ]);
        DB::table('items')->insert([
            'item_name'  => 'HDMI',
            'total_item' => 2,
            'stock_item' => 2,
            'licensor' => 'Rudi'
        ]);
        DB::table('items')->insert([
            'item_name'  => 'Projector',
            'total_item' => 4,
            'stock_item' => 4,
            'licensor' => 'Evi'
        ]);
    }
}
