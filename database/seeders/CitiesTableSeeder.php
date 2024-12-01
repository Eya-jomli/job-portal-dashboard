<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            ['city_name' => 'Berlin', 'postal_code' => '10115'],
            ['city_name' => 'Munich', 'postal_code' => '80331'],
            ['city_name' => 'Hamburg', 'postal_code' => '20095'],
            ['city_name' => 'Frankfurt', 'postal_code' => '60311'],
            ['city_name' => 'Stuttgart', 'postal_code' => '70173'],
            ['city_name' => 'Düsseldorf', 'postal_code' => '40210'],
            ['city_name' => 'Cologne', 'postal_code' => '50667'],
            ['city_name' => 'Dortmund', 'postal_code' => '44135'],
            ['city_name' => 'Essen', 'postal_code' => '45326'],
            ['city_name' => 'Leipzig', 'postal_code' => '04103'],
            ['city_name' => 'Bremen', 'postal_code' => '28195'],
            ['city_name' => 'Dresden', 'postal_code' => '01067'],
            ['city_name' => 'Hannover', 'postal_code' => '30159'],
            ['city_name' => 'Nuremberg', 'postal_code' => '90402'],
            ['city_name' => 'Mannheim', 'postal_code' => '68159'],
            ['city_name' => 'Bonn', 'postal_code' => '53111'],
            ['city_name' => 'Karlsruhe', 'postal_code' => '76133'],
            ['city_name' => 'Aachen', 'postal_code' => '52062'],
            ['city_name' => 'Wiesbaden', 'postal_code' => '65183'],
            ['city_name' => 'Münster', 'postal_code' => '48143'],
            // Add more cities as needed
        ]);
    }
}
