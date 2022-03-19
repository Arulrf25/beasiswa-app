<?php

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
Route::get('/data-mahasiswa', function () {
    return view('layouts.dashboard');
});

Route::get('data-mahasiswa', [App\Http\Controllers\DataMahasiswaController::class, 'index'])->name('data-mahasiswa.index');
Route::post('/data-mahasiswa/create', 'DataMahasiswaController@create')->name('data-mahasiswa.create');
Route::post('/data-mahasiswa/store', 'DataMahasiswaController@store')->name('data-mahasiswa.store');
Route::get('/data-mahasiswa/edit/{id?}', 'DataMahasiswaController@edit')->name('data-mahasiswa.edit');
Route::put('/data-mahasiswa/update/{id?}', 'DataMahasiswaController@update')->name('data-mahasiswa.update');
Route::delete('/data-mahasiswa/destroy/{id?}', 'DataMahasiswaController@destroy')->name('data-mahasiswa.destroy');
