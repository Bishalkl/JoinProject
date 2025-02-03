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
                        'cities.cid');

        $students = DB::table('students')
                        ->union($lectures)
                        ->select('id', 'name', 'age', 'cityName')
                        ->join('cities', 'students.city', '=',
                        'cities.cid')
                        ->get();

        return $students;
    }
}
