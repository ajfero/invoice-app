<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',
    config('jetstream.auth_session'),'verified'])->group(function () {
        Route::get('/dashboard', function () {return view('dashboard');
    })->name('dashboard');
});

// Create a new route group for the Products.
// Aplicate the middelware "auth" to all the routes in the group.
// This route group will contain controllers for the products.
// Also create RESOURSE for routes in the group.
Route::middleware('auth')->group(function () {
        Route::resource('/products', ProductController::class);
});

Route::middleware('auth')->group(function () {
        Route::resource('/buyers', BuyerController::class);
});
