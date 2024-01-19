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

Route::get('/', 'DashboardController@view')->name('dashboard');

Route::get('/login', 'AuthController@login_view')->name('login-form');
Route::post('/login-process', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/password', 'PasswordController@view')->name('password');
Route::post('/password/update', 'PasswordController@update')->name('update-password');

Route::prefix('diagnosis')->group(function(){
    Route::get('/', 'DiagnosisController@view')->name('diagnosis');
    Route::post('/hasil', 'DiagnosisController@diagnosis')->name('diagnosis.proses');
});

Route::prefix('riwayat')->group(function(){
    Route::get('/', 'RiwayatController@view')->name('riwayat');
    Route::get('/detail/{id_hasil}', 'RiwayatController@detail')->name('riwayat.detail');
});

Route::middleware(['check.session'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', 'AdminController@view')->name('admin');
        Route::get('/add', 'AdminController@add_view')->name('admin.add');
        Route::get('/update/{username}', 'AdminController@update_view')->name('admin.update');
        Route::post('/add/process', 'AdminController@add')->name('admin.add.process');
        Route::post('/update/process', 'AdminController@update')->name('admin.update.process');
        Route::get('/delete/{username}', 'AdminController@delete')->name('admin.delete.process');
    });

    Route::prefix('gejala')->group(function(){
        Route::get('/', 'GejalaController@view')->name('gejala');
        Route::get('/add', 'GejalaController@add_view')->name('gejala.add');
        Route::get('/update/{kode_gejala}', 'GejalaController@update_view')->name('gejala.update');
        Route::post('/add/process', 'GejalaController@add')->name('gejala.add.process');
        Route::post('/update/process', 'GejalaController@update')->name('gejala.update.process');
        Route::get('/delete/{kode_gejala}', 'GejalaController@delete')->name('gejala.delete.process');
    });

    Route::prefix('penyakit')->group(function(){
        Route::get('/', 'PenyakitController@view')->name('penyakit');
        Route::get('/add', 'PenyakitController@add_view')->name('penyakit.add');
        Route::get('/update/{kode_penyakit}', 'PenyakitController@update_view')->name('penyakit.update');
        Route::post('/add/process', 'PenyakitController@add')->name('penyakit.add.process');
        Route::post('/update/process', 'PenyakitController@update')->name('penyakit.update.process');
        Route::get('/delete/{kode_penyakit}', 'PenyakitController@delete')->name('penyakit.delete.process');
    });

    Route::prefix('pengetahuan')->group(function(){
        Route::get('/', 'PengetahuanController@view')->name('pengetahuan');
        Route::get('/add', 'PengetahuanController@add_view')->name('pengetahuan.add');
        Route::get('/update/{kode_pengetahuan}', 'PengetahuanController@update_view')->name('pengetahuan.update');
        Route::post('/add/process', 'PengetahuanController@add')->name('pengetahuan.add.process');
        Route::post('/update/process', 'PengetahuanController@update')->name('pengetahuan.update.process');
        Route::get('/delete/{kode_pengetahuan}', 'PengetahuanController@delete')->name('pengetahuan.delete.process');
    });
});
