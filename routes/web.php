<?php

use App\Models\Question;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('exam', function () {
    return view('exam.start');
});

Route::get('running', function () {
    $questions =  Question::with('answers')->get();
    return view('exam.running')->with('questions',$questions);
});
