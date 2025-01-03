<?php

use App\Enums\ProductCategory;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/products', function () {
    return redirect('/');
});

Route::controller(ProductController::class)->group(function () {

    Route::get('/products/{category}', 'index')->name('products');
    Route::get('/products/{category}/{product}', 'show')->name('products.show');

});

Route::get('/headphone', function () {
    return Inertia::render('HeadPhone');
});

Route::get('/speaker', function () {
    return Inertia::render('Speaker');
});

Route::get('/earphone', function () {
    return Inertia::render('EarPhone');
});

// placeholder for show
Route::get('/foo', function () {
    return Inertia::render('Details');
});

Route::get('/checkout', function () {
    return Inertia::render('Checkout');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
