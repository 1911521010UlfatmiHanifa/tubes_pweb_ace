<?php

use App\Http\Livewire\Kelas;
use App\Http\Livewire\Krs;
use App\Http\Livewire\Dkrs;
use App\Http\Livewire\Mahasiswa;
use App\Http\Livewire\Dkelas;
use App\Http\Livewire\Dmahasiswa;
use App\Http\Livewire\Pertemuan;
use App\Http\Livewire\Dpertemuan;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', \App\Http\Controllers\TasksController::class);

    Route::resource('users', \App\Http\Controllers\UsersController::class);

    Route::get('dkelas/{kelas_id}',Dkelas::class)->name('dkelas');
    Route::get('dmahasiswa/{kelas_id}',Dmahasiswa::class)->name('dmahasiswa');
    Route::get('krs',Krs::class)->name('krs');
    Route::get('dkrs/{krs_id}',Dkrs::class)->name('dkrs');
    Route::get('mahasiswa',Mahasiswa::class)->name('mahasiswa');
});