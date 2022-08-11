<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;

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
Route::post('/add-newsletter',[ WelcomeController::class , 'storeNewsletter']);



Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth']);

Route::get('/boutique', [BoutiqueController::class, 'index']);
Route::get('/ajouter-au-panier/{id}',[BoutiqueController::class, 'addToCart'])->middleware(['auth']);
Route::get('/orderBy/latest', [BoutiqueController::class, 'sortByLatest']);
Route::get('/orderBy/oldest', [BoutiqueController::class, 'sortByOldest']);
Route::get('/orderBy/popularity', [BoutiqueController::class, 'sortByPopularity']);
Route::get('/orderBy/price', [BoutiqueController::class, 'sortByPrice']);
Route::get('/orderBy/prices', [BoutiqueController::class, 'sortByPrices']);


Route::get('/panier',[PanierController::class, 'cart'])->middleware(['auth']);
Route::patch('/update-cart', [PanierController::class,'update'])->middleware(['auth']);
Route::patch('/remove-from-cart/{id}', [PanierController::class,'remove'])->middleware(['auth']);

Route::get('/wishlist',[WishlistController::class,'index'])->middleware(['auth']);
Route::get('ajouter-wishlist/{id}',[WishlistController::class,'ajouter'])->middleware(['auth']);
Route::patch('/remove-from-wishlist/{id}', [WishlistController::class,'remove'])->middleware(['auth']);

Route::get('/detail/{id}',[DetailController::class, 'detail']);
Route::post('/ajouter-commentaire/{id}',[DetailController::class, 'add_comment'])->middleware(['auth']);

Route::get('/contact', [ContactController::class,'index']);

Route::get('/checkout', [CheckoutController::class,'index'])->middleware(['auth']);

