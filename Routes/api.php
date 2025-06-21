<?php

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

// Route::middleware('auth:api')
Route::prefix('/task')->group(function () {
    Route::get('list', [\Modules\Task\Http\Controllers\TaskController::class, 'list'])->name('task_list');
    //    return $request->user();
});
