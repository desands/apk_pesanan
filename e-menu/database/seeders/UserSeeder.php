<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => Hash::make('password'), // pastikan untuk mengganti dengan password yang aman
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}