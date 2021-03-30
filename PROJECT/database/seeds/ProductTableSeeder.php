<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecord = [
            [
                'id' => 1, 'product_name' => 'karkas ukuran 0,5 - 0,6', 'category' => 1,  'type' => 'fresh', 'item' => 'pack', 'weight' => 0.5,
                'sku' => 'SKU000101010', 'price_sell' => 18000, 'price_promo' => 0, 'price_agent' => 17000, 'photo' => '', 'recmmendation' => '',
                'description' => '', 'status' => 0, 'ordering' => ''
            ],
            [
                'id' => 2, 'product_name' => 'Karkas 0,5-0,6 Pot 4', 'category' => 2,  'type' => 'fresh', 'item' => 'pack', 'weight' => 0.5,
                'sku' => 'SKU0000002', 'price_sell' => 18500, 'price_promo' => 0, 'price_agent' => 17500, 'photo' => '', 'recmmendation' => '',
                'description' => '', 'status' => 0, 'ordering' => '',
            ],


        ];

        Product::insert($productRecord);
    }
}