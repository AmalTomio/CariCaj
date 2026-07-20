<?php

namespace Database\Seeders;

use App\Models\Operator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OperatorSeeder extends Seeder
{
    public function run(): void
    {
        $operators = [
            "Gentari",
            "ChargEV",
            "JomCharge",
            "DC Handal",
            "Tesla",
        ];

        foreach ($operators as $name) {
            Operator::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'is_active' => true,
                ]
            );
        }
    }
}