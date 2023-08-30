<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\RegisteredUserController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;
use App\Http\Controllers\AdminOperationsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admins')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

Route::middleware('auth:admins')->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
     //-------------------------------------------------------//
    //show
    Route::get('notAllowed',function (){
        return view('admin.not_allowed');
    })->name('notAllowed');
     //
    Route::controller(ProductController::class)->group(function (){
        Route::get('add_product','index')->name('addProduct');
        Route::post('add_product','addNewProduct')->name('storeProduct');
        Route::get('edit_product/{id}','editProduct')->name('editProduct');
        Route::post('update_Product/{id}','updateProduct')->name('updateProduct');
        Route::get('delete_product/{id}','deleteProduct')->middleware('Admin')->name('deleteProduct');
    });
    //
    Route::controller(CategoryController::class)->group(function (){
        Route::get('add_category','index')->name('addCategory');
        Route::post('add_category','addNewCategory')->name('storeCategory');
        //
        Route::get('edit_category/{id}','editCategory')->name('editCategory');
        Route::post('update_category/{id}','updateCategory')->name('updateCategory');
        //
        Route::get('delete_category/{id}','deleteCategory')->middleware('Admin')->name('deleteCategory');
    });
    Route::controller(OrderController::class)->group(function (){

        Route::get('order_done/{order}/{user}','orderDone')->name('orderDone');
        Route::post('/mark_AsRead','markAsRead')->name('markAsRead');

    });
    Route::controller(AdminOperationsController::class)->group(function () {
        //
        Route::get('show orders','showOrders')->name('showOrders');
        //
        Route::get('show products','showProducts')->name('showProducts');
        //
        Route::get('show_categories','showCategories')->name('showCategories');
    });

        //admin access page it's not allowed to sub admins
        Route::middleware('Admin')->group(function (){
            Route::controller(AdminController::class)->group(function (){
                //
                Route::get('add_admin','index')->name('addAdmin');
                Route::post('add_admin','store')->name('storeAdmin');
                //
                Route::get('add_admin/{id}','editAdmin')->name('editAdmin');
                Route::post('update_admin/{id}','updateAdmin')->name('updateAdmin');
                //
                Route::get('delete_admin/{id}','deleteAdmin')->name('deleteAdmin');
            });
            Route::controller(AdminOperationsController::class)->group(function (){
                //
                Route::get('show_users','showUsers')->name('showUsers');
                Route::get('show_admins', 'showAdmins')->name('showAdmins');
                //
            });
//
        });

    });

