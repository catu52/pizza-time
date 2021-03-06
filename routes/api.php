<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PizzaController;
use App\Http\Controllers\Api\PurchaseController;

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

Route::get('pizza', [PizzaController::class, 'index']);

Route::post('purchase', [PurchaseController::class, 'purchase']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
