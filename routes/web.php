<?php

use App\Http\Controllers\PlatController;
use App\Http\Controllers\ProfileController;
use App\Models\Plat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $plats = Plat::cursor();
    return view('welcome', compact('plats'));
});

Route::resource('plats', PlatController::class)->except(['index', 'create', 'show'])->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    $plats = Plat::latest()->paginate(5);
    return view('dashboard', compact('plats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
