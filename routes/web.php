<?php

use App\Http\Controllers\LideresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VotantesController;
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
    return view('welcome');
});

Route::get('/lideres', [LideresController::class, 'index'])->name('lideres.index')->middleware(['auth']);
Route::get('/lideres/create', [LideresController::class, 'create'])->name('lideres.create')->middleware(['auth']);
Route::get('/lideres/{lider}/edit', [LideresController::class, 'edit'])->name('lideres.edit')->middleware(['auth']);

Route::get('/votantes', [VotantesController::class, 'index'])->name('votantes.index')->middleware(['auth']);
Route::get('/votantes/create', [VotantesController::class, 'create'])->name('votantes.create')->middleware(['auth']);
Route::get('/votantes/{votante}/edit', [VotantesController::class, 'edit'])->name('votantes.edit')->middleware(['auth']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
