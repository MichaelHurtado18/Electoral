<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LideresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuestosController;
use App\Http\Controllers\VotantesController;
use App\Http\Resources\VotantesResource;
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
    return view('auth.login');
});



// Rutas Lideres
Route::get('/lideres', [LideresController::class, 'index'])->name('lideres.index')->middleware(['auth']);
Route::get('/lideres/create', [LideresController::class, 'create'])->name('lideres.create')->middleware(['auth']);
Route::get('/lideres/{lider}/edit', [LideresController::class, 'edit'])->name('lideres.edit')->middleware(['auth']);
Route::get('/lideres/{lider}', [LideresController::class, 'show'])->name('lideres.show')->middleware(['auth']);
// Rutas Votantes
Route::get('/votantes', [VotantesController::class, 'index'])->name('votantes.index')->middleware(['auth']);
Route::get('/votantes/create', [VotantesController::class, 'create'])->name('votantes.create')->middleware(['auth']);
Route::get('/votantes/{votante}/edit', [VotantesController::class, 'edit'])->name('votantes.edit')->middleware(['auth']);
Route::get('/votantes/{votante}/edit', [VotantesController::class, 'edit'])->name('votantes.edit')->middleware(['auth']);
// Rutas Puestos
Route::get('/puestos', [PuestosController::class, 'index'])->name('puestos.index')->middleware(['auth']);
Route::get('/puestos/{puestos}', [PuestosController::class, 'show'])->name('puestos.show')->middleware(['auth']);
Route::post('/puestos', [PuestosController::class, 'store'])->name('puestos.store')->middleware(['auth']);


// Route::get('/api',);


Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/api/grafica', [HomeController::class, 'getGrafica'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
