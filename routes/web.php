<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ShowCaseController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('admin.login');
        Route::post('/do-login', [LoginController::class, 'login'])->name('admin.doLogin');
    Route::get('/howm', [LoginController::class, 'home'])->name('admin.home');
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.index');
    Route::post('/contact-us-destroy/{id}', [ContactUsController::class, 'destroy'])->name('contact.delete');
    Route::get('/slider-list', [SliderController::class, 'index'])->name('admin.slider');
    Route::get('/slider-create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider-edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::post('/slider-destroy/{id}', [SliderController::class, 'destroy'])->name('slider.delete');


    //rate Controller
     Route::get('/rate-list', [RateController::class, 'index'])->name('admin.rate');
    Route::get('/rate-create', [RateController::class, 'create'])->name('rate.create');
    Route::post('/rate-store', [RateController::class, 'store'])->name('rate.store');
    Route::get('/rate-edit/{id}', [RateController::class, 'edit'])->name('rate.edit');
    Route::put('/rate-update/{id}', [RateController::class, 'update'])->name('rate.update');
    Route::post('/rate-destroy/{id}', [RateController::class, 'destroy'])->name('rate.delete');


     //showCase Controller
     Route::get('/showCase-list', [ShowCaseController::class, 'index'])->name('admin.showCase');
    Route::get('/showCase-create', [ShowCaseController::class, 'create'])->name('showCase.create');
    Route::post('/showCase-store', [ShowCaseController::class, 'store'])->name('showCase.store');
    Route::get('/showCase-edit/{id}', [ShowCaseController::class, 'edit'])->name('showCase.edit');
    Route::put('/showCase-update/{id}', [ShowCaseController::class, 'update'])->name('showCase.update');
    Route::post('/showCase-destroy/{id}', [ShowCaseController::class, 'destroy'])->name('showCase.delete');
});

Route::middleware(['auth:admin'])->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});
