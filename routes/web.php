<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/user/profile', [SiswaController::class, 'profile'])->name('profile');
Route::get('/crud', [SiswaController::class, 'index'])->name('siswa.index');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::PUT('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
Route::DELETE('/siswa/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');
