<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/students.json');
        $Students = collect(json_decode($json));

        // using collection feature
        $Students->each(function ($student) {
            Student::create([
                'name' => $student->name,
                'age' => $student->age,
                'city' => $student->city,
            ]);
        });
    }
}
