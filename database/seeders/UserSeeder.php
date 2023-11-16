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
        $users = [
            [
                'username' => 'demo1',
                'password' => Hash::make('skills2023d1'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'username' => 'demo2',
                'password' => Hash::make('skills2023d2'),
                'updated_at' => now(),
                'created_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
