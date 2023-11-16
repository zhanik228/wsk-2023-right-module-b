<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceUsages = [
            [
                'username' => 'demo1',
                'workspace_title' => 'My App',
                'api_token_name' => 'production',
                'usage_duration_in_ms' => 38,
                'usage_started_at' => '2023-07-01 12:31:48',
                'service_name' => 'Service #1',
                'service_cost_per_ms' => 0.001500
            ],
            [
                'username' => 'demo1',
                'workspace_title' => 'My App',
                'api_token_name' => 'development',
                'usage_duration_in_ms' => 38,
                'usage_started_at' => '2023-08-02 01:14:43',
                'service_name' => 'Service #1',
                'service_cost_per_ms' => 0.001500
            ]
        ];

        DB::table('service_usages')->insert($serviceUsages);
    }
}
