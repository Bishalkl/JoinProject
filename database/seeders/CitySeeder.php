<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/cities.json');
        $cities = collect(json_decode($json));

        // using collection feature
        $cities->each(function ($city) {
            City::create([
                'cityName' => $city->cityName
            ]);
        });
    }
}
