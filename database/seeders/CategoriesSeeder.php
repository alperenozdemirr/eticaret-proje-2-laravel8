<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'name'=>'Kadın Giyim'
                ],
                [
                    'name'=>'Erkek Giyim'
                ]
            ]
        );
    }
}
