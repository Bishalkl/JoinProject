<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{



    // method for showing the data students
    public function showStudents() {
        $students = DB::table('students')
                        ->join('cities', 'students.city', '=', 'cities.cid')
                        ->get();

        return $students;
        // return view('welcome', compact('students'));
    }

    //method for showing union data of students and lecutres
    public function showUnionData() {
        $lectures = DB::table('lectures')
                        ->select('id', 'name', 'age', 'cityName')
                        ->join('cities', 'lectures.city', '=',
                        'cities.cid')
                        ->where('cityName', '=', 'Houston');

        $students = DB::table('students')
                        ->union($lectures)
                        ->select('id', 'name', 'age', 'cityName')
                        ->join('cities', 'students.city', '=',
                        'cities.cid')
                        ->where('cityName', '=', 'san Antonio')
                        ->get();

        return $students;
    }

    // method for when condition
    public function whenData() {
        $test = true;
        $students = DB::table('students')
                        ->when($test, function($query) {
                            $query->where('age', '>', 20);
                        }, function($query) {
                            $query->where('age', '<', 20);
                        })
                        ->get();
        return $students;
    }

    // method for chunk
    public function chunkData() {
        $students = DB::table('students')
                        ->orderBy('id')
                        ->chunkById(3, function($students) {
                            echo "<br>";
                            foreach($students as $student) {
                                echo $student->name . "<br>";
                            };
                        });
    }
}
