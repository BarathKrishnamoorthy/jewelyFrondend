<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ShowCaseController;
use App\Http\Controllers\SliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function () {
Route::post('/contact-us', [ContactUsController::class,'store']);
Route::get('/show-case',[ShowCaseController::class,'list']);
Route::get('/rate',[RateController::class,'list']);
Route::get('/slider',[SliderController::class,'list']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
