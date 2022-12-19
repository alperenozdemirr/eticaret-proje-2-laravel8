<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert(
            [
                [
                    'title'=>'SEASONAL PICKS',
                    'name'=>'Get All The Good Stuff',
                    'url'=>'#slider1',
                    'image'=>'slide-1.jpg'
                ],
                [
                    'title'=>'all at 50% off',
                    'name'=>'The Most Beautiful Novelties In Our Shop',
                    'url'=>'#slider2',
                    'image'=>'slide-2.jpg'
                ]
            ]
        );
    }
}
