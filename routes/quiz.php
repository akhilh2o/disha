<?php

use App\Http\Controllers\QuizAuthController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('quiz/register', [QuizAuthController::class, 'register'])->name('quiz.register');
Route::post('quiz/register', [QuizAuthController::class, 'registerStore'])->name('quiz.register.store');

Route::middleware(['auth'])->prefix('quiz')->name('quiz.')->group(function () {
    Route::get('certificates', [QuizController::class, 'certificates'])->name('certificates');
    Route::get('exams', [QuizController::class, 'exams'])->name('exams');
    Route::get('exam/{exam}/start', [QuizController::class, 'exam'])->name('exam');

    Route::get('exam/{exam}/questions/{question}', [QuizController::class, 'showQuestion'])->name('exam.question.show');
    Route::get('exam/{exam}/question/{question}', [QuizController::class, 'previousQuestion'])->name('exam.question.previous');
    Route::post('exam/{exam}/questions/{question}/submit', [QuizController::class, 'submitAnswer'])->name('exam.question.submit');

    Route::get('exam/{exam}/finish', [QuizController::class, 'finishExam'])->name('exam.finish');
    Route::get('exam/{exam}/result/{user}', [QuizController::class, 'examResult'])->name('exam.result');

    Route::get('exam/{exam}/result/{user}/download', [QuizController::class, 'resultDownload'])->name('exam.result.download');

    Route::get('profile', [QuizController::class, 'profile'])->name('profile');
    Route::post('profile', [QuizController::class, 'update'])->name('profile.update');
});