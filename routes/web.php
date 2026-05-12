<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.index')
            : redirect()->route('wiki.index');
    }
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('wiki')->name('wiki.')->group(function () {
    Route::get('/', [App\Http\Controllers\WikiController::class, 'index'])->name('index');
    Route::get('/baits', [App\Http\Controllers\WikiController::class, 'baits'])->name('baits');
    Route::get('/rods', [App\Http\Controllers\WikiController::class, 'rods'])->name('rods');
    Route::get('/ingredients', [App\Http\Controllers\WikiController::class, 'ingredients'])->name('ingredients');
});

Route::middleware('auth')->prefix('forum')->name('forum.')->group(function () {
    Route::get('/', [App\Http\Controllers\ForumController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\ForumController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\ForumController::class, 'store'])->name('store');
    Route::delete('/{log}', [App\Http\Controllers\ForumController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth')->prefix('calculator')->name('calculator.')->group(function () {
    Route::get('/', [App\Http\Controllers\CalculatorController::class, 'index'])->name('index');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index');

    Route::get('/baits', [App\Http\Controllers\AdminWikiBaitController::class, 'index'])->name('baits');
    Route::get('/baits/{bait}/edit', [App\Http\Controllers\AdminWikiBaitController::class, 'edit'])->name('baits.edit');
    Route::post('/baits', [App\Http\Controllers\AdminWikiBaitController::class, 'store'])->name('baits.store');
    Route::put('/baits/{bait}', [App\Http\Controllers\AdminWikiBaitController::class, 'update'])->name('baits.update');
    Route::delete('/baits/{bait}', [App\Http\Controllers\AdminWikiBaitController::class, 'destroy'])->name('baits.destroy');

    Route::get('/ingredients', [App\Http\Controllers\AdminWikiIngredientController::class, 'index'])->name('ingredients');
    Route::get('/ingredients/{ingredient}/edit', [App\Http\Controllers\AdminWikiIngredientController::class, 'edit'])->name('ingredients.edit');
    Route::post('/ingredients', [App\Http\Controllers\AdminWikiIngredientController::class, 'store'])->name('ingredients.store');
    Route::put('/ingredients/{ingredient}', [App\Http\Controllers\AdminWikiIngredientController::class, 'update'])->name('ingredients.update');
    Route::delete('/ingredients/{ingredient}', [App\Http\Controllers\AdminWikiIngredientController::class, 'destroy'])->name('ingredients.destroy');

    Route::get('/rods', [App\Http\Controllers\AdminWikiRodController::class, 'index'])->name('rods');
    Route::get('/rods/{rod}/edit', [App\Http\Controllers\AdminWikiRodController::class, 'edit'])->name('rods.edit');
    Route::post('/rods', [App\Http\Controllers\AdminWikiRodController::class, 'store'])->name('rods.store');
    Route::put('/rods/{rod}', [App\Http\Controllers\AdminWikiRodController::class, 'update'])->name('rods.update');
    Route::delete('/rods/{rod}', [App\Http\Controllers\AdminWikiRodController::class, 'destroy'])->name('rods.destroy');
});

require __DIR__.'/auth.php';
