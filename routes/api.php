<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/getall',[ProductController::class,'Homepage']);
Route::get('/select/{id}',[ProductController::class,'getByid'])->name('select');
Route::post('/addNewproduct',[ProductController::class,'addNewproduct'])->name('addNewproduct');
Route::delete('/delete/{id}',[ProductController::class,'deleteItem']);
Route::patch('/update/{id}',[ProductController::class,'updateItem'])->name('update');

