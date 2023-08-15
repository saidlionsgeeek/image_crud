<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
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

Route::get('/', [HomeController::class , "index"])->name("home.index");
Route::get("/image",[ImageController::class , "index"])->name("image.index");



Route::post('/image/store',[ImageController::class , "store"])->name("image.store");
Route::delete('/image/destroy/{image}',[ImageController::class ,"destroy"])->name("image.destroy");
Route::put('/image/update/{image}',[ImageController::class ,"update"])->name("image.update");
Route::get("/download/image/{image}",[ImageController::class , 'download'])->name("image.download");

