<?php

use Facades\App\Product;
use Illuminate\Database\Seeder;

class ProductColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $colors = [
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525025505/angular-bw.jpg',
                'hexa_code'   => '#FFF',
                'price'       => '13.00',
                'stock'       => 25,
                'product_id'  => Product::where('slug', str_slug('Angular 7 Shirt'))->first()->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525025505/angular-black.jpg',
                'hexa_code'   => '#000',
                'price'       => '11.00',
                'stock'       => 20,
                'product_id'  => Product::where('slug', str_slug('Angular 7 Shirt'))->first()->id,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('product_colors')->insert($colors);
    }
}
