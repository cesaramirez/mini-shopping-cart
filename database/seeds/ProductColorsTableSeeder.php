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
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525025505/angular-black.jpg',
                'hexa_code'   => '#000',
                'price'       => '11.00',
                'stock'       => 20,
                'product_id'  => Product::where('slug', str_slug('Angular 7 Shirt'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525036361/react-bw.jpg',
                'hexa_code'   => '#FFF',
                'price'       => '13.00',
                'stock'       => 25,
                'product_id'  => Product::where('slug', str_slug('ReactJS Shirt'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525036361/react-black.jpg',
                'hexa_code'   => '#000',
                'price'       => '11.00',
                'stock'       => 10,
                'product_id'  => Product::where('slug', str_slug('ReactJS Shirt'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525036736/jquery-bw.jpg',
                'hexa_code'   => '#FFF',
                'price'       => '13.00',
                'stock'       => 25,
                'product_id'  => Product::where('slug', str_slug('JQuery Shirt'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525036736/jquery-black.jpg',
                'hexa_code'   => '#000',
                'price'       => '11.00',
                'stock'       => 10,
                'product_id'  => Product::where('slug', str_slug('JQuery Shirt'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525036913/laravel-bw.jpg',
                'hexa_code'   => '#FFF',
                'price'       => '13.00',
                'stock'       => 25,
                'product_id'  => Product::where('slug', str_slug('Laravel Shirt'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525036913/laravel-black.jpg',
                'hexa_code'   => '#000',
                'price'       => '11.00',
                'stock'       => 10,
                'product_id'  => Product::where('slug', str_slug('Laravel Shirt'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525111677/vue-white.jpg',
                'hexa_code'   => '#FFF',
                'price'       => '17.00',
                'stock'       => 25,
                'product_id'  => Product::where('slug', str_slug('Vue Shirt'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525111616/vue-bw.jpg',
                'hexa_code'   => '#000',
                'price'       => '15.00',
                'stock'       => 10,
                'product_id'  => Product::where('slug', str_slug('Vue Shirt'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525023909/shoe1.png',
                'hexa_code'   => '#000',
                'price'       => '21.00',
                'stock'       => 10,
                'product_id'  => Product::where('slug', str_slug('Casual Shoes'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525071375/jacket.png',
                'hexa_code'   => '#000',
                'price'       => '25.00',
                'stock'       => 15,
                'product_id'  => Product::where('slug', str_slug('Fang Backpack'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'image'       => 'https://res.cloudinary.com/dirygrccg/image/upload/v1525108154/hat.png',
                'hexa_code'   => '#000',
                'price'       => '25.00',
                'stock'       => 15,
                'product_id'  => Product::where('slug', str_slug('Hat'))->first()->id,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ];

        DB::table('product_colors')->insert($colors);
    }
}
