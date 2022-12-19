<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert(
            [
                [
                    'product_id'=>1,
                    'image'=>'product1.jpg',
                    'image_order'=>1
                ],
                [
                    'product_id'=>1,
                    'image'=>'product2.jpg',
                    'image_order'=>2
                ],
                [
                    'product_id'=>1,
                    'image'=>'product3.jpg',
                    'image_order'=>3
                ],
                [
                    'product_id'=>1,
                    'image'=>'product4.jpg',
                    'image_order'=>4
                ],

                [
                    'product_id'=>2,
                    'image'=>'product1.jpg',
                    'image_order'=>1
                ],
                [
                    'product_id'=>2,
                    'image'=>'product2.jpg',
                    'image_order'=>2
                ],
                [
                    'product_id'=>2,
                    'image'=>'product3.jpg',
                    'image_order'=>3
                ],
                [
                    'product_id'=>2,
                    'image'=>'product4.jpg',
                    'image_order'=>4
                ],

                [
                    'product_id'=>3,
                    'image'=>'product1.jpg',
                    'image_order'=>1
                ],
                [
                    'product_id'=>3,
                    'image'=>'product2.jpg',
                    'image_order'=>2
                ],
                [
                    'product_id'=>3,
                    'image'=>'product3.jpg',
                    'image_order'=>3
                ],
                [
                    'product_id'=>3,
                    'image'=>'product4.jpg',
                    'image_order'=>4
                ],

                [
                    'product_id'=>4,
                    'image'=>'product1.jpg',
                    'image_order'=>1
                ],
                [
                    'product_id'=>4,
                    'image'=>'product2.jpg',
                    'image_order'=>2
                ],
                [
                    'product_id'=>4,
                    'image'=>'product3.jpg',
                    'image_order'=>3
                ],
                [
                    'product_id'=>4,
                    'image'=>'product4.jpg',
                    'image_order'=>4
                ],

                [
                    'product_id'=>5,
                    'image'=>'product1.jpg',
                    'image_order'=>1
                ],
                [
                    'product_id'=>5,
                    'image'=>'product2.jpg',
                    'image_order'=>2
                ],
                [
                    'product_id'=>5,
                    'image'=>'product3.jpg',
                    'image_order'=>3
                ],
                [
                    'product_id'=>5,
                    'image'=>'product4.jpg',
                    'image_order'=>4
                ],

                [
                    'product_id'=>6,
                    'image'=>'product1.jpg',
                    'image_order'=>1
                ],
                [
                    'product_id'=>6,
                    'image'=>'product2.jpg',
                    'image_order'=>2
                ],
                [
                    'product_id'=>6,
                    'image'=>'product3.jpg',
                    'image_order'=>3
                ],
                [
                    'product_id'=>6,
                    'image'=>'product4.jpg',
                    'image_order'=>4
                ],
            ]
        );
    }
}
