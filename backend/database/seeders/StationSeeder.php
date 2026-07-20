<?php

namespace Database\Seeders;

use App\Models\Operator;
use App\Models\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    public function run(): void
    {
        $stations = [

            [
                'operator' => 'gentari',
                'name' => 'Gentari @ Suria KLCC',
                'address' => 'Suria KLCC, Jalan Ampang',
                'city' => 'Kuala Lumpur',
                'state' => 'Wilayah Persekutuan Kuala Lumpur',
                'postcode' => '50088',
                'latitude' => 3.1579,
                'longitude' => 101.7123,
            ],

            [
                'operator' => 'chargev',
                'name' => 'ChargEV @ Pavilion Kuala Lumpur',
                'address' => 'Pavilion Kuala Lumpur',
                'city' => 'Kuala Lumpur',
                'state' => 'Wilayah Persekutuan Kuala Lumpur',
                'postcode' => '55100',
                'latitude' => 3.1496,
                'longitude' => 101.7133,
            ],

            [
                'operator' => 'jomcharge',
                'name' => 'JomCharge @ Mid Valley',
                'address' => 'Mid Valley Megamall',
                'city' => 'Kuala Lumpur',
                'state' => 'Wilayah Persekutuan Kuala Lumpur',
                'postcode' => '58000',
                'latitude' => 3.1184,
                'longitude' => 101.6769,
            ],

            [
                'operator' => 'tesla',
                'name' => 'Tesla Supercharger Pavilion Damansara Heights',
                'address' => 'Pavilion Damansara Heights',
                'city' => 'Kuala Lumpur',
                'state' => 'Wilayah Persekutuan Kuala Lumpur',
                'postcode' => '50490',
                'latitude' => 3.1627,
                'longitude' => 101.6663,
            ],

            [
                'operator' => 'dc-handal',
                'name' => 'DC Handal Putrajaya',
                'address' => 'Putrajaya',
                'city' => 'Putrajaya',
                'state' => 'Putrajaya',
                'postcode' => '62000',
                'latitude' => 2.9264,
                'longitude' => 101.6964,
            ],

        ];

        foreach ($stations as $item) {

            $operator = Operator::where('slug', $item['operator'])->first();

            Station::updateOrCreate(
                ['name' => $item['name']],
                [
                    'operator_id' => $operator->id,
                    'name' => $item['name'],
                    'address' => $item['address'],
                    'city' => $item['city'],
                    'state' => $item['state'],
                    'postcode' => $item['postcode'],
                    'latitude' => $item['latitude'],
                    'longitude' => $item['longitude'],
                    'is_public' => true,
                    'status' => 'active',
                ]
            );
        }
    }
}