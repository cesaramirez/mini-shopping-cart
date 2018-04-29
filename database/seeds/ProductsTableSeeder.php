<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = [
            [
                'title'       => 'Angular 7 Shirt',
                'slug'        => str_slug('Angular 7 Shirt'),
                'description' => 'Shirt Angular Logo with color variants',
                'sale'        => false,
                'gender'      => 'man',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
