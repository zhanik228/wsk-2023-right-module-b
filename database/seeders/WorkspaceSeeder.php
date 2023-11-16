<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workspaces = [
            [
                'author_id' => 1,
                'title' => 'My App',
                'description' => 'This is my app',
                'updated_at' => now(),
                'created_at' => now(),
            ],
        ];

        DB::table('workspaces')->insert($workspaces);
    }
}
