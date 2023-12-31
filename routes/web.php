<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClothesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Models\Clothes;

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

Route::middleware('auth')->group(function () {
    Route::get('/search/input', [SearchController::class, 'create'])->name('search.input');
    Route::get('/search/result', [SearchController::class, 'index'])->name('search.result');
    Route::get('/clothes', [ClothesController::class, 'index'])->name('clothes.index');
    Route::get('/clothes/create', [ClothesController::class, 'create'])->name('clothes.create');
    Route::post('/clothes/store', [ClothesController::class, 'store'])->name('clothes.store');
    Route::get('/clothes/edit', [ClothesController::class, 'edit'])->name('clothes.edit');
    Route::resource('clothes', ClothesController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/auth.php';
