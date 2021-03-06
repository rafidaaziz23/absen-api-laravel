<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NisController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MuridController;

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
    return view('dashboard.dashboard');
});

Route::resource('jurusan', JurusanController::class);
Route::resource('kelas', KelasController::class);
Route::resource('nis', NisController::class);
Route::resource('murid',MuridController::class);


