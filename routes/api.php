<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('addbook',[BookController::class,'store']);
Route::get('showallbooks',[BookController::class,'index']);
Route::post('updatebook/{id}',[BookController::class,'update']);
Route::delete('deletebook/{id}',[BookController::class,'destroy']);
Route::get('showonebook/{id}',[BookController::class,'show']);
