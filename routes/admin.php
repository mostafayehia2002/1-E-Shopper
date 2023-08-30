<?php

use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function (){

////
  Route::middleware('IsAdmin')->group(function (){
      $num_users=User::all()->count();
      $num_admins=Admin::all()->count();
      $num_products=Product::all()->count();
      $num_orders=Order::all()->count();
      $num_categories=Category::all()->count();
      Route::view('index','admin.index',compact('num_users','num_admins','num_products','num_orders','num_categories'))->name('index');
    });
    require __DIR__.'/AdminAuth.php';
});
