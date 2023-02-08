<?php

use Illuminate\Http\Request;
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

Route::get('deneme', function(){

    $collect = collect();
     $number = 10;
     while($number < 21){
        $tam = $number.':'.'00';
        $onbes = $number.':'.'15';
        $bucuk = $number.':'.'30';
        $kirkbes = $number.':'.'45';

        $saat = [
            'tam' => $tam,
            'onbes' => $onbes,
            'bucuk' => $bucuk,
            'kirkbes' => $kirkbes
        ];
        $collect->push($saat);
        $number++;
    }
    return $collect;
});
