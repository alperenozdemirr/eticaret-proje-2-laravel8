<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert(
            [
                [
                    'title'=>'Praesent',
                    'info'=>'Praesent elementum hendrerit tortor',
                    'image'=>'banners4.jpg',
                    'url'=>'#banners1'
                ],
                [
                    'title'=>'Donec',
                    'info'=>'Donec consectetuer ligula vulputate',
                    'image'=>'banners5.jpg',
                    'url'=>'#banners2'
                ],
                [
                    'title'=>'Phasellus',
                    'info'=>'Phasellus ultrises nulla quisnibh',
                    'image'=>'banners6.jpg',
                    'url'=>'#banners3'
                ]
            ]
        );
    }
}
