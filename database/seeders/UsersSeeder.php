<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        User::create([
            'name'=>'Admin',
            'email'=>'admin@example.com',
            'password'=>bcrypt('admin123'),
            'isAdmin'=>1,
        ]);

        User::create([
            'name'=>'Member',
            'email'=>'member@example.com',
            'password'=>bcrypt('member123'),
            'isAdmin'=>0,
        ]);
    }
}
