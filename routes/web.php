<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ContactController::class, 'index']);

Route::post('/confirm',[ContactController::class,'sendConfirm']);
Route::get('/confirm', [ContactController::class, 'confirm']);


Route::post('/alert', [ContactController::class, 'createUser']);
Route::get('/alert', [ContactController::class, 'alert']);


Route::get('/management', [ContactController::class, 'management']);


Route::post('/find', [ContactController::class, 'find']);
Route::get('/find', [ContactController::class, 'find']);

Route::post('/delete', [ContactController::class, 'delete']);