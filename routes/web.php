<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\WasteController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizPlayController;
use App\Http\Controllers\QuizQuestionController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AIController as AdminAIController;
use App\Http\Controllers\Admin\WasteController as AdminWasteController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\QuizQuestionController as AdminQuizQuestionController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Quiz;

use Illuminate\Support\Facades\Http;


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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/proses-login', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('landing-page');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('waste', AdminWasteController::class);
    Route::resource('ai', AdminAIController::class);
    Route::resource('quiz', AdminQuizController::class);
    Route::resource('quiz-question', AdminQuizQuestionController::class);
});

// User
Route::middleware(['auth', 'verified'])->name('user.')->group(function () {
    // Home
    Route::get('/home', [UserController::class, 'index'])->name('home');
    Route::get('/home/sampah-{kategori}', [UserController::class, 'sampah'])->name('sampah-kategori');

    Route::get('sampah/scan', [WasteController::class, 'scanner'])->name('sampah.scanner');
    Route::resource('sampah', WasteController::class);

    Route::resource('eksplorasi', AiController::class);

    Route::prefix('/quiz')->group(function () {
        Route::get('/game', [GameController::class, 'index'])->name('game.index');
        Route::post('/game/save-score', [GameController::class, 'saveScore'])->name('game.save-score');
        Route::get('/game/leaderboard', [GameController::class, 'leaderboard'])->name('game.leaderboard');
    });

    Route::resource('quiz', QuizController::class);
});

require __DIR__ . '/auth.php';
