<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Admin::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin#321')
        ]);
        \App\Models\FrontUser::create([
            'name' => 'nitin',
            'email' => 'nitin@email.com',
            'password' => Hash::make('nitin#321')
        ]);
    }
}
