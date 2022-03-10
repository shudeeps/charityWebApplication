<?php

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
        $product = new \App\Product([
            'imagePath' =>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
             'title'=>'harry poter 11',
             'description'=>'super cool ',
             'price'=>10 
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' =>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
             'title'=>'harry poter 22',
             'description'=>'super cool ',
             'price'=>10 
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' =>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
             'title'=>'harry poter 33',
             'description'=>'super cool ',
             'price'=>10 
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' =>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
             'title'=>'harry poter 44',
             'description'=>'super cool ',
             'price'=>10 
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' =>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
             'title'=>'harry poter 55',
             'description'=>'super cool ',
             'price'=>10 
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' =>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
             'title'=>'harry poter 66',
             'description'=>'super cool ',
             'price'=>10 
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' =>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
             'title'=>'harry poter 77',
             'description'=>'super cool ',
             'price'=>10 
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' =>'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
             'title'=>'harry poter 88',
             'description'=>'super cool ',
             'price'=>10 
        ]);
        $product->save();


    }
}
