<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        Category::create([
            'name'=>'Elektronik',
            'slug'=>'elektronik',
        ]);

        
        Category::create([
            'name'=>'Perabotan Rumah',
            'slug'=>'perabotan-rumah',
        ]);
    }
}
