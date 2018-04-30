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
            [
                'title'       => 'ReactJS Shirt',
                'slug'        => str_slug('ReactJS Shirt'),
                'description' => 'Shirt React Logo with color variants',
                'sale'        => false,
                'gender'      => 'man',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'JQuery Shirt',
                'slug'        => str_slug('JQuery Shirt'),
                'description' => 'Shirt JQuery Logo with color variants',
                'sale'        => false,
                'gender'      => 'man',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Laravel Shirt',
                'slug'        => str_slug('Laravel Shirt'),
                'description' => 'Shirt Laravel Logo with color variants',
                'sale'        => true,
                'gender'      => 'man',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Casual Shoes',
                'slug'        => str_slug('Casual Shoes'),
                'description' => 'Casual Shoes with leather finish',
                'sale'        => true,
                'gender'      => 'man',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Fang Backpack',
                'slug'        => str_slug('Fang Backpack'),
                'description' => 'Camo Fang Backpack Jungle',
                'sale'        => true,
                'gender'      => 'woman',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Vue Shirt',
                'slug'        => str_slug('Vue Shirt'),
                'description' => 'Awesome Vue shirt',
                'sale'        => true,
                'gender'      => 'man',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Hat',
                'slug'        => str_slug('Hat'),
                'description' => 'Black militar Hat',
                'sale'        => false,
                'gender'      => 'man',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
