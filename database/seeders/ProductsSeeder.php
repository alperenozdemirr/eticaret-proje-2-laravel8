<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                [
                    'name'=>'switshirt siyah şapkalı 1',
                    'category'=>1,
                    'info'=>'switshirt siyah şapkalı detay bilgi alanıdır stok ürünü 99',
                    'price'=>149,
                    'stock'=>100
                ],
                [
                    'name'=>'switshirt siyah şapkalı 2',
                    'category'=>2,
                    'info'=>'switshirt siyah şapkalı detay bilgi alanıdır stok ürünü 99',
                    'price'=>249,
                    'stock'=>100
                ],
                [
                    'name'=>'switshirt siyah şapkalı 6',
                    'category'=>1,
                    'info'=>'switshirt siyah şapkalı detay bilgi alanıdır stok ürünü 99',
                    'price'=>649,
                    'stock'=>100
                ],
                [
                    'name'=>'switshirt siyah şapkalı 3',
                    'category'=>1,
                    'info'=>'switshirt siyah şapkalı detay bilgi alanıdır stok ürünü 99',
                    'price'=>349,
                    'stock'=>100
                ],
                [
                    'name'=>'switshirt siyah şapkalı 4',
                    'category'=>1,
                    'info'=>'switshirt siyah şapkalı detay bilgi alanıdır stok ürünü 99',
                    'price'=>449,
                    'stock'=>100
                ],
                [
                    'name'=>'switshirt siyah şapkalı 5',
                    'category'=>1,
                    'info'=>'switshirt siyah şapkalı detay bilgi alanıdır stok ürünü 99',
                    'price'=>549,
                    'stock'=>100
                ]
            ]
        );
    }
}
