<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\FolderController;
use App\Http\Controllers\api\NotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login',[AuthController::class, 'login']);

Route::get('notes',[NotesController::class,'index']);
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('folders',FolderController::class);
    Route::post('notes',[NotesController::class,'store']);

});