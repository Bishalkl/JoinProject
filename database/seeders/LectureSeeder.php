<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lecture;
use Illuminate\Support\Facades\File;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/lectures.json');
        $lectures = collect(json_decode($json));

        // using collection feature
        $lectures->each(function ($lecture) {
            Lecture::create([
                'name' => $lecture->name,
                'age' => $lecture->age,
                'city' => $lecture->city,
            ]);
        });
    }
}
