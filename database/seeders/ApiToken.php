<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ApiToken extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tokens = [
            [
                'workspace_id' => 1,
                'name' => 'production',
                'token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'revoked_at' => null
            ]
        ];

        DB::table('api_tokens')->insert($tokens);
    }
}
