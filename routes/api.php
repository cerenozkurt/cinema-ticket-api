<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('deneme', function () {
    $candles = [1, 4, 4, 4];
    $max = max($candles);
    $sonuc = 0;

    foreach ($candles as $can) {
        if ($can == $max) {
            $sonuc++;
        }
    }
    print $sonuc;
});

Route::controller(CastController::class)
    ->prefix('cast')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{cast}', 'show');
        Route::put('/{cast}', 'update');
        Route::delete('/{cast}', 'destroy');
        //Route::post('/{cast}/image','upload_image');
        //Route::delete('/{cast}/image','delete_image');
    });

Route::controller(DirectorController::class)
    ->prefix('director')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{director}', 'show');
        Route::put('/{director}', 'update');
        Route::delete('/{director}', 'destroy');
        //Route::post('/{director}/image','upload_image');
        //Route::delete('/{director}/image','delete_image');
    });

Route::controller(MovieController::class)
    ->prefix('movie')
    ->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{movie}', 'show');
        Route::put('/{movie}', 'update');
        Route::delete('/{movie}', 'destroy');
        //Route::post('/{movie}/image','upload_image');
        //Route::delete('/{movie}/image','delete_image');
    });
