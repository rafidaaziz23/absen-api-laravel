<?php

use App\Http\Resources\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\IzinController;
use App\Http\Controllers\API\MuridController;
use App\Http\Controllers\API\PresentController;
use App\Http\Controllers\API\Auth\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function() {
    return new Json(true, 'Api Server Running', null);
});

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::get('/murid/{id}', [MuridController::class, 'getById']);

Route::post('/izin/{id}', [IzinController::class,'doIzin']);

Route::post('/izin-file/{id}', [IzinController::class,'uploadIzin']);

Route::post('/present-in/{id}', [PresentController::class,'checkIn']);

Route::post('/present-out/{id}', [PresentController::class,'checkOut']);

Route::get('/presents/{id}', [PresentController::class,'checkById']);