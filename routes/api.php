<?php

use App\Http\Controllers\BiographyController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('biography', [BiographyController::class, 'index']);
Route::post('biography', [BiographyController::class, 'store']);
Route::put('biography/{id}', [BiographyController::class, 'update']);
Route::get('biography/{id}', [BiographyController::class, 'show']);
Route::delete('biography/{id}', [BiographyController::class, 'destroy']);
