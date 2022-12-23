<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
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
    // return view('welcome');
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])
    ->prefix('dashboard')->group(function () {
        Route::get('', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::middleware('role:admin')
            ->group(function () {
                Route::resource('products', ProductController::class);
                Route::name('invoice.')
                    ->prefix('invoices')
                    ->group(function () {
                        Route::get('', [InvoiceController::class, 'index'])->name('index');
                        Route::post('generate', [InvoiceController::class, 'generate'])->name('generate');
                        Route::get('{invoice}/show', [InvoiceController::class, 'show'])->name('show');
                    });
            });

        Route::middleware('role:user')
            ->prefix('shop')
            ->name('shop.')
            ->group(function () {
                Route::get('', [PurchaseController::class, 'index'])->name('index');
                Route::post('{product}', [PurchaseController::class, 'create'])->name('create');
            });
    });


require __DIR__ . '/auth.php';
