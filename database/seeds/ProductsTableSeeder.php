<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
          'name'  => 'HP laserjet Printer',
          'price' =>  15000,
          'description' => 'Full new printer with high performance',
          'image' =>  'uploads/post_img.png'
        ]);
    }
}
