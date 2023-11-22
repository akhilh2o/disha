<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('payment', [AuthController::class, 'payment'])->name('payment');
Route::post('payment', [AuthController::class, 'doPayment'])->name('payment.store');

Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    Route::get('certificates', [HomeController::class, 'certificates'])->name('certificates');
    Route::get('exams', [HomeController::class, 'exams'])->name('exams');
    Route::get('exam/{exam}/start', [HomeController::class, 'exam'])->name('exam');

    Route::get('exam/{exam}/questions/{question}', [HomeController::class, 'showQuestion'])->name('exam.question.show');
    Route::get('exam/{exam}/question/{question}', [HomeController::class, 'previousQuestion'])->name('exam.question.previous');
    Route::post('exam/{exam}/questions/{question}/submit', [HomeController::class, 'submitAnswer'])->name('exam.question.submit');

    Route::get('exam/{exam}/finish', [HomeController::class, 'finishExam'])->name('exam.finish');
    Route::get('exam/{exam}/result/{user}', [HomeController::class, 'examResult'])->name('exam.result');

    Route::get('exam/{exam}/result/{user}/download', [HomeController::class, 'resultDownload'])->name('exam.result.download');


    Route::get('profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('profile', [HomeController::class, 'update'])->name('profile.update');
});

Route::get('/', function () {
    return redirect()->to(config('app.main_url'));
});

Route::get('exam', function () {
    return view('exam.start');
});

Route::get('running', function () {
    $questions =  Question::with('answers')->get();
    return view('exam.running')->with('questions', $questions);
});
