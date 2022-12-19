<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
          ProductsSeeder::class,
          ProductImagesSeeder::class,
          CategoriesSeeder::class,
          BannersSeeder::class,
          SlidersSeeder::class
      ]);
    }
}
