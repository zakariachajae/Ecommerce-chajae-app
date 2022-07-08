<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PanierController;
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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[ WelcomeController::class , 'index']);
Route::post('/search',[ WelcomeController::class , 'search']);

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth']);

Route::get('/boutique', [BoutiqueController::class, 'index']);
Route::get('/ajouter-au-panier/{id}',[BoutiqueController::class, 'addToCart'])->middleware(['auth']);

Route::get('/panier',[PanierController::class, 'cart'])->middleware(['auth']);
Route::patch('/update-cart', [PanierController::class,'update'])->middleware(['auth']);
Route::patch('/remove-from-cart/{id}', [PanierController::class,'remove'])->middleware(['auth']);
