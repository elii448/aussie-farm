<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KangarooApiController;

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

Route::controller(KangarooApiController::class)->group(function () {
    Route::post('create-data', 'saveData');
    Route::post('update-data', 'updateData');
    Route::delete('delete-data/{id}', 'deleteData')->whereNumber('id');
    Route::get('kangaroo', 'kangarooList');
    // Route::get('kangaroo/{id}', 'kangarooData')->whereNumber('id');
});

