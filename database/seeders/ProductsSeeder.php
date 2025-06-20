<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();

        Product::create([
            'name'=>'Samsung S25 5G',
            'slug'=>'samsung-s25-5g',
            'category_id'=>1,
            'description'=>'Lorem Ipsum',
            'image'=>'image.png',
            'price'=>24000000,
            'stock'=>100,
        ]);
        
        Product::create([
            'name'=>'Sapu Lidi',
            'slug'=>'sapu-lidi',
            'category_id'=>1,
            'description'=>'Lorem Ipsum',
            'image'=>'image.png',
            'price'=>5000,
            'stock'=>1000,
        ]);
    }
}
