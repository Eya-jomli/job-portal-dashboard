<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('industries')->insert([
            ['industry_name' => 'Tech'],
            ['industry_name' => 'Healthcare'],
            ['industry_name' => 'Education'],
            ['industry_name' => 'Finance'],
            ['industry_name' => 'Real Estate'],
            ['industry_name' => 'Retail'],
            ['industry_name' => 'Manufacturing'],
            ['industry_name' => 'Hospitality'],
            ['industry_name' => 'Transportation'],
            ['industry_name' => 'Media'],
            ['industry_name' => 'Construction'],
            ['industry_name' => 'Energy'],
            ['industry_name' => 'Agriculture'],
            ['industry_name' => 'Government'],
            ['industry_name' => 'Nonprofit'],
            // Add more industries as needed
        ]);
    }
}

