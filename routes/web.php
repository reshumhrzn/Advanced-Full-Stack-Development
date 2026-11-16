<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Student;
use App\Models\Course;


// Home Route

Route::get('/', function () {
    return redirect()->route('students.index');
});


// ========================================
// STUDENT CRUD
// ========================================


// Display Student List

Route::get('/students', function () {

    $students = Student::all();

    return view('student.list', [
        'students' => $students
    ]);

})->name('students.index');


// Display Create Student Form

Route::get('/students/create', function () {

    return view('student.create');

})->name('students.create');


// Store Student

Route::post('/students', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);

    return redirect()->route('students.index')
        ->with('success', "Student {$student->name} created successfully!");

})->name('students.store');


// Display Student Details

Route::get('/students/{id}', function ($id) {

    $student = Student::findOrFail($id);

    return view('student.detail', [
        'student' => $student
    ]);

})->name('students.show');


// Display Edit Student Form

Route::get('/students/{id}/edit', function ($id) {

    $student = Student::findOrFail($id);

    return view('student.edit', [
        'student' => $student
    ]);

})->name('students.edit');


// Update Student

Route::put('/students/{id}', function (Request $request, $id) {

    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',

        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('students', 'email')->ignore($student->id),
        ],

        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect()->route('students.show', $student->id)
        ->with('success', 'Student updated successfully!');

})->name('students.update');


// Delete Student

Route::delete('/students/{id}', function ($id) {

    $student = Student::findOrFail($id);

    $student->delete();

    return redirect()->route('students.index')
        ->with('success', 'Student deleted successfully!');

})->name('students.destroy');



// ========================================
// COURSE CRUD
// ========================================


// Display Course List

Route::get('/courses', function () {

    $courses = Course::all();

    return view('course.list', [
        'courses' => $courses
    ]);

})->name('courses.index');


// Display Create Course Form

Route::get('/courses/create', function () {

    return view('course.create');

})->name('courses.create');


// Store Course

Route::post('/courses', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'required|boolean',
    ]);

    $course = Course::create($validated);

    return redirect()->route('courses.index')
        ->with('success', "Course {$course->name} created successfully!");

})->name('courses.store');


// Display Course Details

Route::get('/courses/{id}', function ($id) {

    $course = Course::findOrFail($id);

    return view('course.detail', [
        'course' => $course
    ]);

})->name('courses.show');


// Display Edit Course Form

Route::get('/courses/{id}/edit', function ($id) {

    $course = Course::findOrFail($id);

    return view('course.edit', [
        'course' => $course
    ]);

})->name('courses.edit');


// Update Course

Route::put('/courses/{id}', function (Request $request, $id) {

    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'required|boolean',
    ]);

    $course->update($validated);

    return redirect()->route('courses.show', $course->id)
        ->with('success', 'Course updated successfully!');

})->name('courses.update');


// Delete Course

Route::delete('/courses/{id}', function ($id) {

    $course = Course::findOrFail($id);

    $course->delete();

    return redirect()->route('courses.index')
        ->with('success', 'Course deleted successfully!');

})->name('courses.destroy');