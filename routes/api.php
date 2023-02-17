<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\DirectorController;
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

Route::get('deneme', [CastController::class, 'index']);

Route::controller(CastController::class)
->prefix('cast')
->group(function(){
    Route::get('','index');
    Route::post('','store');
    Route::get('/{cast}','show');
    Route::put('/{cast}','update');
    Route::delete('/{cast}','destroy');
    //Route::post('/{cast}/image','upload_image');
    //Route::delete('/{id}/image','delete_image');
});

Route::controller(DirectorController::class)
->prefix('director')
->group(function(){
    Route::get('','index');
    Route::post('','store');
    Route::get('/{director}','show');
    Route::put('/{director}','update');
    Route::delete('/{director}','destroy');
    //Route::post('/{director}/image','upload_image');
    //Route::delete('/{id}/image','delete_image');
});
