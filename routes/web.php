<?php

use App\Livewire\LombaPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\eventController;
use App\Http\Controllers\juriController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\lombaController;
use App\Http\Controllers\nilaiController;
use App\Http\Controllers\pesertaController;
use App\Http\Controllers\rekapController;
use App\Models\Nilai;

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

Route::get('/', [eventController::class, 'index'])->name('index');

Route::get('addEvent', [eventController::class, 'addEvent'])->name('addEvent');

Route::get('/event/{eventId}/lomba', [lombaController::class, 'index'])
    ->name('lomba.index');
Route::get('/event/{eventId}/lomba', [lombaController::class, 'index'])
    ->name('lomba.index');
Route::get('/event/{eventId}/peserta', [pesertaController::class, 'index'])
    ->name('peserta.index');

Route::get('/event/{eventId}/juri', [juriController::class, 'index'])
    ->name('juri.index');

Route::get('/event/{eventId}/nilai', [nilaiController::class, 'index'])->name('index');

Route::get('/event/{eventId}/Kategori-Penilaian', [kategoriController::class, 'index'])->name('index');

Route::get('/rekap-nilai', [rekapController::class, 'index'])->name('rekap.index');
