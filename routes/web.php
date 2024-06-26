<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\HomeController;
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

Route::get('certificate-view', [CertificateController::class, 'certificate'])->name('certificate-view');
Route::post('certificate-view', [CertificateController::class, 'certificateSearch'])->name('certificate-view.search');

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
    // return redirect()->to(config('app.main_url'));
    return to_route('register');
});
// test url for the qr code certificate 
Route::get('/certificate-with-qr-code', [HomeController::class, 'certificateWithQrCode']);

//quiz route for student 
require __DIR__.'/quiz.php';


// Route::get('exam', function () {
//     return view('exam.start');
// });

// Route::get('running', function () {
//     $questions =  Question::with('answers')->get();
//     return view('exam.running')->with('questions', $questions);
// });
