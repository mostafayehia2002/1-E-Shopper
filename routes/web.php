<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInterfaceController;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(UserInterfaceController::class)->group(function (){
  Route::get('/','index')->name('homePage');

    Route::post('add_to_cart','addToCart')->name('addToCart');

    Route::get('show_cart','showCart')->name('showCart');
    Route::post('search','searchProducts')->name('searchProducts');
    Route::get('category_products/{id}','showCategory')->name('showCategory');
    Route::get('removeCart/{id}','removeCart')->name('removeCart');
    Route::post('/update-quantity','updateCart')->name('updateCart');
    Route::post('success-order','successBuying')->name('successOrder')->middleware(['auth', 'verified']);
    Route::get('shop','showShop')->name('showShop');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';


