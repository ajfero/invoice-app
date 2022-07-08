<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
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

// http://localhost:3000/linkstorage
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/house', function () {
    return "Hello World";
});

Route::middleware(['auth:sanctum',
    config('jetstream.auth_session'),'verified'])->group(function () {
        Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});

// Create a new route group for the Products.
// Aplicate the middelware "auth" to all the routes in the group.
// This route group will contain controllers for the products.
// Also create RESOURSE for routes in the group.
Route::middleware('auth')->group(function () {

        Route::resource('/products', ProductController::class);

        Route::resource('/buyers', BuyerController::class);

        Route::resource('/invoices', InvoiceController::class);

        Route::get('/invoices/add-product/{invoice}/', [InvoiceDetailController::class, 'create'])->name('invoices.add_products');

        Route::post('/invoices/{invoice}/complete/', [InvoiceController::class, 'completeSend'])->name('invoices.complete');

        Route::resource('/invoice-details', InvoiceDetailController::class);
});
