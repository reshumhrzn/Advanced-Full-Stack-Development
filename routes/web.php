<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
return view('welcome');
});

Route::resource('courses', CourseController::class);

Route::resource('students', StudentController::class);

