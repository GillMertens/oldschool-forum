<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FaqAnswerController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\TopicController;
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

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
Route::post('/', [DashboardController::class, 'index'])->name('dashboard.more');
Route::get('/topics/{topic:slug}', [TopicController::class, 'show'])->name('topics.show');
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/categories/{name}', [CategoryController::class, 'show'])->name('categories.show');
Route::post('/categories/{name}', [CategoryController::class, 'show'])->name('categories.more');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/reactions', [ReactionController::class, 'store'])->name('reactions.store');
});

Route::middleware('admin')->group(function () {
    Route::post('/users/{user}/toggleAdmin', [DashboardController::class, 'toggleAdmin'])->name('users.toggleAdmin');
    Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::post('/faq-answers/create', [FaqAnswerController::class, 'store'])->name('faqAnswer.store');
});

require __DIR__.'/auth.php';
