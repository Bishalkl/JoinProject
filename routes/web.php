<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::controller(StudentController::class)->group(function () {
    Route::get('/', 'showStudents');
    Route::get('/when', 'whenData');
    Route::get('/union', 'showUnionData');
    Route::get('/chunk', 'chunkData');
});

