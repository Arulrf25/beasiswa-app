<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\PembobotanController;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\PerangkinganController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/',[HomeController::class, 'index']);
Route::post('custom-login', [HomeController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [HomeController::class, 'register'])->name('register.custom');
Route::post('custom-registration', [HomeController::class, 'customRegistration'])->name('custom_registrasi');
Route::get('signout', [HomeController::class, 'signOut'])->name('signout');


Route::get('/admin', function () {
    return view('layouts.dashboard');
});

Route::get('data-mahasiswa', [App\Http\Controllers\DataMahasiswaController::class, 'index'])->name('data-mahasiswa.index');
Route::post('/data-mahasiswa/create', [DataMahasiswaController::class, 'create'])->name('data-mahasiswa.create');
Route::post('/data-mahasiswa/store', [DataMahasiswaController::class, 'store'])->name('data-mahasiswa.store');
Route::get('/data-mahasiswa/edit/{id?}', [DataMahasiswaController::class ,'edit'])->name('data-mahasiswa.edit');
Route::put('/data-mahasiswa/update/{id?}', [DataMahasiswaController::class, 'update'])->name('data-mahasiswa.update');
Route::delete('/data-mahasiswa/destroy/{id?}', [DataMahasiswaController::class ,'destroy'])->name('data-mahasiswa.destroy');

Route::resource('kriteria', KriteriaController::class);
Route::resource('crips', CripsController::class);
Route::get('/create/crips/{id}', [CripsController::class, 'create'])->name('create.crips');
Route::resource('pembobotan', PembobotanController::class);
Route::resource('normalisasi', NormalisasiController::class);
Route::resource('perangkingan', PerangkinganController::class);
