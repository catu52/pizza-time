<?php

use Illuminate\Support\Facades\Route;

//Frontend Controllers
use App\Http\Controllers\HomeController;

//Backend controllers
use App\Http\Controllers\Admin\PizzaController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\PurchaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('pizza', PizzaController::class);
    Route::resource('ingredient', IngredientController::class);
    Route::get('purchase', [PurchaseController::class, 'index']);
});