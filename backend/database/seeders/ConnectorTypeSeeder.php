<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConnectorType;

class ConnectorTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'CCS2',
            'Type 2',
            'CHAdeMO',
        ];

        foreach ($types as $type) {
            ConnectorType::updateOrCreate(
                ['name' => $type],
                ['icon' => null]
            );
        }
    }
}