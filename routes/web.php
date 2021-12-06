<?php

use App\Http\Controllers\StatusController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/status/create', [StatusController::class, 'create'])->name('new-status');

    Route::post('/status', [StatusController::class, 'store']);

    Route::get('/status', [StatusController::class, 'index'])->name('status');
});

require __DIR__.'/auth.php';
