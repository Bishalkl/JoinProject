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
    }
}
